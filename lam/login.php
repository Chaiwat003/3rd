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
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;<?php echo _login_now_;?></span>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
                                {

                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);

                                    $cUser = $connec->prepare("SELECT * FROM users WHERE email = :username OR username = :username");
                                    $cUser->bindParam(":username", $username, PDO::PARAM_STR);
                                    $cUser->execute();
                                    if ($cUser->rowCount() > 0) {
                                        $rUser = $cUser->fetch(PDO::FETCH_ASSOC);
                                        if ($rUser['password'] == $password)
                                        {
                                            // $_SESSION['sunset']['username'] = $rUser['username'];
                                            // $_SESSION['sunset']['email'] = $rUser['email'];
                                            // $_SESSION['sunset']['name'] = $rUser['name'];
                                            
                                            $_SESSION['sunset']['id'] = htmlspecialchars($rUser['id'], ENT_QUOTES, 'UTF-8');
                                            $_SESSION['sunset']['username'] = htmlspecialchars($rUser['username'], ENT_QUOTES, 'UTF-8');
                                            $_SESSION['sunset']['email'] = htmlspecialchars($rUser['email'], ENT_QUOTES, 'UTF-8');
                                            $_SESSION['sunset']['name'] = htmlspecialchars($rUser['name'], ENT_QUOTES, 'UTF-8');
                                            $_SESSION['sunset']['role'] = htmlspecialchars($rUser['role'], ENT_QUOTES, 'UTF-8');
                                            header("location: ".$urlconfig."");
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>'._not_found_.'</strong> '._username_password_incorrect_.'</div>';
                                            echo login_form($urlconfig, $username, "");
                                        }
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>'._not_found_.'</strong> '._username_password_incorrect_.'</div>';
                                        echo login_form($urlconfig, $username, "has-error");
                                    }
                                }
                                else
                                {
                                    echo login_form($urlconfig); 
                                }
                                
                            ?>

                        </div>
                    </div>
                </div>