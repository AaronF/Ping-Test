<?php
	require_once("settings.php");
	require_once("db/".$dbtype.".php");
	
	ini_set('display_errors', '0');
	error_reporting(E_ALL | E_STRICT);

	$db = new $sql_db();
	if(is_array($db->sql_connect(
		$db_host, 
		$db_user,
		$db_pass,
		$db_name, 
		$db_port,
		false, 
		false
	))) {
		die("Unable to connect to the database");
	}
	
	try {
	    $pdo_db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);  
	    $pdo_db->exec("set names utf8");
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	
	require_once("class.data.php");
	require_once("funcs.ping.php");

?>