   <?php if ($sf_user->hasFlash('notice')): ?>
     <div class="flash_notice"><?php echo $sf_user->getFlash('notice')
   ?></div>
   <?php endif; ?>
   <?php if ($sf_user->hasFlash('error')): ?>
     <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
   <?php endif; ?>

<h2> Please Login here </h2>
<form>
<label for='username'> User Name </label><input type='text' name= 'username' /><br />
<label for='password'> Password </label><input type='text' name = 'password' /><br />
<input type='submit' value = 'Login' />
</form>
