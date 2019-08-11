
    <?php include_once "include_admin/header.php" 

        ?>
    <div id="wrapper">

        <!-- Navigation -->
      <?php include_once "include_admin/nav.php" ?>

      <?php

      if(isset($_SESSION['username'])){
            $username = $_SESSION['username']; 
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
              $query="SELECT * FROM users WHERE username='$username'";
              $select_image=mysqli_query($connect,$query);
              while ($row=mysqli_fetch_assoc($select_image)) {
                $user_image=$row['user_image'];
              }

             }

            $user_password = $_POST['user_password'];
            $userrole = $_POST['userrole'];
            $query = "UPDATE users SET username='$username',firstname='$userfirstname',lastname='$userlastname',user_image='$user_image',user_password='$user_password',user_email='$useremail',user_role='$userrole' WHERE username='$username'";
            $result = mysqli_query($connect,$query);
           if (!$result) {
            die('Query Fail').mysqli_error($result);
            }
          }
       ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author Name</small>
                        </h1>
                        
                    </div>

                </div>
                <!-- /.row -->
                <?php 
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];

                        $query = "SELECT * FROM users WHERE username='$username'";
                        $result = mysqli_query($connect,$query);
                        if(!$result){
                            die("Failed".mysqli_error($connect));
                        }
                        while($row= mysqli_fetch_assoc($result)){
                            $user_id=$row['userid'];
                            $user_name = $row['username'];
                            $user_password = $row['user_password'];
                            $user_firstname= $row['firstname'];
                            $user_lastname = $row['lastname'];
                            $user_email = $row['user_email'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
                        }
                    }
                 ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="Post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="" class="control-label">User Name</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $user_name ?>">  
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">First Name</label>
                            <input type="text" class="form-control" name="userfirstname" value="<?php echo $user_firstname ?>">
                            
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Last Name</label>
                            <input type="text" class="form-control" name="userlastname" value="<?php echo $user_lastname ?>">
                            
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="text" class="form-control" name="useremail" value="<?php echo $user_email ?>">
                              
                          </div>
                          <div class="form-group">
                            <label for="" class="control-label">User Image</label>
                            <input type="file" class="form-control" name="image" >
                            <img class='img-responsive' width=100px src='../image/<?php echo $user_image ?>' alt=''>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">User Role</label>
                            <select type="text" id="" class="form-control" name="userrole" value="<?php echo $userrole ?>">
                            <option value="<?php echo $user_role ?>"><?php echo $user_role; ?></option>
                            <?php 
                              if ($user_role =='Admin') {
                                echo '<option value="Subscriber">Subscriber</option>';
                              }else{
                                echo '<option value="Admin">Admin</option>';
                              } 
                             ?></select>
                          </div>

                          <div class="form-group">
                            <label for="" class="control-label">User Password</label>
                            <input type="Password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
                            
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                          </div>
                        </form>
                    </div>
                </div>

           <?php include_once "include_admin/footer.php" ?>