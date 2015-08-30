<!DOCTYPE>
<head>
<title>Uni-Guide</title>
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