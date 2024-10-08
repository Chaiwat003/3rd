<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    $cSetting = $connec->prepare("SELECT * FROM lam_setting WHERE id = '1'");
    $cSetting->execute();

    while ($row = $cSetting->fetch(PDO::FETCH_ASSOC))
    {
        $urlconfig = $row['urlconfig'];
        $head_insert = $row['head_code'];
        $foot_insert = $row['foot_code'];
        $image_bg = $row['image_bg'];
        $cache = $row['cache_value'];
        $logo = $row['logo'];
        $name = $row['name'];
        $details = $row['details'];
        $msgoffline = $row['msgoffline'];
        $_cache = $row['cache'];
        $online = $row['online'];
    }
    
    if (isset($_SESSION['_1000lam_admin_']['_iadmin_1000lam_']))
    {
        $_iadmin_1000lam_ = $_SESSION['_1000lam_admin_']['_iadmin_1000lam_'];
        $_nameadmin_1000lam_ = $_SESSION['_1000lam_admin_']['_nameadmin_1000lam_'];
        $_useradmin_1000lam_ = $_SESSION['_1000lam_admin_']['_useradmin_1000lam_'];
        $_emailadmin_1000lam_ = $_SESSION['_1000lam_admin_']['_emailadmin_1000lam_'];
    }
    else
    {
        $_iadmin_1000lam_ = "";
        $_nameadmin_1000lam_ = "";
        $_useradmin_1000lam_ = "";
        $_emailadmin_1000lam_ = "";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="<?=$urlconfig;?>images/<?=$logo?><?=$cache;?>" />
	<title><?=$name?></title>

    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=$urlconfig;?>css/bootstrap.css<?=$cache;?>">
    <link rel="stylesheet" href="<?=$urlconfig;?>css/lam.css<?=$cache;?>">
	<link rel="stylesheet" href="<?=$urlconfig;?>css/mdb.css<?=$cache;?>">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link href="//fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    
    <?php 
        if (!$_iadmin_1000lam_)
        {
            echo "<script src=\"//www.google.com/recaptcha/api.js\" async defer></script>\n";
        }
    ?>

 	<style type="text/css">
 		body {
			background: url('<?=$urlconfig;?>images/<?=$image_bg;?>') no-repeat center center fixed;
		 	background-size: cover;
		}
 	</style>
    <link rel="stylesheet" href="<?=$urlconfig;?>css/style.css<?=$cache;?>">

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark p-0" style="font-size:16px;">
		<div class="container">

            <a class="navbar-brand" style="font-size:18px;text-shadow: 0 0 .7em #FFFFFF;" href="<?php echo $urlconfig;?>index.html">
                <img src="//<?=$_SERVER['SERVER_NAME'];?>/images/logo.png?v=123" 
				style="height:40px; width: auto;">  หน้าแรก</a>

            <div class="collapse navbar-collapse">
				<div class="ml-auto" style="padding-left: 10px">
					<ul class="navbar-nav ml-auto">
                        <?php
                            if ($_iadmin_1000lam_ != "")
                            {
                                echo list_menu($urlconfig,$_GET['page'],'หน้าแรกผู้ดูแล','main');
                                echo list_menu($urlconfig,$_GET['page'],'ออกจากระบบ','logout');
                            }
                            else
                            {
                                echo list_menu($urlconfig,'','เข้าระบบ','');
                            }
                        ?>

                    </ul>
                </div>
            </div>

        </div>
  	</nav>
    
    <div class="container mt-5">
		<div class="card-body">
    		<div class="row">

                <div class="col-md-7">
                    <div class="card-body">
                        <center><h1 style="text-shadow: 0 0 .7em #FFFFFF;color: #fff;">ADMIN MANAGEMENT</h1></center>
                    </div>
                </div>
                <div class="col-md-5"></div>

            </div>
        </div>
    </div>

    <div class="container mt-5">
		<div class="card-body">
    		<div class="row">