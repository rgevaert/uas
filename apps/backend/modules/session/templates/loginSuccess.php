   <?php if ($sf_user->hasFlash('notice')): ?>
     <div class="flash_notice"><?php echo $sf_user->getFlash('notice')
   ?></div>
   <?php endif; ?>
   <?php if ($sf_user->hasFlash('error')): ?>
     <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
   <?php endif; ?>

<h2> Please Login here </h2>
<form method='user.php'>
	Username: <input name="username" /><br />
	Password: <input type = "password" name="password" /><br />
	<input type="submit" value="login">
</form>
