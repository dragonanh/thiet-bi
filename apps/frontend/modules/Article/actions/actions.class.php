<?php

/**
 * vtContact actions.
 *
 * @package    source
 * @subpackage vtContact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $slug = $request->getParameter('slug');
    if($slug){
      $article = ArticleTable::getArticleBySlug($slug);
      if($article) {
        $this->article = $article;
        $this->relateArticle = $article->getArticleGroup()->getArticle();
        $this->getResponse()->addMeta('title', $article->getTitle());
      }else
        $this->forward404();
    }else{
      $this->forward404();
    }
  }

  public function executeListArticle(sfWebRequest $request){
    $this->page = $request->getParameter('page',1);
    if($request->getParameter('position')){
      $position = ArticleGroupPosition::SIDEBAR_RIGHT;
      $this->url = $this->generateUrl('list_article_position', array('position' => $position));
      $urlHeader = $this->generateUrl('list_article_position', array('position' => $position), true);
      $this->title = 'Danh sách tin khuyến mại';
    }else{
      $position = ArticleGroupPosition::GENERAL;
      $this->url = $this->generateUrl('list_article');
      $urlHeader = $this->generateUrl('list_article',array(),true);
      $this->title = 'Danh sách tin tức';
    }
    $query = ArticleTable::getArticleByPositionQuery($position);
    $this->pager = VtHelper::setPager($query, $this->page, 'Article', 10);
    $this->totalItemInPage = 10;
    $this->metaArr = array('canonical' => array(
      'url' => $urlHeader
    ));
  }

}
