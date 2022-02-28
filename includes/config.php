<?php
	ob_start();
	$timzone = date_default_timezone_set("Asia/Kolkata");

	$con = mysqli_connect("localhost", "root", "", "blog-db");

	if(mysqli_connect_errno()){
		echo "Failed to Connect" . mysqli_connect_errno();
	}

?>