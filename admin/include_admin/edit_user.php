<?php 
  if (isset($_GET['edit'])) {
    $user_id = $_GET['edit'];
    $query = "SELECT * FROM `users` WHERE userid=$user_id";
    $result = mysqli_query($connect,$query);
    while ($row=mysqli_fetch_assoc($result)) {
      $username = $row['username'];
      $userfirstname=$row['firstname'];
      $userlastname = $row['lastname'];
      $userimage = $row['user_image'];
      $userpassword = $row['user_password'];
      $useremail = $row['user_email'];
      $userrole = $row['user_role'];
    }
  }

  if (isset($_POST['edit_user'])) {
    $username = $_POST['username'];
    $userfirstname = $_POST['userfirstname'];
    $userlastname = $_POST['userlastname'];
    $useremail = $_POST['useremail'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($user_image_temp, "../image/$user_image"); 

     if (empty($user_image)) {
      $query="SELECT * FROM users WHERE userid=$user_id";
      $select_image=mysqli_query($connect,$query);
      while ($row=mysqli_fetch_assoc($select_image)) {
        $user_image=$row['user_image'];
      }

     }

    $user_password = $_POST['user_password'];
    $userrole = $_POST['userrole'];
    $query = "UPDATE users SET username='$username',firstname='$userfirstname',lastname='$userlastname',user_image='$user_image',user_password='$user_password',user_email='$useremail',user_role='$userrole' WHERE userid=$user_id";
    $result = mysqli_query($connect,$query);
   if (!$result) {
    die('Query Fail').mysqli_error($result);
    }
    echo "Update User Successfully ->"."<a href='user.php'>View All User</a>";
  }
 ?>
<form action="" method="Post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="" class="control-label">User Name</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username ?>">  
  </div>

  <div class="form-group">
    <label for="" class="control-label">First Name</label>
    <input type="text" class="form-control" name="userfirstname" value="<?php echo $userfirstname ?>">
    
  </div>
  <div class="form-group">
    <label for="" class="control-label">Last Name</label>
    <input type="text" class="form-control" name="userlastname" value="<?php echo $userlastname ?>">
    
  </div>
  <div class="form-group">
    <label for="" class="control-label">Email</label>
    <input type="text" class="form-control" name="useremail" value="<?php echo $useremail ?>">
      
  </div>
  <div class="form-group">
    <label for="" class="control-label">User Image</label>
    <input type="file" class="form-control" name="image" >
    <img class='img-responsive' width=100px src='../image/<?php echo $userimage ?>' alt=''>
  </div>

  <div class="form-group">
    <label for="" class="control-label">User Role</label>
    <select type="text" id="" class="form-control" name="userrole" value="<?php echo $userrole ?>">
    <option value="<?php echo $userrole ?>"><?php echo $userrole; ?></option>
    <?php 
      if ($userrole =='admin') {
        echo '<option value="subscriber">Subscriber</option>';
      }else{
        echo '<option value="admin">Admin</option>';
      } 
     ?></select>
  </div>

  <div class="form-group">
    <label for="" class="control-label">User Password</label>
    <input type="Password" class="form-control" name="user_password" value="<?php echo $userpassword ?>">
    
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
  </div>
</form>
