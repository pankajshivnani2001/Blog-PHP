<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | View Topic</title>
	<link rel="stylesheet" type="text/css" href="../static/public_styles.css">
</head>
<body>
	<?php 
	
	include("config.php");
	include("navbar.php");

	if(isset($_GET["topic"]))
	{
		$topic = $_GET["topic"];
		$query = mysqli_query($con, "SELECT * FROM article WHERE topic = '$topic'");

		while($row = mysqli_fetch_array($query))
		{	
			$authorId = $row["author_id"];
			$authorQuery = mysqli_query($con, "SELECT name FROM author WHERE id = '$authorId'");
			$author = mysqli_fetch_array($authorQuery)["name"];

			echo "<div class='topics' style='margin: 15px; letter-spacing: 1px'>";
			echo '<h3>' . "Title: " . $row["title"] . '</h3>';
			echo '<h3> <a href = "author-profile.php?authorId='. $authorId .'">Author: '. $author. '</a></h3>';
			echo '<a href = "view-article.php?articleId='. $row["id"] .'">View Article</a><br><br><br>';
			echo "</div>";
			echo "<hr>";
		}
	}

?>
</body>
</html>