<?php use_helper('I18N', 'Date') ?>
<?php include_partial('user/assets') ?>

<div id="sf_admin_container">


	<h1><?php echo __('User ' . $user->getFullName(), array(), 'messages') ?></h1>

	<?php include_partial('user/flashes') ?>

	<div id="sf_admin_header">
		<p><b>Actions</b> > > 
			<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a> | 
			 <a href="<?php echo url_for('user/listDelete?id='.$user->getId()) ?>">Delete</a> | 
			<a href="" onclick="window.print();return false;">print version</a>  | 
			<a href="<?php echo url_for('user/resetpassword?id='.$user->getId()); ?>">Reset Password</a> |
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
				<td><label>Login</label></td>
				<td><?php echo $user->getLogin(); ?></td>
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
			<?php if($sf_user->hasFlash('generated_pass')): ?>
				<tr>
					<td><label>Auto Generated Password</label></td>
					<td><?php echo htmlentities($sf_user->getFlash('generated_pass')); ?></td>
				</tr>
			<?php endif; ?>
		</table>
		
		<div> <h3> FTP Accounts </h3> 
			<table>
				<tr>
					<th>Upload Bandwidth</th>
					<th>Download Bandwidth</th>
					<th>IP Access</th>
					<th>Quota Size</th>
					<th>Quota Files</th>
				</tr>

				<?php foreach($ftp_accounts as $ftp_account): ?>
					<tr>
						<td><?php echo $ftp_account->getUpBandwidth(); ?></td>
						<td><?php echo $ftp_account->getDownBandwidth(); ?></td>
						<td><?php echo $ftp_account->getIpAccess();  ?></td>
						<td><?php echo $ftp_account->getQuotaSize();  ?></td>
						<td><?php echo $ftp_account->getQuotaFiles();  ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>

		<div><h3> Samba Accounts </h3>
			<table>
				<tr>
					<th>Hostname</th>
				</tr>
				<?php foreach($samba_accounts as $samba_account){ ?>

					<tr>
						<td><?php echo $samba_account->getHostname(); ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>

			<div><h3> Unix Accounts </h3> 
				<table>
					<tr>
						<th>Unix Host Name</th>
						<th>Unix Quota size</th>
					</tr>
					<?php foreach($unix_accounts as $unix_account): ?>
						<tr>
							<td><?php echo $unix_account->getHostname(); ?></td>
							<td><?php echo $unix_account->getQuota(); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>

		</div>
		<div id="sf_admin_footer">
		</div>
	</div>

