<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    if (isset($_POST["post_name"]))
    {
        try
        {
            $up_sql = "`online` = '".real_escape_xss($_POST['online'])."'";
            $up_sql = "".$up_sql.",`name` = '".real_escape_xss($_POST['name'])."'";
            $up_sql = "".$up_sql.",`urlconfig` = '".real_escape_xss($_POST['urlconfig'])."'";
            $up_sql = "".$up_sql.",`details` = '".real_escape_xss($_POST['details'])."'";
            $up_sql = "".$up_sql.",`logo` = '".real_escape_xss($_POST['logo'])."'";
            $up_sql = "".$up_sql.",`image_bg` = '".real_escape_xss($_POST['image_bg'])."'";
            $up_sql = "".$up_sql.",`cache` = '".real_escape_xss($_POST['cache'])."'";
            $up_sql = "".$up_sql.",`cache_value` = '".real_escape_xss($_POST['cache_value'])."'";
            $up_sql = "".$up_sql.",`msgoffline` = '".real_escape_xss($_POST['msgoffline'])."'";
            
            $uSetting = $connec->prepare("UPDATE lam_setting SET $up_sql WHERE id = '1'");
            if ($uSetting->execute())
            {
                $ss_s = $up_sql;
            }
        }
        catch (PDOException $e)
        {
            $ss_e = $e->getMessage();
        }
        
    }
?>

      			<div class="col-md-9 panel">
					<div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ตั้งค่าเว็บ</span>
                        </div>
<?php if (isset($ss_s)){?>
						<div class="card-body">
                            <div class="alert lam-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <p class="text-white">อัพเดจการตั้งค่าเรียบร้อยแล้ว</p>
                                <!-- <p><?=$ss_s?></p> -->
                            </div>
                        </div>
<?php } else {?>
                        <div class="card-body">
                            <div class="alert lam-warning">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <p class="text-white">อัพเดจการตั้งค่าไม่สำเร็จ</p>
                                <!-- <p><?=$ss_e?></p> -->
                            </div>
                        </div>
<?php }?>
					</div>
				</div>

                <script>
                    setTimeout(function(){location.href="<?=$urlconfig;?>admin/index.php?page=setting"} , 3000);
                </script>
