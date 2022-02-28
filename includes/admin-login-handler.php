<?php
	
	include("config.php");
	session_start();

	if(isset($_POST["loginButton"]))
	{
		$username = $_POST["username"];
		$pw = $_POST["password"];

		$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username'");


		if(mysqli_num_rows($query) == 1 && mysqli_fetch_array($query)["password"] == $pw){

			$_SESSION['userLoggedIn'] = $username;
		}
	}


	if(isset($_SESSION['userLoggedIn']))
	{
		header("Location: admin-page.php");
	}
	else
	{
		header("Location: ../admin-login.php");
	}

?>