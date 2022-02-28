<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | View Article</title>
	<link rel="stylesheet" type="text/css" href="../static/public_styles.css">
</head>
<body>
	<?php 
		include("navbar.php");
		include("config.php");

		$articleId = $_GET["articleId"];
		$articleQuery = mysqli_query($con, "SELECT * FROM article WHERE id = '$articleId'");
		$row = mysqli_fetch_array($articleQuery);

		$title = $row["title"];
		$text = $row["text"];
		$img = $row["image_src"];
		$authorId = $row["author_id"];

		$authorQuery = mysqli_query($con, "SELECT name FROM author WHERE id = '$authorId'");
		$author = mysqli_fetch_array($authorQuery)["name"];


		echo '
				<h1>Title: '. $title .'</h1>
				<img src="../static/images/'. $img .'"><br><br>
				<h3>Author: '. $author .'</h3>
				<p>'. $text .'</p>
			 ';
	//comments section
	?>

	<?php
		echo "<h2>Comments Section</h2>";

		
			$commentsQuery = mysqli_query($con, "SELECT * FROM comment WHERE article_id = '$articleId' ORDER BY comment_time DESC");

			$count = 0;

			while($row = mysqli_fetch_array($commentsQuery))
			{
				echo $row["comment_text"];
				echo "<br>";
				echo $row["comment_time"];
				echo "<br>";
				echo "~".$row["name"];
				echo "<br>";
			}
	


		echo '<form method="POST" action="add-comment-handler.php">
				<textarea name="commentText" placeholder="Enter Comment"></textarea>
				<input type="hidden" name="articleIdForComment" value=' . $articleId . '>
				<br><span>Enter Comment Display Name</span><br>
				<input type="text" name="userName" value="Anonymous">
				<input type="submit" name="addComment" value="Add Comment">
			</form>';

	?>

</body>
</html>


