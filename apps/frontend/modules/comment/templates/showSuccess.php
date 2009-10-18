<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $comment->getId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $comment->getUserId() ?></td>
    </tr>
    <tr>
      <th>Subject:</th>
      <td><?php echo $comment->getSubject() ?></td>
    </tr>
    <tr>
      <th>Message:</th>
      <td><?php echo $comment->getMessage() ?></td>
    </tr>
    <tr>
      <th>Is public:</th>
      <td><?php echo $comment->getIsPublic() ?></td>
    </tr>
    <tr>
      <th>Is activated:</th>
      <td><?php echo $comment->getIsActivated() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $comment->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('comment/edit?id='.$comment->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('comment/index') ?>">List</a>
