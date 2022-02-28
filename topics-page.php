<?php 

	include("includes/config.php");
	include("includes/navbar.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>TechBlog | Topics</title>
	<link rel="stylesheet" type="text/css" href="static/public_styles.css">
</head>
<body>
	<h1 style="margin-left: 7px">Topics</h1>

	<?php

		$query = mysqli_query($con, "SELECT DISTINCT topic FROM article");
		$count = 1;

		while($row = mysqli_fetch_array($query))
		{
			echo '<h3><a href="includes/view-topic.php?topic='. $row["topic"] .'" class="topics">'. $count . ". ". $row["topic"] .'</a></h3>';
			echo "<hr>";
			$count += 1;
		}

	?>

	

</body>
</html>