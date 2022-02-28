<?php 

	include("config.php");
	session_start();

	if(isset($_POST["authorLogin"])){
		$authorName = $_POST["authorName"];
		$pw = $_POST["authorPw"];

		$query = mysqli_query($con, "SELECT * FROM author where name = '$authorName'");

		if(mysqli_num_rows($query) == 1)
		{
			if($pw == '12345'){
				$_SESSION["authorLoggedIn"] = mysqli_fetch_array($query)["id"];
			}
		}
	}


	if(isset($_SESSION['authorLoggedIn']))
	{
		header("Location: author-page.php");
	}

	else
	{
		header("Location: ../author-login.php");
	}
?>