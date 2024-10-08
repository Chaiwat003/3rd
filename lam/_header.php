<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
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
	<title><?=$name;?></title>

	<link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=$urlconfig;?>css/bootstrap.css<?=$cache;?>">
	<link rel="stylesheet" href="<?=$urlconfig;?>css/lam.css<?=$cache;?>">
	<link rel="stylesheet" href="<?=$urlconfig;?>css/mdb.css<?=$cache;?>">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link href="//fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <style type="text/css">
 		body {
			background: url('<?=$urlconfig;?>images/<?=$image_bg;?>') no-repeat center center fixed;
		 	background-size: cover;
			 color: #ffffff;
		}

		.has-error .help-block,
		.has-error .control-label,
		.has-error .radio,
		.has-error .checkbox,
		.has-error .radio-inline,
		.has-error .checkbox-inline { color: #ffffff; }

		.has-error .form-control {
			border-color:#ffffff;
			-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);
			box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);
		}

		.has-error .form-control:focus {
			border-color:#e6e6e6;
			-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #fff;
			box-shadow:inset 0 1px 1px rgba(0,0,0,0.075),0 0 6px #fff;
		}

		.has-error .input-group-addon {
			color:#ffffff;
			border-color:#ffffff;
			background-color:#ee5f5b;
		}

		.has-error .form-control-feedback { color:#ffffff; }
		.has-error .help-block,
		.has-error .control-label { color:#ee5f5b; }

		.has-error .form-control,
		.has-error .form-control:focus { border-color:#ee5f5b; }

		.dropup {
			position: relative;
			display: inline-block;
		}

		.dropdown-menu {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
			background-color: inherit;
		}

		.divider {
			height: 1px;
			background-color: rgba(255, 255, 255, 0.3);
			margin: 8px 0;
		}

		.dropdown-menu li {
			padding: 0;
		}

		.dropdown-menu li a {
			display: block;
			padding: 8px 16px;
			width: 100%;
			box-sizing: border-box;
			text-decoration: none;
			color: white;
			transition: background-color 0.3s ease;
		}

		.dropdown-menu li a:hover {
			background-color: rgba(255, 255, 255, 0.1);
		}

		.dropup .dropdown-toggle::after {
			display: inline-block;
			margin-left: .255em;
			vertical-align: .255em;
			content: "";
			border-top: .3em solid;
			border-right: .3em solid transparent;
			border-bottom: 0;
			border-left: .3em solid transparent;
		}

		.page-link {
			background-color: #343a40;
			color: #fff;
			border-color: #454d55;
		}

		.page-link:hover {
			background-color: #495057;
			color: #fff;
		}

		/* .page-item.active .page-link {
			background-color: #d4252c;
			border-color: #d4252c;
		} */

		.page-link:focus {
			box-shadow: 0 0 0 0.2rem rgba(212, 37, 44, 0.25);
		}

 	</style>
    <link rel="stylesheet" href="<?=$urlconfig;?>css/style.css<?=$cache;?>">

</head>
<body>