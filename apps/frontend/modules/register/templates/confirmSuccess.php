<h1>Confirmation</h1>

<p>Your account registration was successfully.</p>
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
        </table>
