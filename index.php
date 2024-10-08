<?php
	session_start();
	define('isdoc', 1);
	ob_start();

	if (@$_GET['preview'] != 'admin_') {
		ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
	} else {
		error_reporting(0);
	}

	include 'condb.php';
	include 'function.php';
	include 'lam/setting.inc.php';
	include 'lam/_header.php';
	include 'lam/_navbar.php';

	if ($online == '0' && @$_GET['preview'] != 'admin_') {
		echo '<center><h2 class="text-white">'.$msgoffline.'</h2></center>';
	} else {
		if (isset($_GET['page']) && $_GET['page'] == "logout") {
			session_destroy();
            header("location: ".$urlconfig."index.html");
		} elseif (isset($_GET['page'])) {
			$file = 'lam/' . $_GET['page'] . '.php';
			if (file_exists($file)) {
				include $file;
			} else {
				include 'lam/404.php';
			}
		} else {
			include 'lam/_main.php';
		}
		include 'lam/_menu.php';
	}
	include 'lam/_footer.php';
	ob_end_flush();
?>