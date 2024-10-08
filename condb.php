<?php
	if (!defined("isdoc"))
	{
		header('HTTP/1.1 404 Not Found');
		echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
		echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
		echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
		exit;
	}

	ini_set('display_errors', '0'); // 1 แสดง Error 0 ไม่แสดง
	
	date_default_timezone_set('Asia/Bangkok');

	// $db_host = "localhost";
	$db_host = "";
    $db_user = "";
    $db_pass = "";
    $db_name = "ac_ac";

	try {
		$connec = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_pass);
		$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connec->exec("SET time_zone = '+07:00';");
	} catch (Exception $e) {
		print $e->getMessage() . "\n";
	}

?>