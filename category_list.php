<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || $_SESSION['access_level'] != 1){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

// echo 'Congratulations! You are logged in!';

    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!-- the head section -->
<?php
include('includes/header.php');
?>
<div class="container">
    <h1>Category List</h1>
    <br>
    <table id="category_table">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input id="delete_button" type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add Category</h2>
    <br>
    <form action="add_category.php" method="post"
          id="add_category_form">

        <label>Name:</label>
        <input id="category_name" type="input" name="name" onBlur="category_name_validation();" required>
        <input id="add_category_button" type="submit" value="Add">
        <span id="catname_err"></span>
    </form>
    <br>

    <?php
include('includes/footer.php');
?>
<script src="validation.js"></script>