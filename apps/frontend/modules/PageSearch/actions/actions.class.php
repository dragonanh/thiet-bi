<?php

/**
 * vtCommon actions.
 *
 * @package    mobile_marketing
 * @subpackage vtCommon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageSearchActions extends sfActions
{
  protected function setTitle($string){
    $this->getResponse()->setTitle($string);
  }

  public function executeIndex(sfWebRequest $request){
    $this->page = (int)$request->getParameter('page',1);
    $this->listMaxPerPage = [20, 40, 100];
    $maxPerPage = (int)$request->getParameter('max_per_page', 20);
    if(!in_array($maxPerPage, $this->listMaxPerPage))
      $maxPerPage = 20;
    $paramSearch = $request->getGetParameters();
    $query = ProductTable::searchProduct($paramSearch);
    $this->pager = VtHelper::setPager($query, $this->page, 'Product', $maxPerPage);
    $this->url = $this->generateUrl('search_product', $paramSearch);
    $this->keyword = isset($paramSearch['kw']) ? $paramSearch['kw'] : "";
  }
}
