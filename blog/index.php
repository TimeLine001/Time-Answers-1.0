<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Time Answers | News</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">

		<h1>Latest News	
<style>


form{
	padding: 0;
  margin: 0;
}

input.search-text {
	color:red;
	position:absolute;
	left:5px;
	z-index:5;
	-webkit-transition: z-index 0.8s, width 0.5s, background 0.3s ease, border 0.3s;
	transition: z-index 0.8s, width 0.5s, background 0.3s ease, border 0.3s;
	height: 45px;
	width: 0;
	margin: 0;
	padding: 5px 0 5px 40px;
	-webkit-box-sizing: border-box;
	 box-sizing: border-box;
	font-size: 16px;
	font-size: 1rem;
	cursor: pointer;
	border-radius: 30px;
	border: 1px solid red;
	/*background: url(search.png) no-repeat left 9px center transparent;*/
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGhlaWdodD0iNTEycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik01MDMuODY2LDQ3Ny45NzRMMzYwLjk1OCwzMzUuMDUyYzI4LjcyNS0zNC41NDQsNDYuMDE3LTc4LjkxMiw0Ni4wMTctMTI3LjMzNiAgYzAtMTEwLjA4NC04OS4yMjctMTk5LjMxMi0xOTkuMzEyLTE5OS4zMTJDOTcuNTk5LDguNDAzLDguMzUxLDk3LjYzMSw4LjM1MSwyMDcuNzE1YzAsMTEwLjA2NCw4OS4yNDgsMTk5LjMxMiwxOTkuMzEyLDE5OS4zMTIgIGM0OC40MzUsMCw5Mi43OTItMTcuMjkyLDEyNy4zMzYtNDYuMDE3bDE0Mi45MDgsMTQyLjkyMkw1MDMuODY2LDQ3Ny45NzR6IE0yOS4zMzEsMjA3LjcxNWMwLTk4LjMzNCw3OS45ODctMTc4LjMzMiwxNzguMzMyLTE3OC4zMzIgIGM5OC4zMjUsMCwxNzguMzMyLDc5Ljk5OCwxNzguMzMyLDE3OC4zMzJzLTgwLjAwNywxNzguMzMyLTE3OC4zMzIsMTc4LjMzMkMxMDkuMzE4LDM4Ni4wNDcsMjkuMzMxLDMwNi4wNSwyOS4zMzEsMjA3LjcxNXoiIGZpbGw9IiMzNzQwNEQiLz48L3N2Zz4=) no-repeat left 9px center transparent;
  background-size:24px;
}
input.search-text:focus {
	z-index:3; 
	width: 270px;
	border: 1px solid #666;  
	background-color: white;
	outline: none;
	cursor:auto;
	padding-right: 10px;
}

input.search-submit {
	position: relative;
	z-index: 4;
	top:2px;
	left: 5px;
	width: 45px;
	height: 45px;
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	border-radius: 30px;
	cursor: pointer; 
	background:none;
}

input.search-text::-webkit-search-cancel-button {
	cursor:pointer;
}
</style>
		<form action="search.php" method="post" class="search-form">
		<input type="submit" value="" class="search-submit"> 
		<input type="search" name="search" class="search-text" placeholder="Enter Department or Level" autocomplete="off">
</form></h1>


		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate FROM blog_posts_seo ORDER BY postID DESC LIMIT 30');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postSlug'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p><strong>'.$row['postDesc'].'</p></strong>';				
						echo '<p><a href="viewpost.php?id='.$row['postSlug'].'">Read More</a></p>';				
					echo '</div><hr/>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>


</body>
</html>