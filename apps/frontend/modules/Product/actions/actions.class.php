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

        $viewedProduct = [
          'name' => $product->getName(),
          'slug' => $product->getSlug(),
          'image_path' => $product->getImagePath(),
          'price' => $product->getPrice(),
          'old_price' => $product->getOldPrice()
        ];
        $cookie_name = "ProductRecentlyViewed";
        $listRecentlyViewed = [];
        //lay danh sach san pham da xem
        if(isset($_COOKIE[$cookie_name])){
          $listRecentlyViewed = json_decode($_COOKIE[$cookie_name], true);
          foreach ($listRecentlyViewed as $key => $recently){
            if($recently['slug'] == $viewedProduct['slug']){
              unset($listRecentlyViewed[$key]);
            }
          }

          //remove last product if list greater than 20 product
          if(count($listRecentlyViewed) > 20) array_pop($listRecentlyViewed);
        }

        //them san pham hien tai vao dau danh sach
        array_unshift($listRecentlyViewed, $viewedProduct);

        //luu thong tin san pham moi xem vao cookie
        setcookie($cookie_name, json_encode($listRecentlyViewed), time() + (86400 * 365 * 10), "/"); // 86400 = 1 day
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
        $this->listMaxPerPage = [20, 40, 100];
        $query = ProductTable::getListProductByCategoryQuery($category->getId());
        $maxPerPage = (int)$request->getParameter('max_per_page', 20);
        if(!in_array($maxPerPage, $this->listMaxPerPage))
          $maxPerPage = 20;
        $this->pager = VtHelper::setPager($query,$page, 'Product', $maxPerPage);
        $this->getResponse()->addMeta('title', $category->getName());
        $this->url = $this->generateUrl('list_product_category', array('slug' => $slug, 'max_per_page' => $maxPerPage));
      }else
        $this->forward404();
    }else{
      $this->forward404();
    }
  }

}
