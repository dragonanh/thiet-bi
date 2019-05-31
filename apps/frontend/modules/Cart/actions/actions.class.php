<?php

/**
 * vtContact actions.
 *
 * @package    source
 * @subpackage vtContact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php_bak.bak 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CartActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  }

  public function executeAjaxAddToCart(sfWebRequest $request){
    $this->getResponse()->setContentType('application/json; charset=utf-8');
    $productId = $request->getParameter('id');
    if(!$productId){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => 'Thiếu tham số'
      ]));
    }

    $product = ProductTable::getProductById($productId);
    if(!$product){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => 'Sản phẩm không tồn tại'
      ]));
    }


    $sessionName = 'Cart.listProduct';
    $listProductInCart = $this->getUser()->getAttribute($sessionName, [], 'frontend');
    $maxProductInCart = 10;
    if(count($listProductInCart) > $maxProductInCart){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => sprintf('Giỏ hàng đã quá số lượng cho phép (Tối đa %s sản phẩm)', $maxProductInCart)
      ]));
    }

    $isExist = false;
    $maxQuantity = 20;
    if(count($listProductInCart)) {
      foreach ($listProductInCart as $key => $productInCart) {
        if ($productInCart['id'] == $product->getId()) {
          //truong hop da ton tai san pham trong gio hang
          //thuc hien tang so luong
          $isExist = true;
          if($productInCart['quantity'] > $maxQuantity){
            return $this->renderText(json_encode([
              'errorCode' => 1,
              'message' => sprintf('%s đã quá số lượng cho phép (Tối đa %s)', $productInCart['name'], $maxProductInCart)
            ]));
          }

          $listProductInCart[$key]['quantity'] = $productInCart['quantity']+1;
          break;
        }
      }
    }

    if(!$isExist) {
      $listProductInCart[] = [
        'id' => $product->getId(),
        'slug' => $product->getSlug(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
        'image_path' => $product->getImagePath(),
        'quantity' => 1
      ];
    }
    $this->getUser()->setAttribute($sessionName, $listProductInCart, 'frontend');

    return $this->renderText(json_encode([
      'errorCode' => 0,
      'message' => 'Thêm vào giỏ hàng thành công',
      'template' => $this->getComponent('Common', 'cart')
    ]));
  }

}
