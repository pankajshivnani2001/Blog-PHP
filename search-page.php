<?php 
	include("includes/config.php");
	include("includes/navbar.php");	
?>

<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Search</title>
	<link rel="stylesheet" type="text/css" href="static/public_styles.css">
</head>
<body>
	<h1 style="text-align: center;">Search For Articles, Topics, or Authors</h1>
	<form method="GET" action="search-page.php" style="text-align: center;">
		<input type="text" name="searchQuery">
		<input type="submit" name="search" value="Search">
	</form>
</body>
</html>


<?php 
	
	if(isset($_GET["search"]))
	{
		$keyword = $_GET["searchQuery"];

		$articleQuery = mysqli_query($con, "SELECT * FROM article WHERE title LIKE '%$keyword%'");
		$topicQuery = mysqli_query($con, "SELECT DISTINCT topic FROM article WHERE topic LIKE '%$keyword%'");
		$authorQuery = mysqli_query($con, "SELECT * FROM author WHERE name LIKE '%$keyword%'");

		echo "<div class='searchResults'>";
		echo "<h2>Articles</h2>";
		while($row = mysqli_fetch_array($articleQuery))
		{
			echo "<h3>". $row["title"]. "</h3>";
			echo '<a href = "includes/view-article.php?articleId='. $row["id"] .'">View Article</a><br><br><br>';
			echo "<hr>";
		}

		echo "<h2>Topics</h2>";
		while($row = mysqli_fetch_array($topicQuery))
		{
			echo '<h3><a style= "margin:0px;" href="includes/view-topic.php?topic='. $row["topic"] .'" class="topics">' . $row["topic"] .'</a></h3>';
			echo "<hr>";
		}

		echo "<h2>Authors</h2>";
		while($row = mysqli_fetch_array($authorQuery))
		{
			$id = $row["id"];
			echo "<h3><a href = 'includes/author-profile.php?authorId=". $id ."'>". $row["name"]. "</a></h3>";
			echo "<hr>";
			
		}

		echo "</div>";
	}

?>