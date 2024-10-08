<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    if (isset($_SESSION['_1000lam_admin_'])) {
        header("location: ".$urlconfig."admin/index.php?page=main");
    }

    if (isset($_POST['_1000lam_submit_']))
    {
        $user = $_POST['_iadmin_username_'];
        $pass = md5($_POST['_iadmin_password_']);
        
        if (empty($user)) {
            if (empty($_POST['_iadmin_password_'])) {
                $error_message="กรุณากรอกชื่อผู้ใช้และรหัสผ่าน";
            } else {
                $error_message="กรุณากรอกชื่อผู้ใช้";
            }
        } else if (empty($_POST['_iadmin_password_'])) {
            $error_message = "กรุณากรอกรหัสผ่าน";
        // } else if (empty($_POST['g-recaptcha-response'])) {
        //     $error_message = "กรุณายืนยันตัวตน";
        } else {
            // define('SecretKey', '6LfzMUoeAAAAALLI-SsHlefKjbnYchL4OyT_7VUy');
            // $query_params = [
            //     'secret' => SecretKey,
            //     'response' => filter_input(INPUT_POST, 'g-recaptcha-response'),
            //     'remoteip' => $_SERVER['REMOTE_ADDR']
            // ];
            // $url = 'https://www.google.com/recaptcha/api/siteverify?'.http_build_query($query_params);
            // $result = json_decode(file_get_contents($url), true);

            // if ($result['success'])
            // {
                $cUser = $connec->prepare("SELECT * FROM lam_admin WHERE username = :uname AND password = :upass");
                $cUser->bindParam(":uname", $user, PDO::PARAM_STR);
                $cUser->bindParam(":upass", $pass, PDO::PARAM_STR);
                $cUser->execute();
                if ($cUser->rowCount() > 0)
                {
                    $rUser = $cUser->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['_1000lam_admin_']['_iadmin_1000lam_'] = $rUser['id'];
                    $_SESSION['_1000lam_admin_']['_nameadmin_1000lam_'] = $rUser['name'];
                    $_SESSION['_1000lam_admin_']['_useradmin_1000lam_'] = $rUser['username'];
                    $_SESSION['_1000lam_admin_']['_emailadmin_1000lam_'] = $rUser['email'];
                    $_SESSION['_1000lam_admin_']['version'] = '0';
                    header( "location: ".$urlconfig."admin/index.php?page=main" );
                } else {
                    $error_message = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                }
                
            // } else {
            //     $error_message = "กรุณายืนยันตัวตน";
            // }
        }
    }
?>

      			<div class="col-md-9 panel">
					<div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;เข้าสู่ระบบ</span>
                        </div>
						<div class="card-body">
<?php if(isset($error_message)){echo"<div class=\"alert lam-warning\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button><p class=\"text-white\">$error_message</p></div>";}?>
<?php // echo login_form($urlconfig); ?>
                            
                            <form class="form-horizontal" action="<?=$urlconfig?>admin/index.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label text-white">ชื่อผู้ใช้</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_iadmin_username_" class="form-control" placeholder="ชื่อผู้ใช้">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2 control-label text-white">รหัสผ่าน</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="_iadmin_password_" class="form-control" placeholder="รหัสผ่าน">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-6">
                                            <div class="g-recaptcha" data-sitekey="6LfzMUoeAAAAALyy1MyVS_SyY7L6OeOjd6PDYNeC"></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-6">
                                            <button type="submit" name="_1000lam_submit_" class="btn btn-success">เข้าสู่ระบบ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
						</div>
					</div>
				</div>