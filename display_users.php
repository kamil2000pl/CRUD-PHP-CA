<?php
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

<?php
    include('includes/footer.php');
?>