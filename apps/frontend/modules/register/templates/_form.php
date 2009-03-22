<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('register/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('register/index') ?>">Reset</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'register/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fathers_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['fathers_name']->renderError() ?>
          <?php echo $form['fathers_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['grand_fathers_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['grand_fathers_name']->renderError() ?>
          <?php echo $form['grand_fathers_name'] ?>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone']->renderError() ?>
          <?php echo $form['phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['alternate_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['alternate_email']->renderError() ?>
          <?php echo $form['alternate_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email_local_part']->renderLabel() ?></th>
        <td>
          <?php echo $form['email_local_part']->renderError() ?>
          <?php echo $form['email_local_part'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
