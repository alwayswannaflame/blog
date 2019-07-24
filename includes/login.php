<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
	$username= $_POST['username'];
	$password=$_POST['password'];
	$username=mysqli_real_escape_string($connection, $username);
	$password=mysqli_real_escape_string($connection, $password);
	$query="SELECT * FROM users WHERE username='{$username}'";
	$select_user_query=mysqli_query($connection, $query);
	if (!$select_user_query){
		die('QUERY FAILED' . mysqli_error($connection));
	}
	while ($row=mysqli_fetch_array($select_user_query)){
		$db_id=$row['user_id'];
		$db_username=$row['username'];
		$db_password=$row['password'];
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
		$role=$row['role'];
		$salt=$row['randSalt'];
		$email=$row['email'];
	}	
	
    // $password=crypt($password, $salt);
	$password = crypt($password, $db_password);	
		// $db_id=$row['user_id'];
	if($username === $db_username && $password === $db_password ){
		$_SESSION['username']=$db_username;
		$_SESSION['email']=$email;
		$_SESSION['firstname']=$firstname;
		$_SESSION['lastname']=$lastname;
		$_SESSION['role']=$role;
		$_SESSION['user_id']=$db_id;
		header("Location: ../admin");

	}  else {
		header("Location: ../index.php ");
	}

	

}



?>