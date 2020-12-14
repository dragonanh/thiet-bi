<?php use_helper('Url'); ?>
<!-- stylesheets -->
<?php use_stylesheet(sfConfig::get('app_tmcTwitterBootstrapPlugin_bootstrap_path',public_path(sfConfig::get("app_domain_web_root").'/tmcTwitterBootstrapPlugin/css/bootstrap.min.css')), 'first') ?>
<?php use_stylesheet(sfConfig::get('app_tmcTwitterBootstrapPlugin_responsive_bootstrap_path',public_path(sfConfig::get("app_domain_web_root").'/tmcTwitterBootstrapPlugin/css/bootstrap-responsive.min.css')), 'first') ?>
<?php use_stylesheet(sfConfig::get('app_tmcTwitterBootstrapPlugin_admin_styles_path',public_path(sfConfig::get("app_domain_web_root").'/tmcTwitterBootstrapPlugin/css/styles.css')), 'first') ?>

<!-- javascripts -->
<?php use_javascript(sfConfig::get('app_tmcTwitterBootstrapPlugin_jquery_path',public_path(sfConfig::get("app_domain_web_root").'/tmcTwitterBootstrapPlugin/js/jquery.min.js')),'first') ?>
<?php use_javascript(sfConfig::get('app_tmcTwitterBootstrapPlugin_bootstrap_js_path',public_path(sfConfig::get("app_domain_web_root").'/tmcTwitterBootstrapPlugin/js/bootstrap.min.js'))) ?>
<?php use_javascript(sfConfig::get('app_tmcTwitterBootstrapPlugin_admin_js_path',public_path(sfConfig::get("app_domain_web_root").'/tmcTwitterBootstrapPlugin/js/global.js')), 'last') ?>
