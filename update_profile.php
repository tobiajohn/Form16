<?php
include "../includes/connect.php";
include "validateData.php";	
session_start();
$empid = test_input($_SESSION["EmpID"]);
$email=test_input($_POST["email"]);;
$address = test_input($_POST["address"]);
$doj = $_POST["doj"];


$stmt = $con -> prepare("SELECT `email`,`Address`, `DOJ` FROM empdetails WHERE `EmpID` = '$empid'");
$stmt -> execute();
$row = $stmt -> fetch(PDO::FETCH_ASSOC); 

if($email == ""){
	$email = $row['email'];
}

if($address == "")
{
	$address = $row['Address'];
}

if($doj == "")
{
	$doj = $row['DOJ'];
}
	$stmt = $con -> prepare("UPDATE empdetails set `Address` = '$address' , `DOJ` = '$doj' , `email` = '$email' WHERE `EmpID` = '$empid'");
	$stmt -> execute();
	$msg = "Profile Updated Successfully.";
echo $msg;
	end:
		$con=null;	
?>