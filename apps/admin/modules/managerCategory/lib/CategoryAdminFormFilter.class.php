<?php

/**
 * Category filter form.
 *
 * @package    source
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryAdminFormFilter extends BaseCategoryFormFilter
{
  public function configure()
  {
      $this->useFields(array('name','is_active'));
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      $this->validatorSchema['name'] = new sfValidatorString(array(
          'trim' => true,
          'required' => false
      ));

      $isActiveArr = array('' => 'Tất cả') + CommonIsActive::getArr();
      $this->widgetSchema['is_active'] = new sfWidgetFormChoice(array(
          'choices' => $isActiveArr
      ));
      $this->validatorSchema['is_active'] = new sfValidatorChoice(array(
          'required' => false,
          'choices' => array_keys($isActiveArr)
      ));

      $this->widgetSchema->setLabels(array(
          'name' => 'Tên danh mục',
          'is_active' => 'Trạng thái',
      ));
  }

  public function doBuildQuery(array $values)
  {
      $query = parent::doBuildQuery($values);
      if(isset($values['name']) && $values['name'] != '')
          $query->andWhere('name like ?', '%'.VtHelper::translateQuery($values['name']).'%');
      if(isset($values['is_active']) && $values['is_active'] != '')
          $query->andWhere('is_active = ?', $values['is_active']);
      return $query->orderBy('priority');
  }
}
