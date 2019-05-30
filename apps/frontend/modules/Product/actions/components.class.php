<?php

/**
 * vtManageAvatar actions.
 *
 * @package    mobile_marketing
 * @subpackage vtManageAvatar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductComponents extends sfComponents
{
  public function executeRelatedProduct(){
    $relateProduct = [];
    $listCateId = ProductCategoryTable::getListCategoryByProduct($this->productId);
    if(count($listCateId)) {
      $cateArr = array();
      foreach ($listCateId as $cate)
        $cateArr[] = $cate['category_id'];
      $relateProduct = ProductTable::getListProductByCategory($cateArr, 16, $this->productId);
    }

    $this->relateProduct = $relateProduct;
  }
  
}