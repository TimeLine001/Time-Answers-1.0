<?php 
$title="News";
include('include.php');
?>

<br>

<section id="two" class="wrapper style3">
				<div class="inner">
				
					<footer class="align-center">
						<a href="blog/" class="button alt" target="_blank">Full Screen</a>
				</div>
			</section><br>
		<style>
			iframe {
    display: block;
    width: 100%;
    margin-left:-40%;
    margin: 0 auto;
	height:400px;
    border: 0;
}
			</style><br>
					<iframe 
src="blog/" name="news">
</iframe>

<br>

				<section id="two" class="wrapper style3">
				<div class="inner">
					
						<header class="align-center">
						<p>Be The News</p>
						<h2>Share Your Story</h2>
					</header>
					<footer class="align-center">
						<a href="blog/admin/login.php" class="button alt" target="news">Login</a>
						<p> To become a publisher contact <a href="mailto:timeanswers@gmail.com">Time Answers</a>
				</div>
			</section><br>
			<?php
include('footer.php');
?>