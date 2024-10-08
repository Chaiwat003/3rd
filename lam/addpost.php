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
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;เพิ่มโพสต์</span>
                        </div>
                        <div class="card-body">

                            <?php
                                if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['content'])) {

                                    $iPost = $connec->prepare("INSERT INTO posts (user_id, title, content, created_at, updated_at) VALUES (:user_id, :title, :content, NOW(), NOW())");
                                    $iPost->bindParam(":user_id", $sunset_id, PDO::PARAM_INT);
                                    $iPost->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
                                    $iPost->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
                                    if ($iPost->execute()) {
                                        $lastInsertId = $connec->lastInsertId();
                                        header("location: ".$urlconfig."view/".$lastInsertId."/");
                                    } else {
                                        echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>'._not_found_.'</strong> เกิดข้อผิดพลาดไม่ทราบสาเหตุ</div>';
                                    }
                                }
                            ?>

                            <form class="form-horizontal" action="<?=$urlconfig;?>addpost.html" method="post" role="form">
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label">หัวเรื่อง</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" placeholder="หัวเรื่อง" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label">เนื้อหา</label>
                                    <div class="col-sm-9">
                                        <textarea style="width: 100%;height: 100px;" name="content" placeholder="คุณกำลังคิดอะไรอยู่" required><?php 
                                            if (isset($_REQUEST['content'])) { 
                                                echo htmlspecialchars($_REQUEST['content'], ENT_QUOTES, 'UTF-8');
                                            } 
                                        ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" name="submit" class="btn btn-success">โพสต์</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>