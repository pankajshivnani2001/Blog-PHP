<?php 


	include("config.php");
	session_start();


	if(!isset($_SESSION["authorLoggedIn"])){
		header("Location: ../author-login.php");
	}


	if(isset($_POST["modifyArticle"])) {

		
		$articleId = $_POST["articleId"];

		$query = mysqli_query($con, "SELECT * FROM article WHERE id = '$articleId'");
		$row = mysqli_fetch_array($query);
		$title = $row["title"];
		$text = $row["text"];
		$imgSrc = $row["image_src"];

		echo '
				<form method="POST" action="modify-article.php">
					<span>Article Title</span>
					<textarea name="title">'.$title.'</textarea><br>

					<span>Article Text</span>
					<textarea name="articleText">'.$text.'</textarea><br>

					<span>Image Source</span>
					<textarea name="imageSrc">'.$imgSrc.'</textarea><br>

					<input type="submit" name="updateArticle" value="Update Article">
					<input type="submit" name="deleteArticle" value="Delete Article">

					<input name="articleId" type="hidden" value=' . $articleId . '>
				</form>

			 ';
	}


	if(isset($_POST["updateArticle"])) {
		$title = $_POST["title"];
		$text = $_POST["articleText"];
		$imgSrc = $_POST["imageSrc"];
		$id = $_POST["articleId"];

		$query = mysqli_query($con, "UPDATE article SET title = '$title', text = '$text', image_src = '$imgSrc' WHERE id = '$id'");

		echo "Updated Successfully";
		echo "<a href='author-page.php'>Back to Author Page</a>";

	}


	if(isset($_POST["deleteArticle"])) {
		$id = $_POST["articleId"];

		$query = mysqli_query($con, "DELETE FROM article WHERE id = '$id'");

		echo "Deleted Successfully";
		echo "<a href='author-page.php'>Back to Author Page</a>";

	}

?>