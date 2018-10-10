<?php
	//this file requires php 5.x+ password methods, so.
	require(__DIR__."/password-compat.php");
?>
<?php
/*
	php script to handle ajax post request
*/	

if(isset($_POST["submit"])){	//only execute below php script, when form 'submitted' [actually:- "submit" variable of POST array is set by our JS code, where we append it to "dataString" just before ajax request.]

//Step 1: Get all the $_POST data & store it in variables
$username = $email = $errMsg = "";
include "validateData.php";	//for functions like: 'test_input()'. note: "validateData.php" is in same directory as "signup-process.php".
$username = test_input($_POST["username"]);
$email = test_input($_POST["email"]);


//Step 3.0: Validate - if fields empty?
if($username == "" || $email == ""){
	$errMsg = "All fields are required. <br>";
	goto end;
}


//Step 2: connect to DB
include "connect.php";	//$con is the db-connection's reference variable


//Step 3.1: Validate - username not found ?
$stmt = $con -> prepare("SELECT email FROM Users WHERE userName = :name");
$stmt -> bindParam(":name",$username);
$stmt -> execute();
if($stmt->rowCount()==0){		//meaning, userName doesn't exist!
	$errMsg = "Username Not Found. <br>";
	goto end;
	exit(0);
}


//Step 4: Entered email is correct ? (continued use of $stmt from above)
//flow will reach here, ONLY IF user DO exist.
$row = $stmt -> fetch(PDO::FETCH_ASSOC); //like: Array ( [email] => a@a )

if($email == strtoupper($row['email'])){	//meaning, email matches.
	
	//i.e. if email is correct, then reset password to 'password'

	/* RESET PASSWORD CODE */
	$newPassword = "password";
	$stmt = $con -> prepare("UPDATE Users SET password=:password WHERE userName=:name");
	$stmt -> bindParam(":name", $username);
	//password as hash, don't forget.
	@$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
	$stmt -> bindParam(":password", $newPassword);
	$stmt -> execute();
	/* RESET PASSWORD ends*/

	$errMsg = "Password Reset Successful.";

	goto end;
}else{
	$errMsg = "Encrypted email is Incorrect.";
	goto end;
}


//Step final-if-errors: close DB connection & echo errMessage.
end:

$con = null;
echo $errMsg;


} //end of the Main "if".
?>