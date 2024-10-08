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

                <div class="col-md-12">
					<hr>
		  			<!-- <marquee direction="left" scrolldelay="100">:  :   ยินดีต้อนรับสู่เว็บไซต์   :  :</marquee> -->
		  			<marquee direction="left" scrolldelay="100">:  :  ยินดีต้อนรับสู่เว็บไซต์  BuzzNest  ชุมชนแห่งการแลกเปลี่ยนความรู้และประสบการณ์   :  :</marquee>
					<hr>
				</div>

				<div class="col-md-9 panel">

					<?php
						if (!empty($sunset_id)) {
					?>

					<div class="col-lg-12 shadow panel-lam">
						<form action="<?=$urlconfig;?>addpost.html" method="get">
							<div class="card-heading">
								<span class="text-white" style="font-size:18px; border-left:4px solid #007bff;">&nbsp;&nbsp;&nbsp;เพิ่มโพสต์ของคุณ</span>
								<button class="btn btn-primary pull-right" type="submit">โพสต์</button>
							</div>
							<div class="card-body">
								<textarea style="width: 100%; height: 73px;" name="content" placeholder="คุณกำลังคิดอะไรอยู่"></textarea>
							</div>
						</form>
					</div>

					<?php
						}

						$limit = 5;

						$number = isset($_GET['number']) ? (int)$_GET['number'] : 1;
						if ($number < 1) $number = 1;
						$offset = ($number - 1) * $limit;
						$totalPosts = $connec->query("SELECT COUNT(*) FROM posts")->fetchColumn();
						$totalPages = ceil($totalPosts / $limit);

						$mainCPost = $connec->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC LIMIT :limit OFFSET :offset");
						$mainCPost->bindParam(':limit', $limit, PDO::PARAM_INT);
						$mainCPost->bindParam(':offset', $offset, PDO::PARAM_INT);
						$mainCPost->execute();

						if ($mainCPost->rowCount() > 0) {
							while ($rPost = $mainCPost->fetch(PDO::FETCH_ASSOC)) {
								$row_title = htmlspecialchars($rPost['title'], ENT_QUOTES, 'UTF-8');
                                $row_content = htmlspecialchars($rPost['content'], ENT_QUOTES, 'UTF-8');
                                $row_username = htmlspecialchars($rPost['username'], ENT_QUOTES, 'UTF-8');
                                $row_updated_at = htmlspecialchars($rPost['updated_at'], ENT_QUOTES, 'UTF-8');
                                $row_created_at = htmlspecialchars($rPost['created_at'], ENT_QUOTES, 'UTF-8');
					?>

					<div class="col-lg-12 shadow panel-lam">
					  	<div class="card-heading">
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;<?=$row_title?></span>
							<a class="btn btn-secondary pull-right" href="<?=$urlconfig?>view/<?=(int)$rPost['id']?>/">ดูโพสต์</a></br>
							<span>&nbsp;&nbsp;&nbsp;by <?=$row_username?> - <?php 
                                echo $row_updated_at;
                                if (strtotime($row_updated_at) > strtotime($row_created_at)) { 
                                    echo ' (มีการแก้ไข)'; 
                                }
                            ?></span>
                        </div>
						<div class="card-body">
							<span class="text-white"><?=$row_content?></span>
						</div>
					</div>

					<?php
							}
						}
					
						if ($totalPages > 1) {
					?>
					<nav>
						<ul class="pagination justify-content-center">
							<?php 
								if ($number > 1) {
									echo '<li class="page-item"><a class="page-link" href="?number=' . $number - 1 . '">&laquo; Previous</a></li>';
								}

								for ($i = 1; $i <= $totalPages; $i++) {
									if ($i == $number) {
										echo '<li class="page-item active"><a class="page-link" href="?number=' . $i . '">' . $i . '</a></li>';
									} else {
										echo '<li class="page-item"><a class="page-link" href="?number=' . $i . '">' . $i . '</a></li>';
									}
								}

								if ($number < $totalPages) {
									echo '<li class="page-item"><a class="page-link" href="?number=' . $number + 1 . '">Next &raquo;</a></li>';
								}
							?>
						</ul>
					</nav>

					<?php 
						} 
					?>

				</div>