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
$empid = $name = $pan = $address = $dob = $doj = $password = $password2 = $email = $errMsg = "";

include "validateData.php";	//for functions like: 'test_input()'. note: "validateData.php" is in same directory as "signup-process.php".

$empid = test_input($_POST["empid"]);
$name = test_input($_POST["name"]);
$pan = test_input($_POST["pan"]);
$address = test_input($_POST["address"]);
$password = test_input($_POST["passwd"]);
$password2 = test_input($_POST["passwd2"]);
$email = test_input($_POST["email"]);

$dob = $_POST["dob"];
$doj = $_POST["doj"];

//Step 3.0: Validate - if fields empty?

if($empid == "" || $name == "" || $pan == "" || $address == "" || $dob == "" || $doj == "" || $password == "" || $password2 == "" || $email == "" ){
 	$errMsg = "All fields are required. <br>";
 	goto end;
}


//Step 2: connect to DB
include "connect.php";	//$con is the db-connection's reference variable


//Step 3.1: Validate - empid already exists?
$stmt = $con -> prepare("SELECT EmpID FROM empdetails WHERE EmpID = :ID");
$stmt -> bindParam(":ID",$empid);
$stmt -> execute();
if($stmt->rowCount()>0){		//meaning, empid already exist!
	$errMsg = "Employee ID Already exists! <br>";
	goto end;
}



//Step 3.2: Validate - email already registered?
$stmt = $con -> prepare("SELECT email FROM empdetails WHERE email = :emailId");
$stmt -> bindParam(":emailId",$email);
$stmt -> execute();
if($stmt->rowCount()>0){		//meaning, email already exist!
	$errMsg = "Email Already Registered! <br>";
	goto end;
}

//Step 3.3: Validate - PAN already registered?
$stmt = $con -> prepare("SELECT PAN FROM empdetails WHERE PAN = :pan");
$stmt -> bindParam(":pan",$pan);
$stmt -> execute();
if($stmt->rowCount()>0){		//meaning, email already exist!
	$errMsg = "PAN Already Registered! <br>";
	goto end;
}


// [if flow came to this point, meaning: now should make a new user entry]
//Step 4: Signup Actual Task - make new entry in "empdetails" table 

$stmt = $con -> prepare("INSERT INTO empdetails(EmpID, Name, PAN, Address, DOB, DOJ, email, Password) VALUES (:empid, :name, :pan, :address,'$dob', '$doj', :emailId, :password)");
$stmt -> bindParam(":empid", $empid);
$stmt -> bindParam(":name", $name);
$stmt -> bindParam(":pan", $pan);
$stmt -> bindParam(":address", $address);
//$stmt -> bindParam(":dob", $dob); date is entered as it is no need to convert that to string, if conveted then it will not take the value.
//$stmt -> bindParam(":doj", $doj);
$stmt -> bindParam(":emailId", $email);
//password as hash, don't forget.
@$password = password_hash($password, PASSWORD_DEFAULT);
$stmt -> bindParam(":password", $password);
$stmt -> execute();

$errMsg = "User Successfully Created :)";	//not actually an error message !:)

//Step final: close DB connection & echo errMessage
end:

$con = null;
echo $errMsg;


} //end of the Main "if".
?>