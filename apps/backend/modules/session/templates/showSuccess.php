<h1>Session details</h1>

<?php
    if($sf_user->hasCredential('admin')){
	echo "You are an admin user";
}
?>

<?php
    if($sf_user->hasCredential('secretary')){
	echo "You are an  asecretary,and you have only right to veiw and add new";
}
?>

<?php
    if($sf_user->hasCredential(array('admin','secretary'), false)){
	echo "You are a secretary OR an admin user";
}
?>

<?php
    if($sf_user->hasCredential(array('admin','secretary'))){
	echo "You are a secretary AND an admin ";
}
<?php
    if($sf_user->hasCredential(array('sysadmin'))){
	echo "You are a System Administration ";
}
?>
<?php
    if($sf_user->hasCredential(array('admin','sysadmin'))){
	echo "You are a System Administration AND an admin ";
}
<?php
    if($sf_user->hasCredential(array('admin','sysadmin'), false)){
	echo "You are a System Administrator AND an admin ";
}
