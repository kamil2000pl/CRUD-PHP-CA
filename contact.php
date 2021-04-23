<!-- the head section -->

<?php
include('includes/header.php');
?>
<div class="container">
<h1>Contact us</h1>
<form method="POST" name="contactform" action="contact-form-handler.php"> 
<p>
<label for='name'>Your Name:</label> <br>
<input id="contactname" onBlur="contactname_validation();" type="text" name="name" required><span id="contactname_err"></span>
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input id="contactemail" onBlur="contactemail_validation()" type="text" name="email" required><span id="contactemail_err"></span> <br>
</p>
<p>
<label for='message'>Message:</label> <br>
<textarea id="contactmessage" onBlur="contactmessage_validation()" name="message" required></textarea><span id="contactmessage_err"></span>
</p>
<input type="submit" value="Submit"><br>
</form>
<?php
include('includes/footer.php');
?>
</div>
<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
<script src="validation.js"></script>