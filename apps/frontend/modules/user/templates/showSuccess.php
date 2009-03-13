<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $user->getId() ?></td>
    </tr>
    <tr>
      <th>Domainname:</th>
      <td><?php echo $user->getDomainnameId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $user->getName() ?></td>
    </tr>
    <tr>
      <th>Fathers name:</th>
      <td><?php echo $user->getFathersName() ?></td>
    </tr>
    <tr>
      <th>Grand fathers name:</th>
      <td><?php echo $user->getGrandFathersName() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $user->getLogin() ?></td>
    </tr>
    <tr>
      <th>Phone:</th>
      <td><?php echo $user->getPhone() ?></td>
    </tr>
    <tr>
      <th>Nt password:</th>
      <td><?php echo $user->getNtPassword() ?></td>
    </tr>
    <tr>
      <th>Lm password:</th>
      <td><?php echo $user->getLmPassword() ?></td>
    </tr>
    <tr>
      <th>Crypt password:</th>
      <td><?php echo $user->getCryptPassword() ?></td>
    </tr>
    <tr>
      <th>Unix password:</th>
      <td><?php echo $user->getUnixPassword() ?></td>
    </tr>
    <tr>
      <th>Gid:</th>
      <td><?php echo $user->getGid() ?></td>
    </tr>
    <tr>
      <th>Uid:</th>
      <td><?php echo $user->getUid() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $user->getStatus() ?></td>
    </tr>
    <tr>
      <th>Alternate email:</th>
      <td><?php echo $user->getAlternateEmail() ?></td>
    </tr>
    <tr>
      <th>Email local part:</th>
      <td><?php echo $user->getEmailLocalPart() ?></td>
    </tr>
    <tr>
      <th>Email quota:</th>
      <td><?php echo $user->getEmailQuota() ?></td>
    </tr>
    <tr>
      <th>Expires at:</th>
      <td><?php echo $user->getExpiresAt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
