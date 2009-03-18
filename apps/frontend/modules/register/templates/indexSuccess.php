<h1>Register List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Domainname</th>
      <th>Name</th>
      <th>Fathers name</th>
      <th>Grand fathers name</th>
      <th>Login</th>
      <th>Phone</th>
      <th>Nt password</th>
      <th>Lm password</th>
      <th>Crypt password</th>
      <th>Unix password</th>
      <th>Gid</th>
      <th>Uid</th>
      <th>Status</th>
      <th>Alternate email</th>
      <th>Email local part</th>
      <th>Email quota</th>
      <th>Expires at</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($user_list as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('register/edit?id='.$user->getId()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getDomainnameId() ?></td>
      <td><?php echo $user->getName() ?></td>
      <td><?php echo $user->getFathersName() ?></td>
      <td><?php echo $user->getGrandFathersName() ?></td>
      <td><?php echo $user->getLogin() ?></td>
      <td><?php echo $user->getPhone() ?></td>
      <td><?php echo $user->getNtPassword() ?></td>
      <td><?php echo $user->getLmPassword() ?></td>
      <td><?php echo $user->getCryptPassword() ?></td>
      <td><?php echo $user->getUnixPassword() ?></td>
      <td><?php echo $user->getGid() ?></td>
      <td><?php echo $user->getUid() ?></td>
      <td><?php echo $user->getStatus() ?></td>
      <td><?php echo $user->getAlternateEmail() ?></td>
      <td><?php echo $user->getEmailLocalPart() ?></td>
      <td><?php echo $user->getEmailQuota() ?></td>
      <td><?php echo $user->getExpiresAt() ?></td>
      <td><?php echo $user->getCreatedAt() ?></td>
      <td><?php echo $user->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('register/new') ?>">New</a>
