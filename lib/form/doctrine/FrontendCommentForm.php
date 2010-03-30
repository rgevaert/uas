<?php

/**
 * FrontendComment form.
 *
 * @package    uas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class FrontendCommentForm extends CommentForm
{
  public function configure_specific()
  {
   parent::configure_specific();

    unset(
        $this['is_activated'],
        $this['created_at']
        );
    $this->widgetSchema->setLabels(array(
     'is_public' => 'Public?'
     ));
  }
}
