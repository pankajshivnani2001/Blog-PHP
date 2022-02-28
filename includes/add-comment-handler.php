<?php 
	include("config.php");

	if(isset($_POST["addComment"])) {
		$articleId = $_POST["articleIdForComment"];
		$commentText = $_POST["commentText"];
		$displayName = $_POST["userName"];

		$query = mysqli_query($con, "INSERT INTO comment(article_id, comment_text, name) VALUES ('$articleId', '$commentText', '$displayName') ");

		
		header("Location: view-article.php?articleId=" . $_POST["articleIdForComment"]);
	}

?>