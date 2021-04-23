<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- the head section -->
<head>
<title>Keyboard Shop</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>

<!-- the body section -->
<body>
<header><h1><a href='index.php'>Keyboard Shop</a></h1></header>
<div id='login_register'>
<?php
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
        echo '<p><a href="register.php">Register</a></p>';
        echo ' ';
        echo '<p><a href="login.php">Login</a></p>';
    }
    else {
        echo '<p><a href="logout.php">Logout</a></p>';
    }
    ?>
</div>
