<?php include_once "db.php" ?>
<?php session_start(); ?>
<?php 
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connect,$username);
		$password = mysqli_real_escape_string($connect,$password);

		$query = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($connect,$query);
		if(!$result){
			die("Failed".mysqli_error($connect));
		}
		while($row = mysqli_fetch_assoc($result)){
			$db_id = $row['userid'];
			$db_username = $row['username'];
			$db_password = $row['user_password'];
			$db_firstname = $row['firstname'];
			$db_lastname = $row['lastname'];
			$db_role = $row['user_role'];
		}
		if($password = password_verify($password,$db_password)){
			$_SESSION['username']=$db_username;
			$_SESSION['firstname']=$db_firstname;
			$_SESSION['lastname']=$db_lastname;
			$_SESSION['user_role']=$db_role;
			header('Location:../admin/index.php');
		}else{
			header('location:../index.php');
		}
	}
 ?>