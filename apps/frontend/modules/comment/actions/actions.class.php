<?php

/**
 * comment actions.
 *
 * @package    uas
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class commentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->comment_list = CommentPeer::doSelect(new Criteria());
    //$this->form = new CommentForm();
    $this->getUser()->setFlash('notice', 'Thank you! Your comment has been saved.');
    $this->redirect('comment/new');
    
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->comment = CommentPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->comment);
  }

  public function executeNew(sfWebRequest $request)
  {    
    $this->form = new FrontendCommentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new FrontendCommentForm();
    
    //var_dump($current_id);
    //die();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($comment = CommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object comment does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontendCommentForm($comment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($comment = CommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object comment does not exist (%s).', $request->getParameter('id')));
    $this->form = new FrontendCommentForm($comment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($comment = CommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object comment does not exist (%s).', $request->getParameter('id')));
    $comment->delete();

    $this->redirect('comment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $comment = $form->save();
      $comment->setUserId($this->getUser()->getAttribute('user_id'));
      $comment->save();      
      $this->redirect('comment/index?id='.$comment->getId());
    }
  }
}
