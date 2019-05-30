<?php

class sfWidgetCaptchaGD extends sfWidgetForm {

    protected function configure($options = array(), $attributes = array()) {
        
    }

    public function render($name, $value = null, $attributes = array(), $errors = array()) {

        $namespace = isset($attributes['namespace']) ? $attributes['namespace'] : 'default';
        sfContext::getInstance()->getConfiguration()->loadHelpers('Asset', 'Url', 'I18n');

        $img_src = sfContext::getInstance()->getRouting()->generate("sf_captchagd") . '?sid=' . md5(rand());


        $html = $this->renderTag('input', array_merge(
                                array(
                    'type' => 'text',
                    'name' => $name, 'value' => $value), $attributes)) .
                "<a href='' onClick='return false' title='" . __("Reload image") . "'>
        <img src='$img_src&amp;namespace=$namespace' onClick='this.src=\"$img_src?r=\" + Math.random() + \"&amp;reload=1\"+ \"&amp;namespace=$namespace\"' border='0' class='captcha' />
      </a>";

        return $html;
    }

}
