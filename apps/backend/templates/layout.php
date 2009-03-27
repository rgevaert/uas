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
          <p>
           <?php if($sf_user->isAuthenticated()): ?>
               <?php echo link_to('Logout | ', 'session/logout') ?>  
           <?php endif; ?>
           <?php echo link_to('En', 'session/en') ?> | 
           <?php echo link_to('Tig', 'session/tig') ?>
          </p>

      
	</div>
	<!-- end #logo -->
	<?php if($sf_user->isAuthenticated()): ?>
	<div id="menu">
		<ul>
			  <li class="first"><?php echo link_to('Users', '@user') ?></li>
		          <li><?php echo link_to('Identifications', '@user_identification') ?></li>
		          <li><?php echo link_to('Aliases', '@email_alias') ?></li>
		          <li><?php echo link_to('Domains', '@domainname') ?></li>
		          <li><?php echo link_to('Unix', '@unix_account') ?></li>
		          <li><?php echo link_to('FTP', '@ftp_account') ?></li>
                          <li><?php echo link_to('Samba', '@samba_account') ?></li>

		</ul>
	</div>
	<?php endif; ?>
	<!-- end #menu -->
</div>
<!-- end #header -->
<div id="page">
        <?php if ($sf_user->isAuthenticated()): ?>
	<div id="user_history">
	    Recent viewed users:
	    <?php foreach ($sf_user->getUserHistory() as $user): ?>
	    <a href="<?php echo url_for('user/ListShow?id='.$user->getId()) ?>"><?php echo $user->getFullName() ?></a>
	    <?php endforeach; ?>
	</div>
	<?php endif; ?>
	<div id="content">
        <?php echo $sf_content ?>
	</div>
	<!-- end #content -->
</div>
<div id="footer">
<p>
Powered by <a href="http://www.symfony-project.org/"><img align="middle" src="/images/symfony_button.gif" alt="Symfony_button" /></a>&nbsp;-&nbsp;
The development of this system was sponsored by <a target="_blank" href="http://www.vliruos.be/"><img align="middle" src="/images/vliruos.jpg" alt="VLIRUOS" /></a><br />
<?= $sf_user->getCulture() ?>
</div>
<!-- end #page -->

</body>
</html>

