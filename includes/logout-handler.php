<?php
	
	session_start();
	unset($_SESSION["userLoggedIn"]);
	echo "Logged Out Successfully";

	echo "<br><a href=../admin-login.php>Login</a>"
?>
