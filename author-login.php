<?php include("includes/navbar.php") ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>TechBlog | Author</title>
	<link rel="stylesheet" type="text/css" href="static/public_styles.css">
</head>
<body>

	<div class="loginContainer">
		<div class="loginHeading">
			<h1 style="background-color: grey; color: white; padding: 10px;">Author Login</h1>
	<h2>Enter Author Details</h2>
		</div>

		<div class="loginForm">
			<form method="POST" action="includes/author-login-handler.php">
				<span>Author Name</span>
				<input type="text" name="authorName">

				<br>
				
				<span>Password</span>
				<input type="password" name="authorPw">
				
				<br>

				<input type="submit" name="authorLogin" value="Login">
			</form>
		</div>
	</div>
	
</body>
</html>
