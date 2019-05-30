<?php

/**
 * User: os_vuongch
 * Date: 12/11/12
 * Time: 7:59 AM
 */
class VtSignInChangePasswordForm extends BasesfGuardFormSignin {

  public function configure() {
    $i18n = sfContext::getInstance()->getI18N();

    parent::configure();
    unset($this['remember']);

    $this->widgetSchema['new_password'] = new sfWidgetFormInputPassword(array('type' => 'password'));

    $this->validatorSchema['new_password'] = new sfValidatorRegex(
            array(
      'trim' => false,
      'pattern' => sfConfig::get('app_pattern_password'),
      'required' => true,
      'max_length' => 128,
            ), array('invalid' => $i18n->__('Your password must have at least 8 characters,maximum 128 characters include number and special characters,non space.'))
    );


    $this->widgetSchema['repeat_password'] = clone $this->widgetSchema['new_password'];

    $this->validatorSchema['repeat_password'] = clone $this->validatorSchema['new_password'];

    $this->widgetSchema->moveField('repeat_password', 'after', 'new_password');

    $this->mergePostValidator(new sfValidatorSchemaCompare('new_password', sfValidatorSchemaCompare::NOT_EQUAL, 'password', array(), array('invalid' => $i18n->__('New password must be different than the old one.'))));

    $this->mergePostValidator(new sfValidatorSchemaCompare('repeat_password', sfValidatorSchemaCompare::EQUAL, 'new_password', array(), array('invalid' => $i18n->__('Please enter the same password as above.'))));

    $this->widgetSchema['username']->setAttribute('readonly', true);

    $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD();

    $this->validatorSchema['captcha'] = new sfValidatorPass();
  }

  public function setUserName($username) {
    $this->setDefault('username', $username);
  }

}