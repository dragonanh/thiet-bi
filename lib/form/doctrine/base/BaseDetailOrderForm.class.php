<?php

/**
 * DetailOrder form base class.
 *
 * @method DetailOrder getObject() Returns the current form's model object
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetailOrderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'order_id'     => new sfWidgetFormInputText(),
      'product_id'   => new sfWidgetFormInputText(),
      'product_name' => new sfWidgetFormInputText(),
      'price'        => new sfWidgetFormInputText(),
      'quantity'     => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'order_id'     => new sfValidatorInteger(array('required' => false)),
      'product_id'   => new sfValidatorInteger(array('required' => false)),
      'product_name' => new sfValidatorInteger(array('required' => false)),
      'price'        => new sfValidatorNumber(array('required' => false)),
      'quantity'     => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('detail_order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetailOrder';
  }

}
