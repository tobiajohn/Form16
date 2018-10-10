<?php
if(isset($_POST["submit"])){	//only execute below php script, when form 'submitted' [actually:- "submit" variable of POST array is set by our JS code, where we append it to "dataString" just before ajax request.]

	$host = $_POST["host"];
	$dbname = $_POST["db"];
	$db_user = $_POST["db_user"];
	$db_password = $_POST["db_password"];

	$connectionString = "mysql:host=".$host.";dbname=".$dbname.";charset=utf8";

	try{

		//Step 1: Creating the Database.
		$pdo = new PDO("mysql:host=".$host, $db_user, $db_password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$dbname = "`".str_replace("`","``",$dbname)."`";
		$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
		$pdo->query("use $dbname");


		//Step 2: Import the SQL.
		$filename = "CryptoGame.sql";
		$sql = file_get_contents($filename);
		$qr = $pdo->exec($sql);

		//Step 3: Write the 'connection-string' in "connection_config.php" for 'connect.php'
		$connect_code = "<?php
			define('DBSERVER','".$host."');
			define('DBNAME','".$dbname."');
			define('DBUSER','".$db_user."');
			define('DBPASS','".$db_password."');
		?>";

		if(!is_writable("connection/connection_config.php"))
		{
		  $error_msg="not-writable";
		  echo $error_msg;
		}
		else{
			$fp = fopen("connection/connection_config.php", "wb");
			fwrite($fp, $connect_code);
			fclose($fp);
			@chmod("connection/connection_config.php", 0666);
			echo 1;			
		}

	}catch(Exception $e){
		//echo $e->getMessage();
		//echo 'Incorrect Details.';
		echo $e->getCode();
		//respond in accordance with all the exceptions. eg. incorrect password, incorrect ....
		//1045: incorrect username-password. 
		//2005: incorrect DB host.
	}

}

/*
try{
	$con = new PDO("mysql:host=localhost;dbname=CryptoGame;charset=utf8", "root", "q12wQ!@W");
}catch(Exception $e){
	echo $e->getMessage();
}
*/

?>