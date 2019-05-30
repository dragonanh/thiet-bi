<?php

/**
 * ArticleGroup form.
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleGroupAdminForm extends BaseArticleGroupForm
{
  public function configure()
  {
    $this->useFields(array('name','description','is_active','position'));
    $positionArr = ArticleGroupPosition::getArr();
    $this->widgetSchema['position'] = new sfWidgetFormChoice(array(
      'choices' => $positionArr,
      'expanded' => true,
      'multiple' => true
    ));
    $this->validatorSchema['position'] = new sfValidatorChoice(array(
      'choices' => array_keys($positionArr),
      'multiple' => true,
      'required' => false
    ));

    $this->widgetSchema->setLabels(array(
      'name' => 'Tên nhóm',
      'description' => 'Mô tả',
      'is_active' => 'Kích hoạt',
      'position' => 'Vị trí',
    ));
  }

  public function processValues($values){
    $values = parent::processValues($values);
    if(count($values['position']))
      $values['position'] = implode(',',$values['position']);
    else
      $values['position'] = '';

    return $values;
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
    if (!$this->isNew() && $this->getObject()->getPosition())
    {
      $this->setDefault('position', explode(',',$this->getObject()->getPosition()));
    }
  }
}
