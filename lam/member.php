<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    if ($sunset_id == "") {
        header("location: ".$urlconfig."");
    }
?>

                <div class="col-md-9 panel">
                    <div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;<?php echo _profile_;?></span>
                        </div>
                        <div class="card-body">

                            <?php
                                if (isset($_POST['submit']) && isset($_POST['password_old']) && isset($_POST['password1']) && isset($_POST['password2'])) {
                                    $password_old = md5($_POST['password_old']);
                                    $password1 = $_POST['password1'];
                                    $password2 = $_POST['password2'];

                                    if ($password1 == $password2) {
                                        $password_new = md5($password1);

                                        $cUser = $connec->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
                                        $cUser->bindParam(":username", $sunset_username, PDO::PARAM_STR);
                                        $cUser->bindParam(":password", $password_old, PDO::PARAM_STR);
                                        $cUser->execute();
                                        if ($cUser->rowCount() > 0) {
                                            $uUser = $connec->prepare("UPDATE users SET password = :password_new WHERE username = :username AND password = :password");
                                            $uUser->bindParam(":password_new", $password_new, PDO::PARAM_STR);
                                            $uUser->bindParam(":username", $sunset_username, PDO::PARAM_STR);
                                            $uUser->bindParam(":password", $password_old, PDO::PARAM_STR);
                                            if ($uUser->execute()) {
                                                echo '<div class="alert alert-dismissable alert-success">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>'._success_.'</strong> '._update_profile_success_.'</div>';
                                            } else {
                                                echo '<div class="alert alert-dismissable alert-warning">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>'._not_found_.'</strong> เกิดข้อผิดพลาดไม่ทราบสาเหตุ</div>';
                                            }
                                        } else {
                                            echo '<div class="alert alert-dismissable alert-warning">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>'._not_found_.'</strong> รหัสผ่านไม่ถูกต้อง</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>'._not_found_.'</strong> '._not_found_text_2_.'</div>';
                                    }

                                }
                            ?>

                            <form class="form-horizontal" action="<?=$urlconfig;?>member.html" method="post" role="form">
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label"><?=_name_;?></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nickname" class="form-control" placeholder="<?=_name_;?>" value="<?=$sunset_name;?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label"><?=_email_;?></label>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" class="form-control" placeholder="<?=_email_;?>" value="<?=$sunset_email;?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label"><?=_username_;?></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control" placeholder="<?=_username_;?>" value="<?=$sunset_username;?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label">เปลี่ยน<?=_password_;?></label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_old" class="form-control" placeholder="<?=_password_;?>เก่า" required>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label"><?=_password_;?></label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password1" class="form-control" placeholder="<?=_password_;?>ใหม่" required>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label"><?=_confirm_password_;?></label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password2" class="form-control" placeholder="<?=_confirm_password_;?>ใหม่" required>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" name="submit" class="btn btn-success"><?=_save_;?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>