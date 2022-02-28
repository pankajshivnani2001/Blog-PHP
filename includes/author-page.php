<?php 
		
	include("config.php");
	session_start();

	if(isset($_SESSION["authorLoggedIn"]))
	{
		$id = $_SESSION["authorLoggedIn"];

		$authorQuery = mysqli_query($con, "SELECT * FROM author WHERE id = '$id'");

		echo "<h1>Welcome Back, " . mysqli_fetch_array($authorQuery)["name"] . "</h1>";

		$articleQuery = mysqli_query($con, "SELECT * FROM article WHERE author_id = '$id'");

		echo '<form method="POST" action="author-logout.php">
					<input type="submit" name="authorLogout" value="LogOut">
			  </form>';

		echo "<h2> Your Articles </h2>";
		while ($row = mysqli_fetch_array($articleQuery)) {
			echo "<span> Article ID: " . $row["id"] . " </span><br>";
			echo "<span> Article Title: " . $row["title"] . " </span><br>";
			echo '

				<form method="POST" action="modify-article.php">
					<input name="articleId" type="hidden" value=' . $row["id"] . '>
					<input type="submit" name="modifyArticle" value="Modify">
				</form>
				<a href = "view-article.php?articleId='. $row["id"] .'">View</a><br><br><br>

					';
			//instead of button, use form and submit button, use a hidden textfield to pass the articleId to the modify-article.php page.
		}
	}

	else
	{
		header("Location: ../author-login.php");
	}

	echo "
			<br><br>
			<form method='POST' action='addArticle.php'>
				<input type='submit' name='addArticle' value='Add New Article'>
			</form>
			";

?>


