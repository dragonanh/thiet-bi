<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

/**
 * article actions.
 *
 * @package    source
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends autoArticleActions
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
//        'description' => sprintf('Xoá bài viết %s', $obj->getTitle()),
//        'object_id' => $obj->getId()
//      );
//      UserActionLogTable::insertLog($logArr);
    }

    $this->redirect('@article');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $article = $form->save();
//        $description = $form->isNew() ? sprintf('Thêm bài viết %s', $article->getTitle()) : sprintf('Sửa bài viết %s', $article->getTitle());
//        $logArr = array(
//          'description' => $description,
//          'object_id' => $article->getId()
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $article)));

      if ($request->hasParameter('_save_and_exit'))
      {
        $this->getUser()->setFlash('success', $notice);
        $this->redirect('@article');
      } elseif ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('success', $notice.' You can add another one below.');

        $this->redirect('@article_new');
      }
      else
      {
        $this->getUser()->setFlash('success', $notice);

        $this->redirect(array('sf_route' => 'article_edit', 'sf_subject' => $article));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
