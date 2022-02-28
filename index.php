<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Home</title>
	<link rel="stylesheet" type="text/css" href="static/public_styles.css">
</head>
<body>
	<div class="container">
		
		<?php include("includes/navbar.php"); ?>

		<h1 style="margin-left: 7px">Recent Articles</h1>
		<?php 

			include("includes/config.php");
			$query = mysqli_query($con, "SELECT * FROM article ORDER BY ID DESC LIMIT 5");


			while($row = mysqli_fetch_array($query))
			{	
				$authorId = $row["author_id"];
				$authorQuery = mysqli_query($con, "SELECT name FROM author WHERE id = '$authorId'");
				$author = mysqli_fetch_array($authorQuery)["name"];

				echo "<div style='margin: 15px; letter-spacing: 1px' class='recentArticles'>";
				echo '<h3>Title: ' . $row["title"] . '</h3>';
				echo '<h3> <a href = "includes/author-profile.php?authorId='. $authorId .'">Author: '. $author. '</a></h3>';
				echo '<a href = "includes/view-article.php?articleId='. $row["id"] .'">View Article</a><br><br><br>';
				echo "<hr>";
				echo "</div>";
			}

		?>

<?php include("includes/footer.php"); ?>
	