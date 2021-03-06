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
    $productId = trim($request->getParameter('id'));
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


    $listProductInCart = $this->getUser()->getListProductInCart();
    $maxProductInCart = 10;
    if(count($listProductInCart) >= $maxProductInCart){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => sprintf('Giỏ hàng đã quá số lượng cho phép (Tối đa %s sản phẩm)', $maxProductInCart)
      ]));
    }

    $action = $request->getParameter('act', 'new');
    if(!$action || !in_array($action, ['new','update'])){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => 'Tham số không hợp lệ'
      ]));
    }

    $newQuantity = $request->getParameter('quantity', 1);
    if($newQuantity <= 0 || !preg_match('/^[0-9]+$/', $newQuantity)){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => 'Vui lòng nhập số nguyên dương'
      ]));
    }

    $isExist = false;
    $maxQuantity = 20;
    if(count($listProductInCart)) {
      foreach ($listProductInCart as $key => $productInCart) {
        if ($productInCart['id'] == $product->getId()) {
          //truong hop da ton tai san pham trong gio hang
          //thuc hien tang so luong
          if($action == 'update')
            $quantity = $newQuantity;
          else
            $quantity = $productInCart['quantity'] + $newQuantity;
          $isExist = true;
          if($quantity > $maxQuantity){
            return $this->renderText(json_encode([
              'errorCode' => 1,
              'message' => sprintf('%s đã quá số lượng cho phép (Tối đa %s)', $productInCart['name'], $maxProductInCart)
            ]));
          }

          $listProductInCart[$key]['quantity'] = $quantity;
          break;
        }
      }
    }

    if(!$isExist && $action == 'new') {
      $listProductInCart[] = [
        'id' => $product->getId(),
        'slug' => $product->getSlug(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
        'image_path' => $product->getImagePath(),
        'quantity' => $newQuantity
      ];
    }
    $this->getUser()->updateCart($listProductInCart);

    return $this->renderText(json_encode([
      'errorCode' => 0,
      'message' => $action == 'update' ? 'Cập nhật giỏ hàng thành công' : 'Thêm vào giỏ hàng thành công',
      'template' => $this->getComponent('Common', 'cart'),
      'templateCartPage' => $action == 'update' ? $this->getComponent('Cart','cartContent') : ""
    ]));
  }

  public function executeAjaxRemoveItem(sfWebRequest $request){
    $this->getResponse()->setContentType('application/json; charset=utf-8');
    $productId = trim($request->getParameter('id'));
    if(!$productId){
      return $this->renderText(json_encode([
        'errorCode' => 1,
        'message' => 'Thiếu tham số'
      ]));
    }

    $listProductInCart = $this->getUser()->getListProductInCart();
    if(count($listProductInCart)){
      foreach ($listProductInCart as $key => $productInCart) {
        if ($productInCart['id'] == $productId) {
          unset($listProductInCart[$key]);
          break;
        }
      }
    }
    $this->getUser()->updateCart($listProductInCart);

    return $this->renderText(json_encode([
      'errorCode' => 0,
      'message' => 'Xoá sản phẩm thành công',
      'template' => $this->getComponent('Common', 'cart'),
      'templateCartPage' => $this->getComponent('Cart','cartContent')
    ]));
  }

  public function executeCheckout(sfWebRequest $request){
    $this->error = null;
    $sessionName = 'Cart.listProduct';
    $listProductInCart = $this->getUser()->getAttribute($sessionName, [], 'frontend');
    if(count($listProductInCart)){
      $this->listProductInCart = $listProductInCart;
      $this->form = new CustomerOrderFrontForm();
      if($request->isMethod("post")){
        $this->form->bind($request->getParameter($this->form->getName()));
        if($this->form->isValid()){
          try{
              $order = $this->form->save();
              $orderId = $order->getId();

              foreach ($listProductInCart as $product){
                DetailOrderTable::saveOrder($orderId, $product['id'], $product['name'], $product['price'], $product['quantity']);
              }
              
              $this->getUser()->setAttribute("checkout.success", ["customer_info" => $this->form->getValues(), "cart" => $listProductInCart], 'frontend');
              $this->redirect("orderReceived");
          }catch(Exception $e){
           var_dump($e->getMessage());die;
          }
        }
      }
    }else{
      $this->error =  "Vui lòng chọn sản phẩm trước khi đặt hàng";
    }
  }

  public function executeOrderReceived(sfWebRequest $request){

  }
}
