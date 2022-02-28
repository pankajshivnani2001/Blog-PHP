<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Delete Author</title>
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

	<h2>Existing Authors</h2>
	<?php 

		$authorQuery = mysqli_query($con, "SELECT * FROM author");

		while($row = mysqli_fetch_array($authorQuery))
		{
			$id = $row["id"];
			$name = $row["name"];

			echo "<span>Author Id: " . $id . " Author Name: " . $name . "</span>";

			echo "<br>";

			echo "<button onclick='deleteAuthor(".$id.")'>Delete</button>";

			echo "<br><br>";

		}
	?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		function deleteAuthor(id)
		{
			console.log("Deleted: " + id);
			$.post("delete-author-handler.php", {authorId : id}, function(data){
				location.reload(); 
			})
		}

	</script>

	<form method="POST" action="logout-handler.php" style="float: right;">
		<input type="submit" name="logout" value="logout">
	</form>
</body>
</html>