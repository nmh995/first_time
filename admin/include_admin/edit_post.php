<?php 
   if(isset($_GET['p_id'])){
   	$p_id=$_GET['p_id'];
   	$query="SELECT * FROM `post` WHERE post_id=$p_id";
   	$result=mysqli_query($connect,$query);
   	while($row=mysqli_fetch_assoc($result)){
   		$post_id=$row['post_id'];
   		$post_author=$row['post_author'];
   		$post_title=$row['post_title'];
   		$post_category_id=$row['post_category_id'];
   		$post_status=$row['post_status'];
   		$post_image=$row['post_image'];
   		$post_tag=$row['post_tag'];
   		$post_comment_count=$row['post_comment_count'];
   		$post_date=$row['post_date'];
   		$post_content=$row['post_content'];
   	}
   }

?>
<?php 
  if (isset($_POST['update_post'])) {
     $post_title=$_POST['title'];
  	 $post_category_id=$_POST['post_category_id'];
  	 $post_author=$_POST['post_author'];
  	 $post_status=$_POST['post_status'];

  	 $post_image=$_FILES['image']['name'];
  	 $post_image_temp=$_FILES['image']['tmp_name'];
  	 move_uploaded_file($post_image_temp,"../img/$post_image");
     
  	 if (empty($post_image)) {
  	 	$query="SELECT * FROM `post` WHERE post_id=$p_id";
  	 	$select_image=mysqli_query($connect,$query);
  	 	while ($row=mysqli_fetch_assoc($select_image)) {
  	 		$post_image=$row['post_image'];
  	 		# code...
  	 	}

  	 }

   	 $post_tag=$_POST['post_tag'];

  	 $post_content=$_POST['post_content'];
  	 $post_date=date('d-m-y');
     $post_comment_count=5;
  	 $post_view_count=10;
     
     	$query="UPDATE `post` SET `post_category_id`='$post_category_id',`post_title`='$post_title',`post_author`='$post_author',`post_date`=now(),`post_image`='$post_image',`post_content`='$post_content',`post_tag`='$post_tag',`post_comment_count`='$post_comment_count',`post_status`='$post_status',`view_count`='$post_view_count' WHERE post_id=$p_id";
  	    $result=mysqli_query($connect,$query);
        if(!$result)
        {
          die("Query Fail".mysqli_error($result));
        }

  }
 ?>

<!-- 
   // 
   // } -->
 
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="control-label">Post Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Category Id</label>
		<select name="post_category_id" id="" class="form-control">
			<?php 
             $query="SELECT * FROM `category`";
             $result=mysqli_query($connect,$query);
             while ($row=mysqli_fetch_assoc($result)) {
             	$cat_id=$row['catid'];
             	$cat_title=$row['cattitle'];
             	echo "<option value='{$cat_id}'>{$cat_title}</option>";
             }
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Author</label>
		<input type="text" class="form-control" name="post_author" value=" <?php echo $post_author; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Status</label>
  		<select type="text" id="" class="form-control" name="post_status" value="<?php echo $post_status ?>">
      <option value="<?php echo $post_status ?>"><?php echo $post_status; ?></option>
          <?php 
            if ($post_status =='public') {
              echo '<option value="draft">draft</option>';
            }else{
              echo '<option value="public">public</option>';
            } 
           ?>
     </select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Image</label>
		<input type="file" class="form-control" name="image">
		<img src="../image/<?php echo $post_image; ?>" alt=""  class="img-responsive " width="200px" height ="150px">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Tag</label>
		<input type="text" class="form-control" name="post_tag" value="<?php echo $post_tag; ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Post Content</label>
		<!-- <textarea name="post_content" id="" cols="30" rows="10" class="form-control" ><?php echo "$post_content"; ?></textarea> -->
    <textarea name="post_content" id="editor" cols="30" rows="10" class="form-control"><?php echo "$post_content"; ?></textarea>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
	</div>
	
	
	<div class="form-group">
		
		<input type="submit" class="btn btn-success" name="update_post" value="Update Post">
	</div>
</form>