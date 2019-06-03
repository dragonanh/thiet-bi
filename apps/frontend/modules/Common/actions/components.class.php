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

    }
    public function executeMenu(){
      $this->listCategory = CategoryTable::getListActiveCategory(7);
    }

    public function executeSidebarRight(){
      $this->listNewestProduct = ProductTable::getListNewestProduct(5);
      $this->listArticle = ArticleTable::getListArticleByPosition(ArticleGroupPosition::SIDEBAR_RIGHT, 7);
    }

    public function executeCart(){
      $listProductInCart = $this->getUser()->getListProductInCart();
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
