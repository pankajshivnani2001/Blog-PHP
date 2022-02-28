<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Add Author</title>
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

	

	?>

	<form method="POST" action="add-author-handler.php">
		<span>Enter New Author Name</span>
		<input type="text" name="authorName" required="">
		<br>
		<input type="submit" name="addAuthor" value="Add Author">
	</form>

	<form method="POST" action="logout-handler.php" style="float: right;">
		<input type="submit" name="logout" value="logout">
	</form>




</body>
</html>