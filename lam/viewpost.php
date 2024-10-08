<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    if (isset($_REQUEST['post_id'])) {
        $postid = htmlspecialchars($_REQUEST['post_id'], ENT_QUOTES, 'UTF-8');

        if (isset($_POST['submit']) && isset($_POST['comment']) && isset($postid) && isset($sunset_id)) {
            if (!empty($_POST['comment'])) {
                $iCom = $connec->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (:post_id, :user_id, :comment)");
                $iCom->bindParam(":post_id", $postid, PDO::PARAM_INT);
                $iCom->bindParam(":user_id", $sunset_id, PDO::PARAM_INT);
                $iCom->bindParam(":comment", $_POST['comment'], PDO::PARAM_STR);
                if ($iCom->execute()) {
    
                }
            }
        }

        $cPost = $connec->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = :post_id");
        $cPost->bindParam(":post_id", $postid, PDO::PARAM_INT);
        $cPost->execute();
        if ($cPost->rowCount() > 0) {
            $rPost = $cPost->fetch(PDO::FETCH_ASSOC);
            $row_title = htmlspecialchars($rPost['title'], ENT_QUOTES, 'UTF-8');
            $row_user_id = htmlspecialchars($rPost['user_id'], ENT_QUOTES, 'UTF-8');
            $row_username = htmlspecialchars($rPost['username'], ENT_QUOTES, 'UTF-8');
            $row_updated_at = htmlspecialchars($rPost['updated_at'], ENT_QUOTES, 'UTF-8');
            $row_created_at = htmlspecialchars($rPost['created_at'], ENT_QUOTES, 'UTF-8');
            $row_content = htmlspecialchars($rPost['content'], ENT_QUOTES, 'UTF-8');
        ?>

                <div class="col-md-9 panel">
                    <div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;<?=$row_title;?></span>
                            <?php
                                if ($row_user_id == $sunset_id || $sunset_role == "admin") {
                                    echo '<a class="btn btn-danger pull-right" href="'.$urlconfig.'edit/'.$postid.'/">แก้ไขโพสต์</a>';
                                }
                            ?>
                            </br>
                            <span>&nbsp;&nbsp;&nbsp;by <?=$row_username?> - <?php 
                                echo $row_updated_at;
                                if (strtotime($row_updated_at) > strtotime($row_created_at)) { 
                                    echo ' (มีการแก้ไข)'; 
                                }
                            ?></span>
                        </div>
                        <div class="card-body">
                            <?=$row_content;?>
                        </div>
                    </div>

                    <div class="col-lg-12 shadow panel-lam">
                        <?php
                            if (!empty($sunset_id)) {
                        ?>
                        <form action="" method="post">
                            <div class="card-heading">
                                <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ความคิดเห็น</span>
                                <button class="btn btn-primary pull-right" type="submit" name="submit">บันทึก</button>
                            </div>
                            <div class="card-body">
                                <textarea style="width: 100%; height: 73px;" name="comment" placeholder="คุณกำลังคิดอะไรอยู่" required></textarea>
                            </div>
                        </form>
                        <?php
                            }

                            $cCom = $connec->prepare("SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE comments.post_id = :post_id ORDER BY comments.id DESC");
                            $cCom->bindParam(":post_id", $postid, PDO::PARAM_INT);
                            $cCom->execute();
                            if ($cCom->rowCount() > 0) {
                                while ($rCom = $cCom->fetch(PDO::FETCH_ASSOC)) {
                                    $row_comment = htmlspecialchars($rCom['comment'], ENT_QUOTES, 'UTF-8');
                                    $row_username = htmlspecialchars($rCom['username'], ENT_QUOTES, 'UTF-8');
                                    $row_created_at = htmlspecialchars($rCom['created_at'], ENT_QUOTES, 'UTF-8');
                        ?>
                        <hr>
                        <div class="card-body">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #8c00ff;">&nbsp;&nbsp;&nbsp;<?=$row_comment?></span></br>
                            <span>&nbsp;&nbsp;&nbsp;by <?=$row_username?> - <?=$row_created_at;?></span>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>

        <?php

        } else {
            // ไม่มีโพสต์ หรือ โพสต์ถูกลบแล้ว
        ?>

                <div class="col-md-9 panel">
                    <div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ไม่มีโพสต์ หรือ โพสต์ถูกลบแล้ว</span>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            
        <?php
        }
    }
?>
