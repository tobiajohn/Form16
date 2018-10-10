<?php
	//this file requires php 5.x+ password methods, so.
	require(__DIR__."/password-compat.php");
?>
<?php
session_start();
include "../includes/connect.php";

$empid = $_SESSION["EmpID"];
$stmt = $con -> prepare("SELECT `password` FROM empdetails WHERE `EmpID` = '$empid'");
$stmt -> execute();

// fetch password from database
$row = $stmt -> fetch(PDO::FETCH_ASSOC); 
$password = $row['password'];

//fetch password from profile for verify
$current_password = $_POST['current_password'];

if(@password_verify($current_password,$password)){  
  
    $new_password = $_POST['new_password']; 
  	$new_password_again = $_POST['new_password_again']; 

	//if current password matched
	//Validation check for new password
	if(trim($new_password) !== trim($new_password_again)){
		 echo 'Your new passwords do not match!';
	}
	else if(strlen($_POST['new_password']) < 5){
		echo 'Your password must be at least 5 character.';
   	}
 	else{	
		@$new_password = password_hash($new_password, PASSWORD_DEFAULT);
		
	  	$stmt = $con -> prepare("UPDATE empdetails set `Password` = '$new_password' WHERE `EmpID` = '$empid'");
	  	$stmt -> execute();
	  
	  	$msg = "Password Updated Successfully.";
		echo $msg;
    }
}
else{
 	echo 'Current Password Incorrect.';
}
		
?>