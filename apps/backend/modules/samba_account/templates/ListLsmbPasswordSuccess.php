
<table>
<thead>
    <tr>
      <th>Host Name</th>
      <th> Login Name</th>
      <th> Uid</th>  
      <th> Nt Password</th> 
      <th> Lm Password</th>  
    </tr>
  </thead>
<?php foreach ($samba_account_list as $samba_account): ?>
    <tr>
      <td><?php echo $samba_account->getHostname() ?></td>
      <td><?php echo $samba_account->getUser()->getLogin() ?></td>
      <td><?php echo $samba_account->getUser()->getUid() ?></td>
      <td><?php echo $samba_account->getUser()->getNtPassword() ?></td>
      <td><?php echo $samba_account->getUser()->getLmPassword() ?></td>
    </tr>
    <?php endforeach; ?>
</table>
