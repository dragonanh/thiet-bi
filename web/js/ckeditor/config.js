/*
 Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */
if (typeof(CKEDITOR) != 'undefined') {

        CKEDITOR.editorConfig = function(config)
        {
          config.language = 'vi';
          // config.uiColor = '#AADC6E';

          config.toolbar_Full =
                  [
                    {name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates']},
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    {name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']},
                    {name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField']},
                    '/',
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']},
                    {name: 'links', items: ['Link', 'Unlink', 'Anchor', 'Youtube']},
                    {name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak']},
                    '/',
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'tools', items: ['Maximize', 'ShowBlocks', '-', 'About']}
                  ];
          config.toolbar_2 =
                  [
                    {name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates']},
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    '/',
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']},
                    {name: 'paragraph', items: ['Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']},
                    {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                    {name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule']},
                    '/',
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    {name: 'colors', items: ['TextColor', 'BGColor']}
                  ];
          config.toolbar_Basic =
                  [
                    {name: 'styles', items: ['Styles', 'Format']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat']},
                    {name: 'paragraph', items: ['Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']}
                      //,{name: 'links', items: ['Link', 'Unlink', 'Anchor']}

                  ];
          config.toolbar_Basic2 =
                  [
                    ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About']
                  ];

          config.toolbar_KeengBasic =
                  [
                    ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'],
                    ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
                      '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Link', 'Unlink', 'Anchor'],
                    ['Image', 'Table', 'HorizontalRule'],
                    ['Styles', 'Format', 'Font', 'FontSize'],
                    ['TextColor', 'BGColor'],
                    ['ShowBlocks'],
                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                  ];
          config.toolbar = 'KeengBasic';
          config.toolbar_Keeng =
                  [
                    ['keengsong'],
                    ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'],
                    ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
                      '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Link', 'Unlink', 'Anchor'],
                    ['Image', 'Table', 'HorizontalRule'], '/',
                    ['Styles', 'Format', 'Font', 'FontSize'],
                    ['TextColor', 'BGColor'],
                    ['ShowBlocks'],
                    ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                  ];
//    config.extraPlugins = 'keengimage,keengsong';
          config.extraPlugins = 'keengsong';
          config.forcePasteAsPlainText = true;
          config.toolbar_simple = [];
            config.height = '143px';
            config.width = '100%';
            config.enterMode = CKEDITOR.ENTER_BR;
            config.shiftEnterMode = CKEDITOR.ENTER_BR;
            config.autoParagraph = false;
        };

}
