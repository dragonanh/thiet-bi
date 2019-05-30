<?php

/**
 * sfGuardUser form.
 *
 * @package    radio_ivr
 * @subpackage form
 * @author     loilv4
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserCustomAdminForm extends PluginsfGuardUserForm {

  public function configure() {
    $this->useFields(array('username','password','first_name','phone','email_address','is_active','is_super_admin','permissions_list'));
    $i18n = sfContext::getInstance()->getI18N();
    //validator cho truong username, password, email_address
    if ($this->isNew()) {
      $this->setValidator('username', new sfValidatorRegex(array(
        'required' => true,
        'pattern' => sfConfig::get('app_pattern_username'),
        'trim' => true,
      ), array(
        'invalid' => $i18n->__('Yêu cầu độ dài từ 6 -> 30 ký tự, chỉ gồm chữ cái, số và gạch dưới,ký tự đầu tiên phải là 1 chữ cái.'))
      ));
    } else {
      unset($this['username']);
      $this->widgetSchema['show_username'] = new sfWidgetFormPlainText(array(
        'value_data' => $this->getObject()->getUsername(),
        'required' => true,
      ));
      $this->widgetSchema->moveField('show_username', 'before', 'password');
    }

    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password'] = new sfValidatorRegex(array(
      'trim' => false,
      'required' => $this->isNew(),
      'max_length' => 128,
      'pattern' => sfConfig::get('app_pattern_password'),
    ), array(
      'invalid' => $i18n->__('Your password must have at least 8 characters,maximum 128 characters include number and special characters,non space.'),
    ));
    
    $this->widgetSchema['repeat_password'] = clone $this->widgetSchema['password'];

    $this->validatorSchema['repeat_password'] = new sfValidatorString(array(
        'trim' => false,
        'required' => $this->isNew()
    ));

    $this->widgetSchema->moveField('repeat_password', 'after', 'password');
    
    //loilv4 thay doi validator email
    $this->validatorSchema['email_address'] = new sfValidatorRegex(array(
      'pattern' => '/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/',
      'required' => true,
      'max_length' => 255,
      'trim' => true
    ));

    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoice(array(
      'multiple' => true,
      'expanded' => true,
      'model' => 'sfGuardPermission',
      'order_by' => array('name', 'asc'),
    ));

    $this->validatorSchema['permissions_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false));
    
    $this->widgetSchema->setLabels(array(
      'repeat_password' => 'Nhập lại mật khẩu',
      'first_name' => 'Họ và tên',
      'email_address' => 'Email',
      'phone' => 'Số điện thoại',
      'is_super_admin' => 'Siêu quản trị',
      'show_username' => 'Tên tài khoản',
      'permissions_list' => 'Danh sách quyền',
    ));
    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));
  }
  
  public function checkValidator($validator, $values) {
    if($values['repeat_password']){
      if($values['repeat_password'] != $values['password']){
        $error = new sfValidatorError($validator, 'Please enter the same password as above.');
        throw new sfValidatorErrorSchema($validator, array('repeat_password' => $error));
      }
    }
    
    return $values;
  }

}
