<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

// echo 'Congratulations! You are logged in!';

require_once('database.php');

// Get IDs
$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($record_id != false && $category_id != false) {
    $query = "DELETE FROM records
              WHERE recordID = :record_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':record_id', $record_id);
    $statement->execute();
    $statement->closeCursor();

    // display the Product List page
    header('Location: manage_keyboards.php');
}

if ($record_id != false && $category_id == false)
{
    $query = "DELETE FROM users
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $record_id);
    $statement->execute();
    $statement->closeCursor();

    // display the User List page
    header('Location: display_users.php');
}

?>