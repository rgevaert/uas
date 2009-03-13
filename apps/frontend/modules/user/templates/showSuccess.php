<table>
  <thead>
    <tr>
      <th colspan="2">Account information for <?php echo $user->getFullName() ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Full name:</th>
      <td><?php echo $user->getFullName() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $user->getLogin() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $user->getStatus() ?></td>
    </tr>
    <tr>
      <th>Expires at:</th>
      <td><?php echo $user->getExpiresAt() ?></td>
    </tr>    
    <tr>
      <th colspan="2">Email</th>
    </tr>     
    <tr>
      <th>Email address:</th>
      <td><?php echo $user->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Email quota:</th>
      <td><?php echo $user->getEmailQuota() ?></td>
    </tr>
    <tr>
      <th colspan="2">Contact information</th>
    </tr>    
    <tr>
      <th>Phone:</th>
      <td><?php echo $user->getPhone() ?></td>
    </tr>
   <tr>
      <th>Alternate email:</th>
      <td><?php echo $user->getAlternateEmail() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
