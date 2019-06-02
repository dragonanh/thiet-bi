<?php

class sfWidgetFormCKEditor extends sfWidgetFormTextarea {
  
  protected $_editor;
  protected $_finder;
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $attributes['id'] = $this->generateId($name, $value);
    return parent::render($name, $value, $attributes, $errors).$this->initCKEditor($attributes['id']);

  }

  public function initCKEditor($id, $width = 800, $height = 200){
    return "<script>
              if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
                CKEDITOR.tools.enableHtml5Elements( document );
              
              // The trick to keep the editor in the sample quite small
              // unless user specified own height.
              CKEDITOR.config.height = ".$height.";
              CKEDITOR.config.width = '".$width."';
              
              var initSample = ( function() {
                var wysiwygareaAvailable = isWysiwygareaAvailable();
              
                return function() {
                  var editorElement = CKEDITOR.document.getById( '".$id."' );
              
                  // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
                  if ( wysiwygareaAvailable ) {
                    CKEDITOR.replace( '".$id."' );
                  } else {
                    editorElement.setAttribute( 'contenteditable', 'true' );
                    CKEDITOR.inline( '".$id."' );
              
                  }
                };
              
                function isWysiwygareaAvailable() {
                  // If in development mode, then the wysiwygarea must be available.
                  // Split REV into two strings so builder does not replace it :D.
                  if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
                    return true;
                  }
              
                  return !!CKEDITOR.plugins.get( 'wysiwygarea' );
                }
              } )();
              
              initSample();
              </script>";
  }
}