<?php

/**
 * Class sfGuardAdminFormSignin ke thua class sfGuardFormSignin
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Tiennx6
 * @since      08/10/2013
 */
class sfGuardAdminFormSignin extends sfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
  	parent::configure();
	
  	unset($this['remember'],$this['_csrf_token']);
  	$this->disableCSRFProtection();
  	$this->validatorSchema->setPostValidator(new sfCaptchaValidatorAdminUser());
  }
}

/**
 * Class sfCaptchaValidatorAdminUser ke thua class sfCaptchaValidatorUser
 *
 * @modified     Tiennx6
 * @since      08/10/2013
 */

class sfCaptchaValidatorAdminUser extends sfCaptchaValidatorUser {
  public function doClean($values) {
    // Neu captcha khong dung thi khong kiem tra thong tin dang nhap
 #   if (is_null($values['captcha'])) return $values;
    
    $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';

    $allowEmail = sfConfig::get('app_sf_guard_plugin_allow_login_with_email', true);
    $method = $allowEmail ? 'retrieveByUsernameOrEmailAddress' : 'retrieveByUsername';

    // don't allow to sign in with an empty username
    if ($username)
    {
       if ($callable = sfConfig::get('app_sf_guard_plugin_retrieve_by_username_callable'))
       {
           $user = call_user_func_array($callable, array($username));
       } else {
           $user = $this->getTable()->retrieveByUsername($username);
       }
        // user exists?
       if($user)
       {
          // password is ok?
          if ($user->getIsActive() && $user->checkPassword($password))
          {
            return array_merge($values, array('user' => $user));
          }
       }
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
  }
}
