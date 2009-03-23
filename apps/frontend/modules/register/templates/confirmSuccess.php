<h1>Confirmation</h1>

<p>Your account registration was successful. Please keep the following detail in printed form that you need it in the future.</p>
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
			<td><label>Father's name</label></td>
                        <td><?php echo $user->getFathersName(); ?></td>
		</tr>
		<tr>
			<td><label>Grand Father's name</label></td>
                        <td><?php echo $user->getGrandFathersName(); ?></td>
		</tr>
		<tr>
			<td><label>Contact (Phone):</label></td>
                        <td><?php echo $user->getPhone(); ?></td>
		</tr>
		<tr>
			<td><label>Alternative email:</label></td>
                        <td><?php echo $user->getAlternateEmail(); ?></td>
		</tr>
		<tr>
			<td><label>New University E-Mail:</label></td>
                        <td><?php echo $user->getEmailLocalPart(); ?></td>
		</tr>
		<tr>
			<td><label>System generated password:</label></td>
                        <td><?php echo $_SESSION['generated_pass']; ?>
</td>
		</tr>
        </table>
