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

				<div class="col-md-3 panel">

					<!--# Member #-->
					<div class="col-lg-12 shadow panel-lam">
						<div class="card-heading">
							<span class="text-white" style="font-size:18px; border-left:4px solid #007bff;">&nbsp;&nbsp;&nbsp;<?php echo _member_;?></span>
						</div>
						<div class="card-body">
							<?php
								if (empty($sunset_id)) {
							?>
							<span class="text-white">กรุณาเข้าสู่ระบบเพื่อใช้งาน</span></br></br>
							<a class="btn btn-sm btn-success" href="<?php echo $urlconfig;?>login.html"><?php echo  _sing_in_;?></a>
							<a class="btn btn-sm btn-danger" href="<?php echo $urlconfig;?>register.html"><?php echo  _register_;?></a>
							<?php
								} else {
							?>
							<b><?php echo _name_;?> :</b> <?php echo $sunset_name;?><br/>
							<b><?php echo _username_;?> :</b> <?php echo $sunset_username;?><br/>
							<b><?php echo _email_;?> :</b> <?php echo $sunset_email;?><br/><br/>

							<a class="btn btn-success" href="<?php echo $urlconfig;?>member.html"><?php echo _manager_;?></a> 
							<a class="btn btn-danger" href="<?php echo $urlconfig;?>index.php?page=logout"><?php echo _logput_;?></a>
							<?php
								}
							?>
						</div>
					</div>

				</div>