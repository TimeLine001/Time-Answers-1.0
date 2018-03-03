<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Time Answers | News</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>



<?php
		
include('conn.php');
if(isset($_POST['search'])){
	$query =mysqli_real_escape_string($con,trim($_POST['search']));
	if($query==""){
	header('location:index.php');
	}
		

	$results1 = mysqli_query($con,"SELECT * FROM blog_posts_seo	
	WHERE( Dept LIKE '%".$query."%') OR(postDesc LIKE'%".$query."%')OR(postTitle LIKE'%".$query."%') ORDER BY postID DESC LIMIT 10") or die(mysqli_error());
	if(mysqli_num_rows($results1) > 0){
		echo'<h4>Latest Content on <em>'.$query.'</em>
		<p><a href="./">Back to Articles</a></p>';
		while($results = mysqli_fetch_array($results1)){
			
			echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$results['postSlug'].'">'.$results['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($results['postDate'])).'</p>';
						echo '<p>'.$results['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$results['postSlug'].'">Read More</a></p>';				
					echo '</div><hr/>';

				}
	}else{
					echo '<p>No results please be sure to use the right syntax e.g AEE,Soil science, 200L</p>';
					echo'		<p><a href="./">Bact to Articles</a></p>';

}
	}


?>
</body>
</html>