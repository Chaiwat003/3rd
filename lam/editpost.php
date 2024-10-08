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

    if (isset($_REQUEST['post_id'])) {
        $postid = htmlspecialchars($_REQUEST['post_id'], ENT_QUOTES, 'UTF-8');
    }
?>

                <div class="col-md-9 panel">
                    <div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;แก้ไขโพสต์</span>
                            <a class="btn btn-danger pull-right" href="<?=$urlconfig?>del/<?=$postid?>/">ลบโพสต์</a>
                        </div>
                        <div class="card-body">

                            <?php
                                if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['postid'])) {
                                    $postid = htmlspecialchars($_POST['postid'], ENT_QUOTES, 'UTF-8');

                                    $cPost = $connec->prepare("SELECT user_id FROM posts WHERE id = :postid");
                                    $cPost->bindParam(":postid", $_POST['postid'], PDO::PARAM_INT);
                                    $cPost->execute();
                                    if ($cPost->rowCount() > 0) {
                                        $rPost = $cPost->fetch(PDO::FETCH_ASSOC);

                                        if ($rPost['user_id'] == $sunset_id || $sunset_role == "admin") {
                                            $uPost = $connec->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :postid");
                                            $uPost->bindParam(":postid", $_POST['postid'], PDO::PARAM_INT);
                                            $uPost->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
                                            $uPost->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
                                            if ($uPost->execute()) {
                                                header("location: ".$urlconfig."view/".$postid."/");
                                            } else {
                                                echo '<div class="alert alert-dismissable alert-warning">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>'._not_found_.'</strong> เกิดข้อผิดพลาดไม่ทราบสาเหตุ code:3</div>';
                                            }
                                        } else {
                                            echo '<div class="alert alert-dismissable alert-warning">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>'._not_found_.'</strong> เกิดข้อผิดพลาดไม่ทราบสาเหตุ code:2</div>';
                                        }

                                    } else {
                                        echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>'._not_found_.'</strong> เกิดข้อผิดพลาดไม่ทราบสาเหตุ code:1</div>';
                                    }
                                }

                                if (isset($_REQUEST['post_id'])) {
                                    $postid = htmlspecialchars($_REQUEST['post_id'], ENT_QUOTES, 'UTF-8');
                                    $cPost = $connec->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = :post_id");
                                    $cPost->bindParam(":post_id", $postid, PDO::PARAM_INT);
                                    $cPost->execute();
                                    if ($cPost->rowCount() > 0) {
                                        $rPost = $cPost->fetch(PDO::FETCH_ASSOC);
                                        $row_title = htmlspecialchars($rPost['title'], ENT_QUOTES, 'UTF-8');
                                        $row_content = htmlspecialchars($rPost['content'], ENT_QUOTES, 'UTF-8');

                                        if ($rPost['user_id'] != $sunset_id && $sunset_role != "admin") {
                                            header("location: ".$urlconfig."");
                                        }
                            ?>

                            <form class="form-horizontal" action="" method="post" role="form">
                                <input style="display: none;" type="text" name="postid" value="<?=(int)$rPost['id']?>" required>
                                <?php 
                                    if (isset($_REQUEST['del'])) {
                                        echo '<div class="alert alert-dismissable alert-warning">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>!!!</strong> <a href="'.$urlconfig.'del/'.$postid.'/confirm/" style="color:red;">ยืนยันการลบโพสต์</a></div>';
                                    }
                                    if (isset($_REQUEST['del']) && isset($_REQUEST['confirm'])) {
                                        $dPost = $connec->prepare("DELETE FROM posts WHERE id = :postid");
                                        $dPost->bindParam(":postid", $postid, PDO::PARAM_INT);
                                        $dPost->execute();
                                        $dCom = $connec->prepare("DELETE FROM comments WHERE post_id = :postid");
                                        $dCom->bindParam(":postid", $postid, PDO::PARAM_INT);
                                        $dCom->execute();
                                        header("location: ".$urlconfig."");
                                    }
                                ?>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label">หัวเรื่อง</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" placeholder="หัวเรื่อง" value="<?=$row_title?>" required>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <label class="col-sm-2 control-label">เนื้อหา</label>
                                    <div class="col-sm-9">
                                        <textarea style="width: 100%;height: 100px;" name="content" placeholder="คุณกำลังคิดอะไรอยู่" required><?=$row_content?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row text-white">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" name="submit" class="btn btn-success">บันทึกโพสต์</button>
                                    </div>
                                </div>
                            </form>
                            <?php

                                    }
                                }

                            ?>
                        </div>
                    </div>
                </div>