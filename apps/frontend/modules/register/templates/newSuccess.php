<h1>Account registration form</h1>

<p>Please fill in the form to register for an ICT account.</p>

<?php include_partial('form', array('form' => $form)) ?>
<a href="<?php echo url_for('session/login') ?>">Back to login page</a>
