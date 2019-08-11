 <?php 
 if (isset($_POST['update'])) {
  $cat_id=$_GET['edit'];
  $cat_title=$_POST['cat_title'];
  $query="UPDATE category SET cattitle='$cat_title' WHERE catid=$cat_id";
  $result=mysqli_query($connect,$query);
                            # code...
}

?>
<form action="" method="post">
  <div class="form-group">
    <label for="cat_title" class="control-label">Update Category:</label>
    <?php 
    if (isset($_GET['edit'])) {
      $cat_id=$_GET['edit'];
      $query="SELECT * FROM `category` WHERE catid=$cat_id";
      $result=mysqli_query($connect,$query);
      while ($row=mysqli_fetch_assoc($result)) {
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];

        ?>
        
        
        <input type="text" class="form-control" name="cat_title" required="required" value="<?php echo $cat_title;?>" >
        <?php 
      }
    }
    ?>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update" value="Update Category" >
  </div>
  
</form>