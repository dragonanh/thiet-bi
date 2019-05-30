<?php

/**
 * Article filter form.
 *
 * @package    filters
 * @subpackage Article *
 * @version    SVN: $Id: ArticleFormFilter.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleAdminFormFilter extends BaseArticleFormFilter
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
    $this->widgetSchema['group_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleGroup'), 'add_empty' => '-- Chọn nhóm tin --'));
    $this->widgetSchema->setLabels(array(
      'title' => 'Tiêu đề',
      'status' => 'Trạng thái',
      'group_id' => 'Nhóm tin',
    ));
  }

  public function doBuildQuery(array $values){
    $query = parent::doBuildQuery($values);
    $alias = $query->getRootAlias();
    $query->leftJoin($alias.'.ArticleGroup a');
    if(isset($values['title']) && $values['title'] != '')
      $query->andWhere('title like ?', '%'.VtHelper::translateQuery($values['title']).'%');
    if(isset($values['status']) && $values['status'] != '')
      $query->andWhere('status = ?', $values['status']);
    if(isset($values['group_id']) && $values['group_id'] != ''){
      $query->andWhere('group_id = ?', $values['group_id']);
    }

    return $query;
  }
}