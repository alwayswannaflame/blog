<?php session_start(); ?>
<?php
$_SESSION['username']=null;
$_SESSION['firstname']=null;
$_SESSION['lastname']=null;
$_SESSION['role']=null;
$_SESSION['user_id']=null;
$_SESSION['email']=null;
header("Location: ../index.php");


?>