<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

	$_mtime = microtime();
	$_mtime = explode(" ",$_mtime);
	$_mtime = $_mtime[1] + $_mtime[0];
	$_starttime = $_mtime;

    $cSetting = $connec->prepare("SELECT * FROM lam_setting WHERE id = 1");
    $cSetting->execute();
    $rSetting = $cSetting->fetch(PDO::FETCH_ASSOC);

    // $urlconfig = $rSetting['urlconfig'];
    $urlconfig = "http://" . $_SERVER['HTTP_HOST'] . "/";
    $head_insert = $rSetting['head_code'];
    $foot_insert = $rSetting['foot_code'];
    $image_bg = $rSetting['image_bg'];
    $cache = $rSetting['cache_value'];
    $name = $rSetting['name'];
    $logo = $rSetting['logo'];
    $details = $rSetting['details'];
    $favicon = $rSetting['favicon'];
    $online = $rSetting['online'];
    $msgoffline = $rSetting['msgoffline'];

    define('_lang_default_', "thai");
    include 'language/_'._lang_default_.'.php';

    if (isset($_SESSION['sunset']['id'])) {
        $sunset_id = $_SESSION['sunset']['id'];
        $sunset_username = $_SESSION['sunset']['username'];
        $sunset_email = $_SESSION['sunset']['email'];
        $sunset_name = $_SESSION['sunset']['name'];
        $sunset_role = $_SESSION['sunset']['role'];
    } else {
        $sunset_id = "";
        $sunset_username = "";
        $sunset_email = "";
        $sunset_name = "";
        $sunset_role = "";
    }

?>