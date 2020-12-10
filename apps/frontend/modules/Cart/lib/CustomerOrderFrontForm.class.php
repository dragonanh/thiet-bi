<?php

/**
 * CustomerOrder form.
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CustomerOrderFrontForm extends BaseCustomerOrderForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'],$this['status']);
    $this->widgetSchema["full_name"] = new sfWidgetFormInputText([], [
      "class" => "input-text"
    ]);
    $this->validatorSchema["full_name"] = new sfValidatorString([
      "required" => true,
      "max_length" => 50
    ]);

    $this->widgetSchema["phone_number"] = new sfWidgetFormInputText([], [
      "class" => "input-text"
    ]);
    $this->validatorSchema["phone_number"] = new sfValidatorString([
      "required" => true,
      "max_length" => 15
    ]);

    $this->widgetSchema["address"] = new sfWidgetFormInputText([], [
      "class" => "input-text"
    ]);
    $this->validatorSchema["address"] = new sfValidatorString([
      "required" => true,
      "max_length" => 255
    ]);

    $this->widgetSchema["note"] = new sfWidgetFormTextarea([], [
      "class" => "input-text",
      "col" => 5,
      "row" => 2
    ]);
  }

  public function processValues($values)
  {
    $values = parent::processValues($values);
    $sessionName = 'Cart.listProduct';
    $listProductInCart = sfContext::getInstance()->getUser()->getAttribute($sessionName, [], 'frontend');
    $totalPrice = 0;
    if(count($listProductInCart)){
      foreach ($listProductInCart as $product){
        $totalPrice += $product['quantity'] * $product['price'];
      }
    }

    $values["total_price"] = $totalPrice;
    return $values;
  }
}
