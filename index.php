<?php
	if( !( (phpversion() >= '5.4') && !ini_get('session_auto_start') && extension_loaded('mysql')) ){		//Check 0: only prompt this message if above not fulfilled.

?>
<div style="margin:5em;">
<h4>Checking System Configuration</h4><br>
<table width='60%'>
	<tr style="font-weight:bold;">
		<td></td>
		<td>Available</td>
		<td>Required</td>
		<td></td>
	</tr>
  <tr>
   <td>PHP Version:</td>
   <td><?php echo phpversion(); ?></td>
   <td>5.4+</td>
   <td><?php echo (phpversion() >= '5.4') ? '<span style="color:green">Ok</span>' : '<span style="color:red">Not Ok</span>'; ?></td>
  </tr>
  <tr>
   <td>Session Auto Start:</td>
   <td><?php echo (ini_get('session_auto_start')) ? 'On' : 'Off'; ?></td>
   <td>Off</td>
   <td><?php echo (!ini_get('session_auto_start')) ? '<span style="color:green">Ok</span>' : '<span style="color:red">Not Ok</span>'; ?></td>
  </tr>
  <tr>
   <td>MySQL:</td>
   <td><?php echo extension_loaded('mysql') ? 'On' : 'Off'; ?></td>
   <td>On</td>
   <td><?php echo extension_loaded('mysql') ? '<span style="color:green">Ok</span>' : '<span style="color:red">Not Ok</span>'; ?></td>
  </tr>
  <!--<tr>
   <td>connection/connection_config.php</td>
   <td><?php //echo is_writable('connection/connection_config.php') ? 'Writable' : 'Unwritable'; ?></td>
   <td>Writable</td>
   <td><?php //echo is_writable('connection/connection_config.php') ? 'Ok' : '<span style="color:red">Not Ok</span>'; ?></td>
  </tr>-->
</table>
<br><br>
<strong>Minimum Requirements Not Found.<br>Installation can't continue.</strong>
</div>

<?php
  	exit();

  }	//above if ended.



  	//if above system configuration found OK, then. do as follows:
		

	@require("connection/connection_config.php");
	
	

	try{

		//Check 1: Can we connect to DB?
		$con = new PDO("mysql:host=".DBSERVER.";dbname=".DBNAME.";charset=utf8", DBUSER, DBPASS);

		//can connect(if flow-of-control reaches here.), then check if Solutions table exist.
		//Check 2: Do the DB contains 'Solutions' table.
		$stmt = $con -> prepare("SELECT count(*) FROM Solutions");
		$stmt -> execute();
		$rows = $stmt -> fetchALL(PDO::FETCH_ASSOC);

		if($rows[0]["count(*)"]==14){		//meaning, solutions table is complete to 14! Installed.
			//using this as our only 'check' to determine whether the db has been installed or not is not the best method, but will do.

			require("front.php");
		}else{
			require("install.php");
		}

	}catch(Exception $e){
		//ie. Cann't connect to db.
		require("install.php");
	}
	
?>
