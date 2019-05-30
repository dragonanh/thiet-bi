<?php

/**
 * Category form.
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryAdminForm extends BaseCategoryForm
{
  public function configure()
  {
      $this->useFields(array('name','description','is_active','priority'));
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      $this->validatorSchema['name'] = new sfValidatorString(array(
          'trim' => true,
          'required' => true,
          'max_length' => 255
      ));

      $this->widgetSchema['description'] = new sfWidgetFormTextarea();

      $isActiveArr = CommonIsActive::getArr();
      $this->widgetSchema['is_active'] = new sfWidgetFormChoice(array(
          'choices' => $isActiveArr
      ));
      $this->validatorSchema['is_active'] = new sfValidatorChoice(array(
          'required' => true,
          'choices' => array_keys($isActiveArr)
      ));

      $this->widgetSchema->setLabels(array(
          'name' => 'Tên danh mục',
          'is_active' => 'Trạng thái',
      ));
  }
}
