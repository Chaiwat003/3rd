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

    <nav class="navbar navbar-expand-md navbar-dark p-0" style="font-size:16px;">
		<div class="container">

            <a class="navbar-brand" style="font-size:18px;text-shadow: 0 0 .7em #FFFFFF;" href="<?php echo $urlconfig;?>index.html">
                <img src="<?=$urlconfig?>images/<?=$logo?><?=$cache?>" style="height:40px; width: auto;">  <?=$name?></a>

            <div class="collapse navbar-collapse">
				<div class="ml-auto" style="padding-left: 10px">
					<ul class="navbar-nav ml-auto">
                        <?php
                            echo list_menu($urlconfig, '', 'หน้าแรก', '');
                            
                            if (!empty($sunset_id)) {
                        ?>
                        <div class="dropdown text-end">
                            <a href="#" class="nav-link dropdown-toggle" style="color:#FFFFFF" data-bs-toggle="dropdown">เมนูหลัก</a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item text-white" href="<?=$urlconfig;?>addpost.html">New post...</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
                                <li><a class="dropdown-item text-white" href="<?=$urlconfig;?>member.html"><?php echo _manager_;?></a></li>
                                <?php 
                                    if ($sunset_role === 'admin') { 
                                ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-white" href="<?=$urlconfig;?>users.html">ผู้ใช้ทั้งหมด</a></li>
                                <?php
                                    }
                                ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-white" href="<?=$urlconfig;?>index.php?page=logout"><?php echo _logput_;?></a></li>
                            </ul>
                        </div>
                        <?php
                            }
                        ?>
                    
                    </ul>
                </div>
            </div>

        </div>
  	</nav>

    <div class="container mt-3">
		<div class="card-body">
    		<div class="row">