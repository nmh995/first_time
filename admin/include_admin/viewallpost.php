<?php 
  if(isset($_POST['checkboxarray'])){
    foreach($_POST['checkboxarray'] as $checkboxvalue){
      $option = $_POST['option'];
      switch ($option) {
        case 'public':
          $query = "UPDATE post SET post_status='$option' WHERE post_id=$checkboxvalue";
          $result = mysqli_query($connect,$query);
          break;

        case 'draft':
          $query = "UPDATE post SET post_status='$option' WHERE post_id=$checkboxvalue";
          $result = mysqli_query($connect,$query);
          break;

        case 'delete':
          $query = "DELETE FROM post WHERE post_id=$checkboxvalue";
          $result = mysqli_query($connect,$query);
          break;

        case 'clone':
          $query = "SELECT * FROM post WHERE post_id=$checkboxvalue";
          $result = mysqli_query($connect,$query);
          while($row = mysqli_fetch_assoc($result)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tag = $row['post_tag'];
            $post_comment_count = $row['post_comment_count'];
            $post_content = $row['post_content'];
            $post_date = $row['post_date'];
          }
          $query = "INSERT INTO `post`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`,  `post_status`) VALUES ($post_category_id,'$post_title','$post_author','$post_date','$post_image','$post_content','$post_tag','$post_status')";
          $result = mysqli_query($connect,$query);
        
        default:
          # code...
          break;
      }
    }
  }
 ?>
<div class='col-xs-12'>
  <form action="" method="post">
    <div class="col-xs-4 form-group">
      <select name="option" id="" class="form-control">
        <option value="">-- Select Option --</option>
        <option value="public">Public</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
      </select>
    </div>
    <div class="col-xs-2 form-group">
      <input type="submit" name="apply" value="Apply" class="btn btn-primary">
      <input type="submit" name="add_new" value="Add New" class="btn btn-success">
    </div>
   <table class="table table-bordered table-reponsive">
       <thead>
           <tr>
              <th><input type="checkbox" id="selectall"></th>
               <th>ID</th>
               <th>Author</th>
               <th>Title</th>
               <th>Category</th>
               <th>Status</th>
               <th>Image</th>
               <th>Tags</th>
               <th>Comment</th>
               <th>Post View Count</th>
               <th>Date</th>
               <th>Delete</th>
               <th>Update</th>
           </tr>
       </thead>
       <tbody>
        <?php 
            $query = "SELECT * FROM post";
            $result = mysqli_query($connect,$query);
            while ($row = mysqli_fetch_assoc($result)){
                $post_id= $row['post_id'];
                $post_author = $row['post_author'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_date = $row['post_date'];
                $post_image= $row['post_image'];
                $post_content = $row['post_content'];
                $post_tag = $row['post_tag'];
                $post_comment_count = $row['post_comment_count'];
                $post_view_count = $row['view_count'];
                $post_status = $row['post_status'];
                $view_count = $row['view_count'];
                echo "<tr>";
              ?>
                <td><input type='checkbox' class="checkBoxes" name="checkboxarray[]" value="<?php echo $post_id ?>"></td>
              <?php
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";
                $query= "SELECT * FROM category WHERE catid=$post_category_id";
                $cat_result = mysqli_query($connect,$query);
                while ($row = mysqli_fetch_assoc($cat_result))
                {
                  $catid = $row['catid'];
                  $cat_title=$row['cattitle'];
                  echo "<td>{$cat_title}</td>";
                }
                echo "<td>{$post_status }</td>";
                echo "<td><img class='img-responsive' width=100px src='../image/{$post_image}' alt=''></td>";
                echo "<td>{$post_tag}</td>";
                echo "<td>{$post_comment_count }</td>";
                echo "<td><a href='post.php?reset=$post_id'>{$post_view_count}</a></td>";
                echo "<td>{$post_date}</td>";
                echo "<td><a onclick=\"javaScript: return confirm('Are You Sure You Want To Delete');\" href='post.php?delete=$post_id'>Delete</a></td>";
                echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Update</a></td>";
                echo "</tr>";
              }
         ?>
       </tbody>
   </table>
  </form>

 <?php 
        if (isset($_GET['delete'])) {
          $delete_post_id = $_GET['delete'];
          $query = "DELETE FROM `post` WHERE post_id=$delete_post_id";
          $result = mysqli_query($connect,$query);
          if (!$result) {
            die('Query Fail'.mysqli_error($result));
          }
          header('location:post.php');
        }

        if (isset($_GET['reset'])) {
          $reset_post_id = $_GET['reset'];
          $query = "UPDATE post SET view_count=0 WHERE post_id=$reset_post_id";
          $result = mysqli_query($connect,$query);
          if (!$result) {
            die('Query Fail'.mysqli_error($result));
          }
          header('location:post.php');
        }
  ?>