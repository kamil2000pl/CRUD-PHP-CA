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

// Get users
$queryRecords = "SELECT * FROM users
ORDER BY id";
$statement = $db->prepare($queryRecords);
$statement->execute();
$records = $statement->fetchAll();
$statement->closeCursor();

?>
<?php
    include('includes/header.php');
?>

<div class="container">

<h2><?php echo 'Users'; ?></h2>
        <table>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>Access Level</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($records as $record) : ?>
                <tr class="userstable">
                    <td><?php echo $record['id']; ?></td>
                    <td><?php echo $record['username']; ?></td>
                    <td class="right"><?php 
                    if($record['access_level'] == 1)
                    { 
                        echo 'Admin';
                    } else
                    {
                        echo 'User';
                    } 
                    ?></td>
                    <td>
                        <form action="delete_record.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['id']; ?>">
                            <input class="deleteedit" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id='deleteaddbuttons'>
            <p><a href="manage_keyboards.php">Manage Keyboards</a></p>
            <p><a href="category_list.php">Manage Categories</a></p>
            <p><a href="contact.php">Contact Us</a></p>
        </div>

<?php
    include('includes/footer.php');
?>