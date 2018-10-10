<?php
session_start();
include "../includes/connect.php";

$empid = $_SESSION["EmpID"];
$stmt = $con -> prepare("DELETE FROM empdetails WHERE `EmpID` = '$empid'");
$stmt -> execute();
$msg = "Account Deleted.";
echo $msg;

?>