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
					<div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #007bff;">&nbsp;&nbsp;&nbsp;เมนูผู้ดูแล</span>
                        </div>
						<div class="card-body">
							<div class="ml-auto">
								<ul class="navbar-nav">
									<li class="nav-item"><a class="nav-link" href="<?=$urlconfig;if($_iadmin_1000lam_!=""){echo "?preview=admin_wave";}?>" target="_blank"> หน้าแรก</a></li>
									<?php
										if ($_iadmin_1000lam_ != "") {
											echo list_menu($urlconfig, $_GET['page'], 'หน้าแรกผู้ดูแล', 'main');
											echo list_menu($urlconfig, $_GET['page'], 'จัดการผู้ดูแล', 'admin');
											echo list_menu($urlconfig, $_GET['page'], 'ตั้งค่าเว็บ', 'setting');
											echo list_menu($urlconfig, $_GET['page'], 'ออกจากระบบ', 'logout');
										}
										else
										{
											echo list_menu($urlconfig, '', 'เข้าระบบ', '');
										}
									?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>