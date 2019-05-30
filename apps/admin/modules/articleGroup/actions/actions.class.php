<?php

require_once dirname(__FILE__).'/../lib/articleGroupGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGroupGeneratorHelper.class.php';

/**
 * articleGroup actions.
 *
 * @package    source
 * @subpackage articleGroup
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleGroupActions extends autoArticleGroupActions
{
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
//    $obj = $this->getRoute()->getObject();
    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
//      $logArr = array(
//        'description' => sprintf('Xoá nhóm bài viết %s', $obj->getName()),
//        'object_id' => $obj->getId()
//      );
//      UserActionLogTable::insertLog($logArr);
    }

    $this->redirect('@article_group');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $article_group = $form->save();
//        $description = $form->isNew() ? sprintf('Thêm nhóm bài viết %s', $article_group->getName()) : sprintf('Sửa nhóm bài viết %s', $article_group->getName());
//        $logArr = array(
//          'description' => $description,
//          'object_id' => $article_group->getId()
//        );
//        UserActionLogTable::insertLog($logArr);
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
          $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $article_group)));

      if ($request->hasParameter('_save_and_exit'))
      {
        $this->getUser()->setFlash('success', $notice);
        $this->redirect('@article_group');
      } elseif ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('success', $notice.' You can add another one below.');

        $this->redirect('@article_group_new');
      }
      else
      {
        $this->getUser()->setFlash('success', $notice);

        $this->redirect(array('sf_route' => 'article_group_edit', 'sf_subject' => $article_group));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
