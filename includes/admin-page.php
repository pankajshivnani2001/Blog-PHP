<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Admin</title>
</head>
<body>
	<?php
	include("config.php");

	session_start();

	if(!isset($_SESSION['userLoggedIn']))
	{
		header("Location: admin-login.php");
		exit();
	}
	
	echo "Welcome back " . $_SESSION['userLoggedIn'];
	?>



	<br><a href="add-author.php">Add Author</a><br>
	<a href="delete-author.php">Delete Author</a>

	<form method="POST" action="logout-handler.php" style="float: right;">
		<input type="submit" name="logout" value="logout">
	</form>
</body>
</html>