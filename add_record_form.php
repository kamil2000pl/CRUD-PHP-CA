<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
$selected_keyboard = true;
?>
<script>
function onSelectionChange()
{
    value = document.getElementById("category_select").value;
    if (value == '1')
    {
        document.getElementById('test').innerHTML += '<?php 
                echo '<label>Switch Type:</label>';
                echo '<input type="input" name="switch_type">';
                echo '<br>';
            ?>'
    }
    else
    {
        document.getElementById('test').innerHTML = "";
    }
}
</script>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add Record</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select id="category_select" name="category_id" onchange="onSelectionChange()">
            <option value="" selected disabled hidden>Choose here</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name">
            <br>

            <label>List Price:</label>
            <input type="input" name="price">
            <br>


            <div id="test"></div>
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Record">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>