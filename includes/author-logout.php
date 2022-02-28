<?php
	
	session_start();
	unset($_SESSION["authorLoggedIn"]);
	echo "Logged Out Successfully";

	echo "<br><a href=../author-login.php>Login</a>"
?>
