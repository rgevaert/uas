<h1>Comment List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Is public</th>
      <th>Is activated</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comment_list as $comment): ?>
    <tr>
      <td><a href="<?php echo url_for('comment/show?id='.$comment->getId()) ?>"><?php echo $comment->getId() ?></a></td>
      <td><?php echo $comment->getUserId() ?></td>
      <td><?php echo $comment->getSubject() ?></td>
      <td><?php echo $comment->getMessage() ?></td>
      <td><?php echo $comment->getIsPublic() ?></td>
      <td><?php echo $comment->getIsActivated() ?></td>
      <td><?php echo $comment->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('comment/new') ?>">New</a>
