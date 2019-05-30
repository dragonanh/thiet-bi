<?php

/**
 * CustomerOrder form base class.
 *
 * @method CustomerOrder getObject() Returns the current form's model object
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCustomerOrderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'status'       => new sfWidgetFormInputText(),
      'full_name'    => new sfWidgetFormInputText(),
      'phone_number' => new sfWidgetFormInputText(),
      'city_id'      => new sfWidgetFormInputText(),
      'address'      => new sfWidgetFormInputText(),
      'note'         => new sfWidgetFormTextarea(),
      'payment_type' => new sfWidgetFormInputText(),
      'total_price'  => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'status'       => new sfValidatorInteger(array('required' => false)),
      'full_name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone_number' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'city_id'      => new sfValidatorInteger(array('required' => false)),
      'address'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'note'         => new sfValidatorString(array('required' => false)),
      'payment_type' => new sfValidatorInteger(array('required' => false)),
      'total_price'  => new sfValidatorNumber(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('customer_order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerOrder';
  }

}
