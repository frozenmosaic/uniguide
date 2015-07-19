<?php 
$objCollege = new College();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Uni-Guide</title>
<meta name="description" content="uniguide" />
<meta name="keywords" content="uniguide" />
<meta http-equiv="imagetoolbar" content="no" />
<link href="/css/core.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div id="header_in">
		<h5><a href="/">Uni-Guide</a></h5>
		<?php 
			if (Login::isLogged(Login::$_login_front)) {
				echo '<div id="logged_as">Logged in as: <strong>';
				echo Login::getFullNameFront(Session::getSession(Login::$_login_front));
				echo '</strong> | <a href="/start/?page=orders">My orders</a>';
				echo ' | <a href="/start/?page=logout">Logout</a></div>';
			} else {
				echo '<div id="logged_as"><a href="/start/?page=login">Login</a></div>';
			}
		?> 
	</div>
</div>
<div id="outer">
	<div id="wrapper">
		<div id="left">
		</div>
		<div id="right">