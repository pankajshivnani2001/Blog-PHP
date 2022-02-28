<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Add Article</title>
</head>
<body>
	<?php 
	
		include("config.php");
		session_start();

		if(!isset($_SESSION["authorLoggedIn"])){
			header("Location: ../author-login.php");
		}

		if(isset($_POST["addArticleDb"]))
		{
			//procedure to add article in DB

			$authorId = $_SESSION["authorLoggedIn"];
			$title = $_POST["title"];
			$articleText = $_POST["articleText"];
			$imgSrc =  $_POST["imageSrc"];
			$topic =  $_POST["topic"];


			$query = mysqli_query($con, "INSERT INTO article (title, text, image_src, author_id, topic) VALUES ('$title','$articleText','$imgSrc','$authorId', '$topic') ");

			header("Location: addArticle.php");
		}




	?>


	<h1>Add New Article</h1>

	<form method="POST" action="addArticle.php">
		<span>Article Title</span>
		<input type="text" name="title"><br>

		<span>Article Topic</span>
		<input type="text" name="topic"><br>

		<span>Article Text</span>
		<textarea name="articleText"></textarea><br>

		<span>Image Source</span>
		<input type="text" name="imageSrc"><br>


		<input type="submit" name="addArticleDb" value="Add Article">
	</form>
</body>
</html>