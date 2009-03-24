<h3> Change password </h3>
Your login is: <?php echo $user->getLogin() ?> <br /><br />
<form action="echo url_for('user/changepassword)' ?>" method="POST">

<table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
      <input type="submit" />
      </td>
    </tr>
  </table>

<a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Edit</a> |

<a href="<?php echo url_for('user/show?id='.$user->getId()); ?>">Cancel</a>
