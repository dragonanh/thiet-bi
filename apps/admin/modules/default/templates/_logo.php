<?php echo link_to(image_tag(sfConfig::get('app_sfGuardPlugin_login_logo_src', '/images/data/cms.jpg'), 'alt_title='.__(sfConfig::get('app_sfGuardPlugin_login_logo_title'), null, 'sfGuardPlugin').' size='.sfConfig::get('app_sfGuardPlugin_login_logo_size', '200x200')), '@homepage') ?>
<?php if (sfConfig::get('app_sfGuardPlugin_login_show_title', false)): ?>
  <h2><?php echo __(sfConfig::get('app_sfGuardPlugin_login_logo_title'), null, 'tmcTwitterBootstrapPlugin') ?></h2>
<?php endif ?>