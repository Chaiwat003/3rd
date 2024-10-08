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

            </div>
		</div>
	</div>

<?php 
	$_mtime = microtime();
	$_mtime = explode(" ",$_mtime);
	$_mtime = $_mtime[1] + $_mtime[0];
	$_endtime = $_mtime;
	$_totaltime = ($_endtime - $_starttime);
?>

<br><br><br>
	<footer class="shadow-fixed">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<span class="text-white">Team : <a href="#">Sunset Foryou</a></span>
				</div>
				<div class="col-md-3">
					<span class="text-white pull-right"><?php echo "หน้านี้ประมวลผล ".round($_totaltime,'4')." วินาที"; ?></span>
				</div>
			</div>
		</div>
	</footer>
	<br><br>

	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function () {
			var closeButton = document.querySelector('.alert .close');
			if (closeButton) {
				closeButton.addEventListener('click', function () {
					var alertBox = this.parentElement;
					if (alertBox) {
						alertBox.style.display = 'none';
					}
				});
			}
		});

		document.addEventListener('DOMContentLoaded', function() {
			var dropupButton = document.getElementById('dropupButton');
			var dropupMenu = document.getElementById('dropupMenu');

			dropupButton.addEventListener('click', function() {
				if (dropupMenu.style.display === "block") {
					dropupMenu.style.display = "none";
				} else {
					dropupMenu.style.display = "block";
				}
			});

			window.addEventListener('click', function(event) {
				if (!dropupButton.contains(event.target)) {
					dropupMenu.style.display = "none";
				}
			});
		});

		var snowsrc = "//i.imgur.com/Vo2aSFs.png";
    	var no = 47;
	</script>
	<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?=$urlconfig;?>js/sno.js<?=$cache;?>"></script>

</body>
</html>