<?php
include('dbcon.php');
$code='Iamkazami01';
$id=$_GET['id'];
echo'<form action="" method="post">
<label>Restricted Access: </label>
<input type="password" name="pass"/>
<input type="submit" name="submit"value="Enter Code"/>';
if(isset($_POST['submit'])){
	$pass=mysqli_real_escape_string($con,trim($_POST['pass']));
	if($pass!=$code){
		echo'<p color:red>Wrong Daily Code Enter</p>';
	header('location:thread.php');
	}else{
mysqli_query($con,"delete from post where post_id='$id'")or die(mysqli_error($con));
header('location:thread.php');
	}
}


?>