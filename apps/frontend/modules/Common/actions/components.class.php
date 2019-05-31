<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class CommonComponents extends sfComponents
{
    public function executeHeader(){
//      $this->listCategory = CategoryTable::getListActiveCategory(7);
    }

    public function executeSidebarRight(){
      $this->listFeaturedProduct = ProductTable::getListFeaturedProduct(5);
      $this->listArticle = ArticleTable::getListArticleByPosition(ArticleGroupPosition::SIDEBAR_RIGHT, 7);
    }

    public function executeCart(){
      $sessionName = 'Cart.listProduct';
      $listProductInCart = $this->getUser()->getAttribute($sessionName, [], 'frontend');
      $totalPrice = $totalProduct = 0;
      if(count($listProductInCart)){
        foreach ($listProductInCart as $product){
          $totalPrice += $product['quantity'] * $product['price'];
          $totalProduct += $product['quantity'];
        }
      }
      $this->totalPrice = $totalPrice;
      $this->totalProduct = $totalProduct;
      $this->listProductInCart = $listProductInCart;
    }
}
