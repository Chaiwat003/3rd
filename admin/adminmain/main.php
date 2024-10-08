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

      			<div class="col-md-9 panel">
					<div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ADMIN MANAGEMENT</span>
                        </div>
						<div class="card-body">
                            <span class="text-white">สวัสดี Admin: <?=$_nameadmin_1000lam_?> | ชื่อผู้ใช้คือ: <?=$_useradmin_1000lam_?> | อีเมลคือ: <?=$_emailadmin_1000lam_?> <a href="#">แก้ไขข้อมูลคลิก</a></span>
						</div>
					</div>
				</div>