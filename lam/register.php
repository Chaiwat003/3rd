<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    if ($sunset_id) {
        header("location: ".$urlconfig."");
    }
?>

                <div class="col-md-9 panel">
                    <div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;<?php echo _member_systems_;?></span>
                        </div>
                        <div class="card-body">
                            <?php

                                if (isset($_POST['submit']) && isset($_POST['nickname']) && 
                                    isset($_POST['email']) && isset($_POST['username']) && 
                                    isset($_POST['password1']) && isset($_POST['password2'])) 
                                {

                                    $nickname = $_POST['nickname'];
                                    $email = $_POST['email'];
                                    $username = $_POST['username'];
                                    $pass1 = $_POST['password1'];
                                    $pass2 = $_POST['password2'];

                                    if ($pass1 != $pass2) {
                                        echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>'._not_found_.'</strong> '._not_found_text_2_.'</div>';
                                        echo register_form($urlconfig, $nickname, $email, $username, "has-error");
                                    }
                                    else
                                    {
                                        $cUser = $connec->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
                                        $cUser->bindParam(":email", $email, PDO::PARAM_STR);
                                        $cUser->bindParam(":username", $username, PDO::PARAM_STR);
                                        $cUser->execute();
                                        if ($cUser->rowCount() > 0) {
                                            $rUser = $cUser->fetch(PDO::FETCH_ASSOC);
                                            if ($rUser['username'] == $username) {
                                                echo '<div class="alert alert-dismissable alert-warning">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>'._not_found_.'</strong> '._exists_name_.'</div>';
                                                echo register_form($urlconfig, $nickname, $email, $username, "", "has-error", "");
                                            }
                                            elseif ($rUser['email'] == $email)
                                            {
                                                echo '<div class="alert alert-dismissable alert-warning">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>'._not_found_.'</strong> '._exists_email_.'</div>';
                                                echo register_form($urlconfig, $nickname, $email, $username, "", "", "has-error");
                                            }
                                            else
                                            {
                                                echo '<div class="alert alert-dismissable alert-warning">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>'._not_found_.'</strong> '._exists_name_or_email_.'</div>';
                                                echo register_form($urlconfig, $nickname, $email, $username, "", "has-error", "has-error");
                                            }
                                        }
                                        else
                                        {
                                            $password = md5($pass1);
                                            $iUser = $connec->prepare("INSERT INTO users (username, password, email, name) VALUES (:username, :password, :email, :name)");
                                            $iUser->bindParam(":username", $username, PDO::PARAM_STR);
                                            $iUser->bindParam(":password", $password, PDO::PARAM_STR);
                                            $iUser->bindParam(":email", $email, PDO::PARAM_STR);
                                            $iUser->bindParam(":name", $nickname, PDO::PARAM_STR);
                                            $iUser->execute();

                                            echo '<div class="alert alert-dismissable alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>'._success_.'</strong> '._register_success_text.'</div>';
                                            echo login_form($urlconfig); 
                                        }
                                    }
                                }
                                else
                                {
                                    echo register_form($urlconfig); 
                                }
                            ?>

                        </div>
                    </div>
                </div>