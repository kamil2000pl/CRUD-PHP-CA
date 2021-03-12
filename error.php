<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<!-- the body section -->
<body>
<?php
    include('includes/header.php');
    ?>
<div class="container">

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Kamil Jozefowicz</p>
    </footer>
</div>
</body>
</html>