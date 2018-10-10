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
$empid = $password = $errMsg = "";
include "validateData.php";	//for functions like: 'test_input()'. note: "validateData.php" is in same directory as "signup-process.php".
$empid = test_input($_POST["empid"]);
$password = test_input($_POST["passwd"]);


//Step 2: Validate - if fields empty?
if($empid == "" || $password == ""){
	$errMsg = "All fields are required. <br>";
	goto end;
}


//Step 3: connect to DB
include "connect.php";	//$con is the db-connection's reference variable


//Step 3.1: Validate - username not found ?
$stmt = $con -> prepare("SELECT EmpID, Name, Password, active FROM empdetails WHERE EmpID = :empid");
$stmt -> bindParam(":empid",$empid);
$stmt -> execute();
if($stmt->rowCount()==0){		//meaning, userName doesn't exist!
	$errMsg = "Employee ID Not Found. <br>";
	goto end;
	exit(0);
}


//Step 3.2: Validate - password is incorrect ? (continued use of $stmt from above)
//flow will reach here, ONLY IF user DO exist.
$row = $stmt -> fetch(PDO::FETCH_ASSOC); //like: Array ( [EmpID] => 15032 [password] => $2y$10$MdBs50nEgo4ZBfhLdDCkpuPK6mH0cg0v7NENhd0whyB1M9VMV1HUq)
if(!@password_verify($password, $row['Password'])){	//meaning, passwords don't match.
	$errMsg = "Password is Incorrect! <br>";
	goto end;
}


// [flow will reach here, if passwords also match! i.e. successful authentication.]

//Step 4: LOGIN Actual Task - Start Session; and assign session variables (just EmpID and Name).
session_start();
$_SESSION['EmpID'] = $row['EmpID'];
$_SESSION['Name'] = $row['Name'];
$typeUser = $row['active'];
//echo $typeUser;
if($typeUser==="1")
{
	$errMsg = 1;
//	echo "$errMsg<br>";
}
else
{
	$errMsg = 2;
//	echo "$errMsg";
}
//$errMsg = 1;	//not actually an error message !:)

//Step final-if-errors: close DB connection & echo errMessage.
end:

$con = null;
echo $errMsg;

} //end of the Main "if".
?>