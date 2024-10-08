<?php
    if (!defined("isdoc"))
    {
        header("HTTP/1.1 404 Not Found");
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL " . $_SERVER["REQUEST_URI"] . " was not found on this server.</p>\n";
        echo "<hr>\n" . $_SERVER["SERVER_SIGNATURE"] . "\n</body></html>\n";
        exit;
    }

    $version = "0.0.1";

    function Lam_dc($string_to_decrypt)
	{
		$string_to_decrypt = base64_decode($string_to_decrypt);
		$lam = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, 'lkirwf897+22#bbtrm8814z5qq=498re', $string_to_decrypt, MCRYPT_MODE_CBC, '741952hheeyy66#cs!9hjv887mxx7@re');
		$lam = rtrim($lam, "\0\4");
		return($lam);
	}

	function Lam_ec($string_to_encrypt)
	{
		$lam = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, 'lkirwf897+22#bbtrm8814z5qq=498re', $string_to_encrypt, MCRYPT_MODE_CBC, '741952hheeyy66#cs!9hjv887mxx7@re');
		$lam = base64_encode($lam);
		return($lam);
	}

    function real_escape_xss($value)
    {
        include "../condb.php";
        $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        return mysqli_real_escape_string($conn, $value);
    }

    function list_menu($urlconfig = "", $page = "", $name = "", $pageurl = "")
    {
        $output_list_menu = "<li class=\"nav-item";
        if ($page == $pageurl || $page == "add" . $pageurl || $page == "edit" . $pageurl || $page == "delete" . $pageurl || $page == "_save" . $pageurl) {
            $output_list_menu .= " active";
        }
        $output_list_menu .= "\"><a class=\"nav-link\" href=\"" . $urlconfig . "admin/index.php?page=" . $pageurl . "\">" . $name . "</a></li>";
        return $output_list_menu;
    }

?>