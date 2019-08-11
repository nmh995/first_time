<?php
	if (isset($_POST['create_post'])) {
	   $post_title = $_POST['post_title'];
	   $post_category_id = $_POST['post_category_id'];
	   $post_author = $_POST['post_author'];
	   $post_status = $_POST['post_status'];

	 	 $post_image = $_FILES['image']['name'];
	 		 $post_image_temp = $_FILES['image']['tmp_name'];
	 		 move_uploaded_file($post_image_temp, "../image/$post_image");

	   $post_tag = $_POST['post_tag'];
	   $post_content = $_POST['post_content'];
	   $post_date = date('m-d-y');
	   // $post_comment_count = 5;
	   $post_view_count = 0;

	 	$query ="INSERT INTO post(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag,post_status, view_count) VALUES ('$post_category_id','$post_title','$post_author','$post_date','$post_image','$post_content','$post_tag','$post_status','$post_view_count')";
	 	$result = mysqli_query($connect,$query);
	 	if (!$result) {
	 		die("Query Fail".mysqli_error($result));
	 	}
	 	echo "Create Post Successfully => "."<a href='post.php'>View All Post</a>";
	 } 
 ?>

<form action="" method="Post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="control-label">Post Title</label>
		<input type="text" class="form-control" name="post_title">

	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Category ID</label>
		<input type="text" class="form-control" name="post_category_id">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Author</label>
		<input type="text" class="form-control" name="post_author">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Status</label>
		<select name="post_status" id="" class="form-control">
			<option value="">---Select Status Role---</option>
			<option value="draft">Draft</option>
			<option value="public">Public</option>
		</select>
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Image</label>
		<input type="file" class="form-control" name="image">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Tag</label>
		<input type="text" class="form-control" name="post_tag">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Content</label>
		<textarea type="text" id="editor" class="form-control" name="post_content"></textarea> 
		<script>
		    ClassicEditor
		        .create( document.querySelector( '#editor' ) )
		        .catch( error => {
		            console.error( error );
		        } );
		</script>
		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Upload Post">
	</div>
</form>
