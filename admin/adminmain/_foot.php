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

<br><br><br>
	<footer class="shadow-fixed">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<span class="text-white"><?php if($_iadmin_1000lam_ != ""){ ?>System by <a href="#">EditReload</a>, <a href="#">2DKung</a>, <a href="#">1000LAM</a><?php } ?></span>
				</div>
				<div class="col-md-3">
					<span class="text-white pull-right"><a href="#">Pongpan.Norasan@gmail.com</a></span>
				</div>
			</div>
		</div>
	</footer>
	<br><br>

	<script type="text/javascript">
		var snowsrc = "//i.imgur.com/Vo2aSFs.png";
    	var no = 9;
	</script>
	<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?=$urlconfig;?>js/sno.js<?=$cache;?>"></script>

	<!-- <?php 
        if (!$_iadmin_1000lam_)
        {
            echo "<script type=\"text/javascript\" src=\"".$urlconfig."js/sno.js".$cache."\"></script>";
        }
    ?> -->

</body>
</html>