<?php 
include('header.php');
?>
<body>
<br><br>
    <div class="container">
	
    <div class="control-group">
        <div class="page-wrapper box-content">

    <div class="controls">
    </div>
	</div>
    </div>
   
    <div class="control-group">
    <div class="controls">
    </div>
    </div>
	
	<div class="control-group">
	
    <div class="controls">
 
 
    <table class="table table-bordered">

    <thead>
	
    </thead>
    <tbody>
			<?php
			if(isset($_POST['comment'])){
			$msg='<h3>Thanks For Your Contribution</h3><a href="thread.php"class="button alt">Refresh</a>';
			echo $msg;
			}
	$query=mysqli_query($con,"select * from post order by post_id DESC LIMIT 30")or die(mysqli_error());
	while($row=mysqli_fetch_array($query)){
	$id=$row['post_id'];
	?>
	
	
    <tr>
    <td><?php echo $row['content'];
	echo'<br><br><strong>Posted By: </strong>';
	echo $row['ip'];
	
	?></td>
    <td width="50">
	<?php 
	$comment_query=mysqli_query($con,"select * from comment where post_id='$id'")or die(mysqli_error());
	$count=mysqli_num_rows($comment_query);
	?>
	<a href="#<?php echo $id;?>" data-toggle="modal"><i class="icon-comments-alt"></i>&nbsp;<span class="badge badge-info"><?php echo $count; ?></span>Discuss</a>
	</td>
	<?php if($ip=='192.168.43.1'){?>
    <td width="40"><a class="btn btn-danger" href="delete_post.php<?php echo '?id='.$id;?>"><i class="icon-trash"></i></a></td>
    </tr>
	<?php }?>
	    <!-- Modal -->
	<div id="<?php echo $id;?>" class="modal hide fade modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    </div>
    <div class="modal-body">
	
	<!----comment -->
		 <form  method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>">
    <textarea rows="3" name="comment_content" class="span6" placeholder="Your idea"></textarea>
	<br>
	<br>
    <button name="comment" type="submit" class="btn btn-info"><i class="icon-share"></i>&nbsp;Share Opinion</button>
	</form>
	<br>
	<br>
	
	<?php $comment=mysqli_query($con,"select * from comment where post_id='$id'")or die(mysqli_error($con));
	while($comment_row=mysqli_fetch_array($comment)){ ?>

	<div class="alert alert-success"><?php echo $comment_row['content']; ?></div>
	
	<?php } ?>
	<!--- end comment -->
	
	
	
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
   
    </div>
    </div>
	  
	
	<?php  } ?>
    </tbody>
    </table>
 

    </div>
    </div>
	
    </form>

	
	


	
	
		
	
	
		
		
		</div>
		
		
		
			<?php
		if(isset($_POST['comment'])){
		$comment_content=mysqli_escape_string($con,trim($_POST['comment_content']));
		$post_id=$_POST['id'];
		$msg="";
		if($comment_content==''){
	
			}else{

		mysqli_query($con,"insert into comment (content,post_id) values('$comment_content',$post_id)")or die(mysqli_error());
				
			}
		}
		?>
</body>
</html>