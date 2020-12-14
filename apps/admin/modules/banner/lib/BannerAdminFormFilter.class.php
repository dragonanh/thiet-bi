<?php

/**
 * Banner filter form.
 *
 * @package    source
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerAdminFormFilter extends BaseBannerFormFilter
{
  public function configure()
  {
    $this->widgetSchema['title'] = new sfWidgetFormInputText();
    $this->validatorSchema['title'] = new sfValidatorString(array(
      'required' => false,
      'trim' => true
    ));
    $statusArr = array('' => 'Tất cả', 0 => 'Không hiển thị', 'Hiển thị');
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
      'choices' => $statusArr
    ));
    $this->validatorSchema['status'] = new sfValidatorChoice(array(
      'choices' => array_keys($statusArr),
      'required' => false
    ));
  }

  public function doBuildQuery(array $values){
    $query = parent::doBuildQuery($values);
    if(isset($values['title']) && $values['title'] != '')
      $query->andWhere('title like ?', '%'.VtHelper::translateQuery($values['title']).'%');
    if(isset($values['status']) && $values['status'] != '')
      $query->andWhere('status = ?', $values['status']);

    return $query;
  }
}
