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

      			<div class="col-md-9 panel">
					<div class="col-lg-12 shadow panel-lam">
                        <div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ผู้ดูแล</span>
                        </div>
						<div class="card-body">
                            <p><a class="btn btn-success" href="<?php echo $urlconfig?>admin/index.php?page=addadmin">เพิ่มผู้ดูแล</a></p>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-7900FF">
                                        <th>ID</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>ชื่อเรียก</th>
                                        <th>อีเมล</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cUserAdmin = $connec->prepare("SELECT * FROM lam_admin");
                                        $cUserAdmin->execute();

                                        while ($row_admin = $cUserAdmin->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<tr class="text-white">
                                            <td>'.$row_admin['id'].'</td>
                                            <td>'.$row_admin['username'].'</td>
                                            <td>'.$row_admin['name'].'</td>
                                            <td>'.$row_admin['email'].'</td>
                                            <td><a class="text-danger" href="'.$urlconfig.'admin/index.php?page=editadmin&id='.$row_admin['id'].'">แก้ไข</a> | <a class="text-danger" href="'.$urlconfig.'admin/index.php?page=deleteadmin&id='.$row_admin['id'].'">ลบ</a></td>
                                            </tr>';
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
					</div>
				</div>