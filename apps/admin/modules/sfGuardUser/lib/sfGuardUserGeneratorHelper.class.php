<?php

/**
 * sfGuardUser module helper.
 *
 * @package    mobiletv
 * @subpackage sfGuardUser
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserGeneratorHelper extends BaseSfGuardUserGeneratorHelper
{
  public function linkToAdd($params)
  {
      return link_to('<i class="icon-plus icon-white"></i> '.__($params['label'], array(), 'tmcTwitterBootstrapPlugin'), '@'.$this->getUrlForAction('new'), array('class' => 'btn btn-success'));
  }
}
