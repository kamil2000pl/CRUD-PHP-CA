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
    function onSelectionChange() {
        value = document.getElementById("category_select").value;
        if (value == '1') {
            document.getElementById('switch').innerHTML += '<?php
                                                            echo '<div class="addrow">';
                                                            echo '<div class="col-25">';
                                                            echo '<label>Switch Type:</label>';
                                                            echo '</div>';
                                                            echo '<div class="col-75">';
                                                            echo '<input type="input" name="switch_type">';
                                                            echo '</div>';
                                                            echo '<br>';
                                                            echo '</div>';
                                                            ?>'
        } else {
            document.getElementById('switch').innerHTML = "";
        }
    }
</script>
<!-- the head section -->
<?php
include('includes/header.php');
?>
<div class="container">
    <h1>Add Record</h1>
    <div id="addfields">
        <form action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">

            <div class='addrow'>
                <div class='col-25'>
                    <label>Category:</label>
                </div>
                <div class='col-75'>
                    <select id="category_select" name="category_id" onchange="onSelectionChange()">
                        <option value="" selected disabled hidden>Choose here</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['categoryID']; ?>">
                                <?php echo $category['categoryName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
            </div>

            <div class='addrow'>
                <div class='col-25'>
                    <label>Name:</label>
                </div>
                <div class='col-75'>
                    <input type="input" name="name">
                </div>
                <br>
            </div>

            <div class='addrow'>
                <div class='col-25'>
                    <label>List Price:</label>
                </div>
                <div class='col-75'>
                    <input type="input" name="price">
                </div>
                <br>
            </div>


            <div id="switch"></div>

            <div class='addrow'>
                <div class='col-25'>
                    <label>Image:</label>
                </div>
                <div class='col-75'>
                    <input type="file" name="image" accept="image/*" />
                </div>
                <br>
            </div>
            </div>
            <label>&nbsp;</label>
            <input class="submitbutton" type="submit" value="Add Record">
            <br>
        </form>
    
    <?php
    include('includes/footer.php');
    ?>