<?php

function list_menu($urlconfig = "", $page = "", $name = "", $pageurl = "")
{
	$output_list_menu = "<li class=\"nav-item";
	if ($page == $pageurl || $page == "add" . $pageurl || $page == "edit" . $pageurl || $page == "delete" . $pageurl) {
		$output_list_menu .= " active";
	}
	$output_list_menu .= "\"><a class=\"nav-link\" href=\"" . $urlconfig . "" . $pageurl . "\">" . $name . "</a></li>";
	// $output_list_menu .= "\"><a class=\"nav-link\" href=\"" . $urlconfig . "page/" . $pageurl . "\">" . $name . "</a></li>";
	return $output_list_menu;
}

function login_form($urlconfig = "", $username = "", $usererror = "")
{
	$login = '<form class="form-horizontal" action="'.$urlconfig.'login.html" method="post" role="form">
		<div class="form-group row text-white '.$usererror.'">
			<label class="col-sm-2 control-label">'._email_.'</label>
			<div class="col-sm-6">
				<input type="username" name="username" class="form-control" placeholder="'._username_or_email_.'" value="'.$username.'" required autofocus>
			</div>
		</div>
		<div class="form-group row text-white">
			<label class="col-sm-2 control-label">'._password_.'</label>
			<div class="col-sm-6">
				<input type="password" name="password" class="form-control" placeholder="'._password_.'" required>
			</div>
		</div>
		<div class="form-group row text-white">
			<div class="col-sm-offset-2 col-sm-6">
				<button type="submit" name="submit" class="btn btn-success">'._sing_in_.'</button>
				<a class="btn btn-danger" href="'.$urlconfig.'register.html">'._register_.'</a>
			</div>
		</div>
	</form>';
	// <a class="btn btn-danger" href="'.$urlconfig.'forgotpassword.html">'._register_.'</a>
	// <a class="btn btn-danger" href="'.$urlconfig.'register.html">'._register_.'</a>
	return $login;
}

function register_form($urlconfig = "", $nickname = "", $email = "", $username = "", $passerror = "", $usererror = "", $emailerror = "")
{
	$register = '<form class="form-horizontal" action="'.$urlconfig.'register.html" method="post" role="form">
		<div class="form-group row text-white">
			<label class="col-sm-2 control-label">'._name_.'</label>
			<div class="col-sm-6">
				<input type="text" name="nickname" class="form-control" placeholder="'._name_.'" value="'.$nickname.'" required autofocus>
			</div>
		</div>
		<div class="form-group row text-white '.$emailerror.'">
			<label class="col-sm-2 control-label">'._email_.'</label>
			<div class="col-sm-6">
				<input type="email" name="email" class="form-control" placeholder="'._email_.'" value="'.$email.'" required>
			</div>
		</div>
		<div class="form-group row text-white '.$usererror.'">
			<label class="col-sm-2 control-label">'._username_.'</label>
			<div class="col-sm-6">
				<input type="text" name="username" class="form-control" placeholder="'._username_.'" value="'.$username.'" required>
			</div>
		</div>
		<div class="form-group row text-white '.$passerror.'">
			<label class="col-sm-2 control-label">'._password_.'</label>
			<div class="col-sm-6">
				<input type="password" name="password1" class="form-control" placeholder="'._password_.'" required>
			</div>
		</div>
		<div class="form-group row text-white '.$passerror.'">
			<label class="col-sm-2 control-label">'._confirm_password_.'</label>
			<div class="col-sm-6">
				<input type="password" name="password2" class="form-control" placeholder="'._confirm_password_.'" required>
			</div>
		</div>
		<div class="form-group row text-white">
			<div class="col-sm-offset-2 col-sm-6">
				<button type="submit" name="submit" class="btn btn-success">'._register_.'</button>
			</div>
		</div>
	</form>';
	// <button type="reset" class="btn btn-danger">'._clear_.'</button>
	return $register;
}

function member_form($urlconfig = "", $sunset_username = "")
{
	include 'condb.php';
	$cUser = $connec->prepare("SELECT * FROM users WHERE username = :username");
	$cUser->bindParam(":username", $sunset_username, PDO::PARAM_STR);
	$cUser->execute();
	if ($cUser->rowCount() > 0) {
		$rUser = $cUser->fetch(PDO::FETCH_ASSOC);
		$row_name = htmlspecialchars($rUser['name'], ENT_QUOTES, 'UTF-8');
		$row_email = htmlspecialchars($rUser['email'], ENT_QUOTES, 'UTF-8');
		$row_username = htmlspecialchars($rUser['username'], ENT_QUOTES, 'UTF-8');
		$register = '<form class="form-horizontal" action="'.$urlconfig.'register.html" method="post" role="form">
			<div class="form-group row text-white">
				<label class="col-sm-2 control-label">'._name_.'</label>
				<div class="col-sm-6">
					<input type="text" name="nickname" class="form-control" placeholder="'._name_.'" value="'.$row_name.'" disabled>
				</div>
			</div>
			<div class="form-group row text-white">
				<label class="col-sm-2 control-label">'._email_.'</label>
				<div class="col-sm-6">
					<input type="email" name="email" class="form-control" placeholder="'._email_.'" value="'.$row_email.'" disabled>
				</div>
			</div>
			<div class="form-group row text-white">
				<label class="col-sm-2 control-label">'._username_.'</label>
				<div class="col-sm-6">
					<input type="text" name="username" class="form-control" placeholder="'._username_.'" value="'.$row_username.'" disabled>
				</div>
			</div>
			<div class="form-group row text-white">
				<label class="col-sm-2 control-label">'._password_.'</label>
				<div class="col-sm-6">
					<input type="password" name="password1" class="form-control" placeholder="'._password_.'" required>
				</div>
			</div>
			<div class="form-group row text-white">
				<label class="col-sm-2 control-label">'._confirm_password_.'</label>
				<div class="col-sm-6">
					<input type="password" name="password2" class="form-control" placeholder="'._confirm_password_.'" required>
				</div>
			</div>
			<div class="form-group row text-white">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" name="submit" class="btn btn-success">'._save_.'</button>
				</div>
			</div>
		</form>';
		return $register;
	}

	return "";
}
