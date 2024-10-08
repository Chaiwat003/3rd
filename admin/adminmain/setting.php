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
                            <span class="text-white" style="font-size:18px; border-left:4px solid #d4252c;">&nbsp;&nbsp;&nbsp;ตั้งค่าเว็บ</span>
                        </div>
						<div class="card-body">
                            <form class="form-horizontal tab-content lam-setting-form" action="<?=$urlconfig;?>admin/index.php?page=setting_save" 
                                method="post" enctype="multipart/form-data" role="form">

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">ปิด/เปิด เว็บไชต์</label></div>
                                        <div class="col-sm-6">
                                            <select class="form-select" name="online">
                                                <option value="0" <?php if($online=="0"){echo"selected";}?>>ปิดเว็บ</option>
                                                <option value="1" <?php if($online=="1"){echo"selected";}?>>เปิดเว็บ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">ชื่อเว็บ</label></div>
                                        <div class="col-sm-6"><input type="text" name="name" class="form-control" value="<?=$name?>"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">URL ของเว็บ</label></div>
                                        <div class="col-sm-6"><input type="text" name="urlconfig" class="form-control" value="<?=$urlconfig?>"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">คำอะธิบายเว็บ</label></div>
                                        <div class="col-sm-6"><input type="text" name="details" class="form-control" value="<?=$details?>"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">โลโก้เว็บ</label></div>
                                        <div class="col-sm-6"><input type="text" name="logo" class="form-control" value="<?=$logo?>"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">พื้นหลังเว็บ</label></div>
                                        <div class="col-sm-6"><input type="text" name="image_bg" class="form-control" value="<?=$image_bg?>"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">ระบบแคช</label></div>
                                        <div class="col-sm-6">
                                            <select class="form-select" name="cache">
                                                <option value="0" <?php if($_cache=="0"){echo"selected";}?>>ปิดแคช</option>
                                                <option value="1" <?php if($_cache=="1"){echo"selected";}?>>เปิดแคช</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">แคชเวอร์ชั้น</label></div>
                                        <div class="col-sm-4">
                                            <input type="text" id="cache_value_up" name="cache_value" class="form-control" value="<?=$cache?>">
                                            <script type="text/javascript">
                                                function update_cache()
                                                {
                                                    cache = Math.floor((Math.random() * 1000) + 1);
                                                    document.getElementById('cache_value_up').value = "?v=" + cache;
                                                }
                                            </script>
                                        </div>
                                        <div class="col-sm-4"><input type="button" class="btn btn-success" onclick="update_cache();" value="อัพเดจแคช"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row text-white">
                                        <div class="col-sm-2"><label class="control-label">ข้อความปิดเว็บ</label></div>
                                        <div class="col-sm-6"><textarea style="width: 100%;" name="msgoffline"><?=$msgoffline?></textarea></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" name="post_name" class="btn btn-success">บันทึก</button>
                                    </div>
                                </div>

                            </form>

                        </div>
					</div>
				</div>