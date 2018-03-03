
<?php
$title="Thread";
include('include.php');
$log='<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Thank You For Asking</p>
						<h2>Question Uploaded</h2>
					</header>
					<footer class="align-center">
						<a href="thread.php" class="button alt">Refresh</a>
				</div>';
?>

<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Share Your Ideas About These Question</p>
						<h2>Questions Asked</h2>
					</header>
					<footer class="align-center">
						<a href="#task" class="button alt">Below</a>
				</div>
				<?php if(isset($_POST['post'])) echo $log;?>
			</section>
			<?php
			
			echo'<a name="task"></a>';
			
			include('Hthreads.php');
?>
		<section id="two" class="wrapper style3" style="line-heigt:3em;">
				<div class="inner">
								<a name="ask"></a>

					<header class="align-center">
					<p>Got A Question?</p>
						<h2>ASK NOW!</h2>
					</header>
				</div>

				
			</section>
			
			   <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
        <link rel="stylesheet" href="css/site.css">
        <link rel="stylesheet" href="src/richtext.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="src/jquery.richtext.js"></script>

<style>

 {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/* general */
body {
    background-color: #EFEFEF;
}


/* page */
.page-wrapper {
    margin: 0 auto;
    width: 960px;
    max-width: 100%;
}


/* box */
.box-content {
    padding:20px;
    background-color: #EFEFEF;
}


textarea {
    background-color:#FAFAFA;
    border:#EFEFEF solid 1px;
    color:#333;
    height:100px;
    width:100%;
}


/* richtext custom style */
.richText {
    margin-top: 40px;
    -webkit-box-shadow: 0 0 20px 0 #333;
    -moz-box-shadow: 0 0 20px 0 #333;
    box-shadow: 0 0 20px 0 #333;
}
</style>
<form action=""
method="post">
        <div class="page-wrapper box-content">
		
		<label>Your Question:</label>
		
            <textarea class="content" name="post_content"></textarea><br/>
			<style>
			.form input[type="submit"],
.form input[type="button"]
{
	position: relative;
	display: block;
	color:white;
	text-decoration:bold;
	margin: 0 auto;
	background: #333;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #black;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
	
}
.form input[type="submit"]:hover,
.form input[type="button"]:hover
{
	background:grey;
	color:white
	text-decoration:bold;
}

</style>

			
			<div class="form">
							<input type="submit" name="post" value="Ask!"/>

</form>
        </div>
		<?php
		include('dbcon.php');
		
		if(isset($_POST['post'])){
			$ip=$_SERVER["REMOTE_ADDR"];
		$post_content=mysqli_escape_string($con,trim($_POST['post_content']));
			if($post_content==''){
				header('location:index.php');
			}else{
		mysqli_query($con,"INSERT INTO post(content,ip)VALUES('$post_content','$ip')")or die(mysqli_error());
		echo '<h2>Your Question Has been Uploaded. <a href="thread.php#task">Click here</a></h2>';
		
		
		}
		}
		?>

        <script>
        $(document).ready(function() {
            $('.content').richText();
        });
        </script>
		
	</div>	
		
		
	
			<?php
			include('footer.php');
			?>