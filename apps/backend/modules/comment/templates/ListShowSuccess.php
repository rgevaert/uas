<?php use_helper('I18N', 'Date') ?>
<?php include_partial('comment/assets') ?>

<div id="sf_admin_container">
	

	<?php include_partial('comment/flashes') ?>
		<div id="sf_admin_header">
		<p><b>Actions</b> > > 
			 <a href="<?php echo url_for('comment/listDelete?id='.$user->getId()) ?>">Delete this comment</a>

		</p> 
	</div>
	

	<div id="sf_admin_content"><br />
	
	<p> <strong> Comment Given by: <?php echo $user->getUser(); ?> </strong> </p>
		<table>
			<tr>
				<td><label>Subject</label></td>
				<td><b><?php echo $user->getSubject(); ?></b></td>
			</tr>
			<tr>
				<td><label>Message</label></td>
				<td><?php echo $user->getMessage(); ?></td>
			</tr>			
		</table>		
		</div>
		<div id="sf_admin_footer">
		</div>
	</div>

