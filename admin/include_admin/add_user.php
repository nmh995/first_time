<?php 
	if (isset($_POST['create_user'])) {
	 	$username = $_POST['username'];
	 	$userfirstname = $_POST['userfirstname'];
	 	$userlastname = $_POST['userlastname'];
	 	$useremail = $_POST['useremail'];
	 	$user_image = $_FILES['image']['name'];
	 	$user_image_temp = $_FILES['image']['tmp_name'];
	 	move_uploaded_file($user_image_temp, "../image/$user_image");	
	 	$user_password = $_POST['user_password'];
	 	$userrole = $_POST['userrole'];
	 	$query = "INSERT INTO users (username, firstname, lastname, user_image, user_password, user_email, user_role) VALUES('$username','$userfirstname','$userlastname','$user_image','$user_password','$useremail','$userrole')";
	 	$result = mysqli_query($connect,$query);
	 if (!$result) {
	 	die('Query Fail').mysqli_error($result);
	 	}
	 	echo "Create User Successfully -> "."<a href='user.php'>View All User</a>";
	}
 ?>
<form action="" method="Post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="control-label">User Name</label>
		<input type="text" class="form-control" name="username">
		
	</div>

	<div class="form-group">
		<label for="" class="control-label">First Name</label>
		<input type="text" class="form-control" name="userfirstname">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Last Name</label>
		<input type="text" class="form-control" name="userlastname">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">Email</label>
		<input type="text" class="form-control" name="useremail">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">User Image</label>
		<input type="file" class="form-control" name="image">
		
	</div>
	<div class="form-group">
		<label for="" class="control-label">User Role</label>
		<select type="text" id="" class="form-control" name="userrole">
		<option value="admin">---Select User Role---</option>
		<option value="admin">Admin</option>
		<option value="subscriber">Subscriber</option></select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">User Password</label>
		<input type="Password" class="form-control" name="user_password"></textarea> 
		
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
	</div>
</form>
