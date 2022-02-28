<?php include("includes/navbar.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Admin</title>
	<link rel="stylesheet" type="text/css" href="static/public_styles.css">
</head>
<body>
	<div class="loginContainer">
		<div class="loginHeading">
			<h1 style="background-color: grey; color: white; padding: 10px;">Admin Login</h1>
			<h2>Enter Admin Details</h2>
		</div>

		<div class="loginForm">
			<form method="POST" action="includes/admin-login-handler.php">
				<span>Username</span>
				<input type="text" name="username" required="">
				<br>
				<span>Password</span>
				<input type="password" name="password" required="">
				<br>
				<input type="submit" name="loginButton">
			</form>
		</div>
	</div>
</body>
</html>