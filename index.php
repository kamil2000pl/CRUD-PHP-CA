<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>
<?php
    include('includes/header.php');
    ?>
<div class="container">

    <aside>
        <!-- display a list of categories -->
        <h2 id='categories'>Categories</h2>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of records -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <?php
                if ($category_name == 'Keyboards') {

                    echo '<th>Switch</th>';
                }
                ?>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td id='imgtd'><img src="image_uploads/<?php echo $record['image']; ?>"  /></td>
                    <td><?php echo $record['name']; ?></td>
                    <td class="right"><?php echo $record['price']; ?></td>
                    <?php
                    if ($category_name == 'Keyboards') {
                        echo '<td>';
                        echo $record['switch_type'];
                        echo '</td>';
                    }
                    ?>
                    <td>
                        <form action="delete_record.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                            <input class="deleteedit" type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="edit_record_form.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                            <input class="deleteedit" type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id='deleteaddbuttons'>
            <p><a href="add_record_form.php">Add Record</a></p>
            <p><a href="category_list.php">Manage Categories</a></p>
        </div>
    </section>
    <?php
    include('includes/footer.php');
    ?>
<script src="validation.js"></script>
    