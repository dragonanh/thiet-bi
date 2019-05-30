<?php

/**
 * ArticleGroup filter form.
 *
 * @package    source
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleGroupAdminFormFilter extends BaseArticleGroupFormFilter
{
  public function configure()
  {
    $this->widgetSchema['name'] = new sfWidgetFormInputText();
    $this->validatorSchema['name'] = new sfValidatorString(array(
      'required' => false,
      'trim' => true
    ));
    $isActiveArr = array('' => 'Tất cả', 0 => 'Không kích hoạt', 'Kích hoạt');
    $this->widgetSchema['is_active'] = new sfWidgetFormChoice(array(
      'choices' => $isActiveArr
    ));
    $this->validatorSchema['is_active'] = new sfValidatorChoice(array(
      'choices' => array_keys($isActiveArr),
      'required' => false
    ));

    $positionArr = ArticleGroupPosition::getArr();
    $this->widgetSchema['position'] = new sfWidgetFormChoice(array(
      'choices' => $positionArr,
      'expanded' => true,
      'multiple' => true
    ),array('class' => 'filterMultiCheckbox'));
    $this->validatorSchema['position'] = new sfValidatorChoice(array(
      'choices' => array_keys($positionArr),
      'multiple' => true,
      'required' => false
    ));

    $this->widgetSchema->setLabels(array(
      'name' => 'Tên nhóm',
      'is_active' => 'Trạng thái',
      'position' => 'Vị trí',
    ));
  }

  public function doBuildQuery(array $values){
    $query = parent::doBuildQuery($values);
    if(isset($values['name']) && $values['name'] != '')
      $query->andWhere('name like ?', '%'.VtHelper::translateQuery($values['name']).'%');
    if(isset($values['is_active']) && $values['is_active'] != '')
      $query->andWhere('is_active = ?', $values['is_active']);
    if(isset($values['position']) && $values['position'] != ''){
      foreach($values['position'] as $position){
        $query->andWhere('find_in_set(?,position)', $position);
      }
    }

    return $query;
  }
}
