<!DOCTYPE>
<head>
<meta charset="UTF-8" />
<title>Uni-Guide</title>
<link href="<?php root();?>/css/core.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="<?php root();?>/js/jquery.livequery.js" type="text/javascript"></script>
<script src="<?php root();?>/js/jquery.tablednd.0.7.min.js" type="text/javascript"></script>
<script src="<?php root();?>/js/validation/lib/jquery.js"></script>

<script src="<?php root();?>/js/admin.js"></script>
<script src="<?php root();?>/js/validation/dist/jquery.validate.js"></script>

<script src="<?php root();?>/js/validation.js"></script>

 </head>
<body>
<div id="header">
	<div id="header_in">
		<h5><a href="<?php root();?>/admin/">Content Management System</a></h5>
		<?php 
                if(Login::isLogged(Login::$_login_admin)) {
                    echo '<div id="logged_as">Logged in as: <strong>'.$this->objAdmin->getFullNameAdmin(Session::getSession(Login::$_login_admin)).'</strong> | <a href="'.root().'/admin/logout">Logout</a></div>';
                } else {
                    echo '<div id="logged_as"><a href="'.root().'/admin/">Login</a></div>';   
                }
        ?>

	</div>
</div>
<div id="outer">
	<div id="wrapper">
		<div id="left">
			<?php if (Login::isLogged(Login::$_login_admin)) { ?>

			<h2>Navigation</h2>
			<div class="dev br_td">&npsp;</div>
			<ul id="navigation">
				<li>
					<a href="<?php root(); ?>/admin/articles"
					<?php echo $this->objNavigation->active('articles'); ?>>Articles
					</a>
				</li>

				<li>
					<a href="<?php root();?>/admin/school_facts"
					<?php echo $this->objNavigation->active('school_facts'); ?>>School Facts
					</a>
				</li>

				<li>
					<a href="<?php root(); ?>/admin/school_opinions" <?php echo $this->objNavigation->active('school_opinions'); ?>>School Ops
					</a>
				</li>

				<li>
					<a href="<?php root(); ?>/admin/majors" <?php echo $this->objNavigation->active('majors'); ?>>Majors</a>
				</li>

    		</ul>	
    		<?php } else { ?>	
    		&nbsp;
    		<?php } ?>		
		</div>
		<div id="right">