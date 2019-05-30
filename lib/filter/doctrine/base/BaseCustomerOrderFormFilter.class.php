<?php

/**
 * CustomerOrder filter form base class.
 *
 * @package    source
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCustomerOrderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'status'       => new sfWidgetFormFilterInput(),
      'full_name'    => new sfWidgetFormFilterInput(),
      'phone_number' => new sfWidgetFormFilterInput(),
      'city_id'      => new sfWidgetFormFilterInput(),
      'address'      => new sfWidgetFormFilterInput(),
      'note'         => new sfWidgetFormFilterInput(),
      'payment_type' => new sfWidgetFormFilterInput(),
      'total_price'  => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'full_name'    => new sfValidatorPass(array('required' => false)),
      'phone_number' => new sfValidatorPass(array('required' => false)),
      'city_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'      => new sfValidatorPass(array('required' => false)),
      'note'         => new sfValidatorPass(array('required' => false)),
      'payment_type' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_price'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('customer_order_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerOrder';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'status'       => 'Number',
      'full_name'    => 'Text',
      'phone_number' => 'Text',
      'city_id'      => 'Number',
      'address'      => 'Text',
      'note'         => 'Text',
      'payment_type' => 'Number',
      'total_price'  => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
