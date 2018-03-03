	  <table class="table table-bordered">
			<?php
	$query=mysqli_query($con,"select * from post order by post_id DESC ")or die(mysqli_error());
	while($row=mysqli_fetch_array($query)){
	$id=$row['post_id'];
	?>
	
	
    <tr>
    <td><?php echo $row['content'];?></td>
    <td width="50">
	<?php 
	$comment_query=mysqli_query($con,"select * from comment where post_id='$id'")or die(mysqli_error());
	$count=mysqli_num_rows($comment_query);
	?>
	<a href="#<?php echo $id;?>" data-toggle="modal"><i class="icon-comments-alt"></i>&nbsp;<span class="badge badge-info"><?php echo $count; ?></span>Answer</a>
	</td>
    <td width="40"><a class="btn btn-danger" href="delete_post.php<?php echo '?id='.$id;?>"><i class="icon-trash"></i></a></td>
    </tr>
	
	    <!-- Modal -->
	<div id="<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    </div>
    <div class="modal-body">
	<?php };?>
	</div>
	</div>
	