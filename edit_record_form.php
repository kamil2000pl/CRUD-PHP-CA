<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
<?php
include('includes/header.php');
?>
<div class="container">
       <h1>Edit Product</h1>
       <div id="editfields">
              <form action="edit_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
                     <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
                     <input type="hidden" name="record_id" value="<?php echo $records['recordID']; ?>">

                     <div class='editrow'>
                            <div class='col-25'>
                                   <label>Category ID:</label>
                            </div>
                            <div class='col-75'>
                                   <input type="category_id" name="category_id" value="<?php echo $records['categoryID']; ?>">
                            </div>
                            <br>
                     </div>

                     <div class='editrow'>
                            <div class='col-25'>
                                   <label>Name:</label>
                            </div>
                            <div class='col-75'>
                                   <input type="input" name="name" value="<?php echo $records['name']; ?>">
                            </div>
                            <br>
                     </div>

                     <div class='editrow'>
                            <div class='col-25'>
                                   <label>List Price:</label>
                            </div>
                            <div class='col-75'>
                                   <input type="input" name="price" value="<?php echo $records['price']; ?>">
                            </div>
                            <br>
                     </div>

                     <?php
                     if ($records['categoryID'] == 1) {
                            echo '<div class="editrow">';
                            echo '<div class="col-25">';
                            echo '<label>Switch Type:</label>';
                            echo '</div>';
                            echo '<div class="col-75">';
                            echo '<input type="input" name="switch_type"';
                            echo       'value="';
                            echo $records['switch_type'];
                            echo '">';
                            echo '</div>';
                            echo '<br>';
                            echo '</div>';
                     }
                     ?>

                     <div class='editrow'>
                            <label>Image:</label>
                            <input type="file" name="image" accept="image/*" />
                     </div>
       </div>
       <br>
       <?php if ($records['image'] != "") { ?>
              <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
       <?php } ?>

       <label>&nbsp;</label>
       <input class="submitbutton" type="submit" value="Save Changes">
       <br>
       </form>
       <?php
       include('includes/footer.php');
       ?>