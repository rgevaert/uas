<?php use_helper('I18N', 'Date') ?>
<?php include_partial('user/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('User ' . $user->getFullName(), array(), 'messages') ?></h1>

  <?php include_partial('user/flashes') ?>

  <div id="sf_admin_header">
	<p><b>Actions</b> > > 
	<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a> | 
 <a href="<?php echo url_for('user/delete?id='.$user->getId()) ?>">Delete</a> | 
 <a href="" onclick="window.print();return false;">print version</a>  | 

 <?php if(!$ftp_account){ ?>
     <a href="<?php echo url_for('ftp_account/new'); ?>">Create FTP Account</a> |
 <?php } ?>

 <?php if(!$samba_account){ ?>
     <a href="<?php echo url_for('samba_account/new'); ?>">Create Samba Account</a> |
 <?php } ?>

 <?php if(!$unix_account){ ?>
     <a href="<?php echo url_for('unix_account/new'); ?>">Create Unix Account</a> |
 <?php } ?>
   
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
			<td><?php echo $sf_user->getFlash('generated_pass'); ?></td>
		</tr>
                <?php endif; ?>
	</table>
        <?php if($ftp_account){ ?>
        <div> <h3> FTP Account </h3> </div>
       
	<table>
		<tr>
			<td><label>Upload Bandwidth</label></td>
			<td><?php echo $ftp_account->getUpBandwidth(); ?></td>
		</tr>
		<tr>
			<td><label>Download Bandwidth</label></td>
			<td><?php echo $ftp_account->getDownBandwidth(); ?></td>
		</tr>
		<tr>
			<td><label>IP Access</label></td>
			<td><?php echo $ftp_account->getIpAccess();  ?></td>
		</tr>
		<tr>
			<td><label>Quota Size</label></td>
			<td><?php echo $ftp_account->getQuotaSize();  ?></td>
		</tr>
		<tr>
			<td><label>Quota Files</label></td>
			<td><?php echo $ftp_account->getQuotaFiles();  ?></td>
		</tr>
        </table>
        <?php } ?>


        <?php if($samba_account){ ?>
        <div> <br /> <h3> Samba Account </h3> </div>
       
	<table>
		<tr>
			<td><label>Host Name</label></td>
			<td><?php echo $samba_account->getHostname(); ?></td>
		</tr>
        </table>
        <?php } ?>




        <?php if($unix_account){ ?>
        <div> <br /> <h3> Unix Account </h3> </div>
       
	<table>
		<tr>
			<td><label>Unix Host Name</label></td>
			<td><?php echo $unix_account->getHostname(); ?></td>
		</tr>
		<tr>
			<td><label>Unix Quota size</label></td>
			<td><?php echo $unix_account->getQuota(); ?></td>
		</tr>
        </table>
        <?php } ?>


  </div>
  <div id="sf_admin_footer">
  </div>
</div>
