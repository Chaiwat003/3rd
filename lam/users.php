<?php
    if (!defined("isdoc"))
    {
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head>";
        echo "<body>\n<h1>Not Found</h1>\n<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
        echo "<hr>\n".$_SERVER['SERVER_SIGNATURE']."\n</body></html>\n";
        exit;
    }

    if ($sunset_role != 'admin') {
        header("location: ".$urlconfig."");
    }

    if (isset($_GET['action']) && isset($_GET['id'])) {
        if ($_GET['action'] == 'delete' && $sunset_role === 'admin') { 
            $deleteId = (int)$_GET['id'];

            $deleteQuery = $connec->prepare("DELETE FROM users WHERE id = :id");
            $deleteQuery->bindParam(':id', $deleteId, PDO::PARAM_INT);
            if ($deleteQuery->execute()) {
                echo '<div class="alert alert-success">ลบบัญชีผู้ใช้เรียบร้อยแล้ว</div>';
                echo  '<script>setTimeout(function(){window.location.href="users.html";},3000);</script>';
            } else {
                echo '<div class="alert alert-danger">เกิดข้อผิดพลาดในการลบบัญชีผู้ใช้</div>';
            }
        }
    }

?>

                <div class="col-md-9 panel">
					<div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ผู้ใช้ทั้งหมด</span>
                        </div>
						<div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="color: #7900ff;">
                                        <th>ID</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <!-- <th>ชื่อเรียก</th> -->
                                        <th>อีเมล</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $userQuery = $connec->prepare("SELECT id, username, email FROM users WHERE role = 'user' ORDER BY id ASC");
                                    $userQuery->execute();

                                    if ($userQuery->rowCount() > 0) {
                                        while ($user = $userQuery->fetch(PDO::FETCH_ASSOC)) {
                                            $userId = htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8');
                                            $username = htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
                                            $email = htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8');
                                            
                                            echo '<tr>';
                                            echo '<td class="text-white">' . $userId . '</td>';
                                            echo '<td class="text-white">' . $username . '</td>';
                                            echo '<td class="text-white">' . $email . '</td>';
                                            echo '<td><a href="#" class="btn btn-danger text-white" onclick="confirmDelete(' . $userId . ')">ลบ</a></td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>

<!-- SweetAlert2 CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<style>
    .swal2-popup {
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
        padding: 20px;
    }
</style>

<script>
    function confirmDelete(userId) {
        if (userId != "<?=$sunset_id?>") {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณจะไม่สามารถกู้คืนบัญชีนี้ได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "?action=delete&id=" + userId;
                }
            });
        }
    }
</script>