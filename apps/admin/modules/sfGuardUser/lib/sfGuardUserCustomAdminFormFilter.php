<?php

/**
 * sfGuardUser filter form.
 *
 * @package    radio_ivr
 * @subpackage filter
 * @author     loilv4
 * @modifier: nghiald
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserCustomAdminFormFilter extends PluginsfGuardUserFormFilter {

  public function configure() {
    parent::configure();
    $i18n = sfContext::getInstance()->getI18N();

    $this->widgetSchema['username'] = new sfWidgetFormFilterInput(array('with_empty' => false), array(
      'maxlength' => 100,
    ));

    $this->widgetSchema['phone'] = new sfWidgetFormFilterInput(array('with_empty' => false), array(
      'maxlength' => 15,
    ));

    $this->widgetSchema['email_address'] = new sfWidgetFormFilterInput(array('with_empty' => false), array(
      'maxlength' => 100,
    ));

    $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(array(
      'multiple' => false,
      'model' => 'sfGuardGroup',
      'order_by' => array('name', 'asc'),
      'add_empty' => $i18n->__('All'),
    ));
    $arrStatus = array('' => $i18n->__('Tất cả'), '0' => $i18n->__('Ẩn'), '1' => $i18n->__('Kích hoạt'));
    $this->widgetSchema['is_active'] = new sfWidgetFormChoice(array(
      'choices' => $arrStatus
    ));
    $this->validatorSchema['is_active'] = new sfValidatorChoice(array(
      'choices' => array_keys($arrStatus),
      'required' => false
    ));
  }


  public function doBuildQuery(array $values) {
    $query = parent::doBuildQuery($values);

    if(isset($values['is_active']) && $values['is_active'] != ''){
       $query->andWhere('is_active = ?', $values['is_active']);
    }
    if(isset($values['phone']) && $values['phone'] != ''){
      $query->andWhere('phone like ?', '%'.VtHelper::translateQuery($values['phone']['text']).'%');
    }
    
    return $query;
  }
}
