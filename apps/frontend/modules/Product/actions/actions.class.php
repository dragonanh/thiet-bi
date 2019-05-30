<?php

/**
 * vtContact actions.
 *
 * @package    source
 * @subpackage vtContact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductActions extends sfActions
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
      $product = ProductTable::getProductBySlug($slug);
      if($product) {
        $this->product = $product;
        $this->getResponse()->addMeta('title', $product->getName());
      }else
        $this->forward404();
    }else{
      $this->forward404();
    }
  }

  public function executeListProduct(sfWebRequest $request){
    $slug = $request->getParameter('slug');
    if($slug){
      $category = CategoryTable::getCategoryBySlug($slug);
      if($category) {
        $this->category = $category;
        $page = (int)$request->getParameter('page',1);
        $query = ProductTable::getListProductByCategoryQuery($category->getId());
        $this->pager = VtHelper::setPager($query,$page, 'Product', 16);
        $this->getResponse()->addMeta('title', $category->getName());
        $this->url = $this->generateUrl('list_product_category', array('slug' => $slug));
      }else
        $this->forward404();
    }else{
      $this->forward404();
    }
  }

}
