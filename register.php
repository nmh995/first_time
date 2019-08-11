<?php include_once "include/header.php";?>
<?php include_once "include/navigation.php"; ?>
<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $userfirstname = $_POST['userfirstname'];
        $userlastname = $_POST['userlastname'];
        $useremail = $_POST['useremail'];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($user_image_temp, "image/$user_image");   
        $user_password = $_POST['user_password'];
        $user_password = password_hash($user_password,true);
        $query = "INSERT INTO users (username, firstname, lastname, user_image, user_password, user_email, user_role) VALUES('$username','$userfirstname','$userlastname','$user_image','$user_password','$useremail','subscriber')";
        $result = mysqli_query($connect,$query);
     if(!$result) {
        die('Query Fail').mysqli_error($result);
        }else{
            echo "Register Successfully";
        }
    }
 ?>
 
    <!-- Page Content -->
    <div class="container">
    <section id="login">
    <div class="container">
        <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="userfirstname" class="sr-only">user firstname</label>
                            <input type="text" name="userfirstname" id="userfirstname" class="form-control" placeholder="Enter FirstName" required="">
                        </div>
                        <div class="form-group">
                            <label for="userlastname" class="sr-only">user lastname</label>
                            <input type="text" name="userlastname" id="userlastname" class="form-control" placeholder="Enter LastName" required="">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required="">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="useremail" id="email" class="form-control" placeholder="somebody@example.com" required="">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">User Image</label>
                            <input type="file" class="form-control" name="image" required="">   
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include_once "include/footer.php" ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
