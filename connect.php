<?php
//connect to db
//creating an object named '$db', dbType:mysql, host:localhost, dbName:CryptoGame, User:root, Password:q12wQ!@W
//with, exception handling


require(__DIR__."/../connection/connection_config.php");

/*
define('DBSERVER','localhost');
define('DBNAME','CryptoGame');
define('DBUSER','root');
define('DBPASS','q12wQ!@W');
*/

try{
	$con = new PDO("mysql:host=".DBSERVER.";dbname=".DBNAME.";charset=utf8", DBUSER, DBPASS);

}catch(Exception $e){
	echo $e->getMessage();
}


/*
	Any file that 'includes' or 'requires' connect.php; must reside within the 'includes' folder because, it itself requires "connection_config.php" and the relative addressing may be problematic (if connect.php is included into any file outside includes).
*/

?>
