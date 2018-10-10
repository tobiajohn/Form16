<?php

session_start();

/*
to update the 'progress' if solution is right.
*/ 
if($_POST["solution"] == $_SESSION["solution_arr"][$_SESSION['progress']]["solutionRaw"]){
	
	//increment progress
	$_SESSION['progress'] = $_SESSION['progress'] + 1; 

	//connect to DB & update user table.
	include "connect.php";	//$con is the db-connection's reference variable

	$stmt = $con -> prepare("UPDATE Users SET progress = :progress WHERE userId = :id");
	$stmt -> bindParam(':progress', $_SESSION['progress']);
	$stmt -> bindParam(':id', $_SESSION['userId']);
	$stmt -> execute();
	
	$con = null;

	echo 1;

}

?>