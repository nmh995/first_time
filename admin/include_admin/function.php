<?php 

	function insert_category(){
			global $connect;
		  if (isset($_POST['submit'])) {
           $cat_title=$_POST['cat_title'];
           $query="INSERT INTO category(cattitle) VALUES ('$cat_title')";
           $result=mysqli_query($connect,$query);
       }
	}

	function delete_category(){
		global $connect;
		    if (isset($_GET['delete'])) {
            $cat_id=$_GET['delete'];
            $query="DELETE FROM category WHERE catid=$cat_id";
            $result=mysqli_query($connect,$query);
            header('location:add_categories.php');
            # code...}
	}
}
 ?>