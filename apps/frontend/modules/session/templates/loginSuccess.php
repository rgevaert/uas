<h1>Please login</h1>
<form action="<?= url_for('session/dologin'); ?>" method="post">

	<?= $form ?>

	<input type="submit" value="login"><br/>
	<br/>
</form>
<p>If you do not have an account, you can <a href="<?php echo url_for('register/new') ?>">sign up</a>.</p>


