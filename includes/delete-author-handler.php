<?php

	include("config.php");

	if(isset($_POST["authorId"])){
		$id = $_POST["authorId"];
		$deleteAuthorQuery = mysqli_query($con, "DELETE FROM author WHERE id = '$id'");
		$deleteArticlesByAuthorQuery = mysqli_query($con, "DELETE FROM article WHERE author_id = '$id'");
	}

?>