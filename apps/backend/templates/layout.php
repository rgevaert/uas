<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Administration System</title>
	<?php use_stylesheet('admin.css') ?>
   <?php include_javascripts() ?>
   <?php include_stylesheets() ?></head>
<body>
<div id="header">
	<div id="logo">
		<h1><a href="#">UAS</a></h1>
		<p>User Administration System</p>
	</div>
	<!-- end #logo -->
	<div id="menu">
		<ul>
			  <li class="first"><?php echo link_to('Users', '@user') ?></li>
		          <li><?php echo link_to('Identifications', '@user_identification') ?></li>
		          <li><?php echo link_to('Aliases', '@email_alias') ?></li>
		          <li><?php echo link_to('Domains', '@domainname') ?></li>
		          <li><?php echo link_to('Unix', '@unix_account') ?></li>
                          <li><?php echo link_to('Samba Account', '@samba_account') ?></li>
		</ul>
	</div>
	<!-- end #menu -->
</div>
<!-- end #header -->
<div id="page">
	<div id="content">
        <?php echo $sf_content ?>
	</div>
	<!-- end #content -->

</div>
<!-- end #page -->

</body>
</html>

