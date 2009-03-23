<h3> Change password </h3>
Your login is: <?php echo $user->getLogin() ?> <br /><br />


<form method = "User.php">

Current Password : 
<input type = "password" name = "password" value="<?= $sf_request->getParameter('password') ?>"/> <br />

New Password : 
<input type = "password" name = "new_password" value="<?= $sf_request->getParameter('new_password') ?>"/> <br />

Confirm new password : 
<input type = "password" name = "confirm_password" value="<?= $sf_request->getParameter('confirm_password') ?>"/> <br />

<input type = "submit" name = "Change" value = "Change" /> <br />
</form>

<hr />

<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a> |
<a href="<?php echo url_for('user/changepassword?id='.$user->getId()) ?>">Change Password</a> | 
<a href="<?php echo url_for('user/show?id='.$user->getId()); ?>">Cancel</a>
