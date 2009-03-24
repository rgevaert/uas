<?php use_helper('I18N', 'Date') ?>
<?php include_partial('user/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('User ' . $user->getFullName(), array(), 'messages') ?></h1>

  <?php include_partial('user/flashes') ?>

  <div id="sf_admin_header">
	<p>Actions: <br /br>
	<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a>
<a href="<?php echo url_for('user/delete?id='.$user->getId()) ?>">Delete</a>
 <a href="" onclick="window.print();return false;">print version</a>  


		<a href="">Extend</a>
		
	</p> 
  </div>

  <div id="sf_admin_content">
	<table>
		<tr>
			<td><label>Status</label></td>
			<td><b><?php echo $user->getStatus(); ?></b></td>
		</tr>
		<tr>
			<td><label>Name</label></td>
			<td><?php echo $user->getName(); ?></td>
		</tr>
		<tr>
			<td><label>Fathers name</label></td>
			<td><?php echo $user->getFathersName(); ?></td>
		</tr>
		<tr>
			<td><label>Grandfathers name</label></td>
			<td><?php echo $user->getGrandFathersName(); ?></td>
		</tr>
		<tr>
			<td><label>Email address</label></td>
			<td><?php echo $user->getEmailLocalPart() . "@" . $user->getDomainname()->getName(); ?></td>
		</tr>
		<tr>
			<td><label>Alternate Email address</label></td>
			<td><?php echo $user->getAlternateEmail(); ?></td>
		</tr>
		<tr>
			<td><label>Phone</label></td>
			<td><?php echo $user->getPhone(); ?></td>
		</tr>
		<tr>
			<td><label>Gid:Uid</label></td>
			<td><?php echo $user->getGid() . ":" . $user->getUid(); ?></td>
		</tr>
	</table>
  </div>

  <div id="sf_admin_footer">
  </div>
</div>
