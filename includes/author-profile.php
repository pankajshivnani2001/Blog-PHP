<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Author Profile</title>
	<link rel="stylesheet" type="text/css" href="../static/public_styles.css">
</head>
<body>
	<?php
	include("navbar.php");
	include("config.php");
	$id = $_GET["authorId"];
	$query = mysqli_query($con, "SELECT * FROM author WHERE id = '$id'");
	$authorName = mysqli_fetch_array($query)["name"];

	echo "<h1> Author Profile </h1>";
	echo "<h2> Author Name: $authorName </h2>";
	echo "<h2> Articles By Author: </h2>";

	$articleQuery = mysqli_query($con, "SELECT * FROM article WHERE author_id = '$id'");

	while($row = mysqli_fetch_array($articleQuery))
	{	
		echo "<div style='margin: 15px; letter-spacing: 1px' class='recentArticles'>";
		echo '<h3>Title: ' . $row["title"] . '</h3>';
		echo '<a href = "view-article.php?articleId='. $row["id"] .'">View Article</a><br><br><br>';
		echo "<hr>";
		echo "</div>";
	}
	
?>
</body>
</html>

