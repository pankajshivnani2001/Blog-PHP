<?php 
	include("config.php");

	if(isset($_POST["addAuthor"]))
	{
		$authorName = $_POST["authorName"];
		$existsQuery = mysqli_query($con, "SELECT name FROM author WHERE name = '$authorName'");

		if(mysqli_num_rows($existsQuery) > 0)
		{
			//
			echo "<h1> Author Exists! </h1>";
		}

		else
		{
			mysqli_query($con, "INSERT INTO author (name) VALUES ('$authorName')");
			echo "<h1> Author Added! </h1>";
		}
	}
?>

<br>
<a href="add-author.php">Add Author</a>