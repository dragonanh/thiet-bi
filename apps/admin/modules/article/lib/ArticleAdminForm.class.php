<?php

/**
 * Article form.
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleAdminForm extends BaseArticleForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'],$this['slug']);
    $this->validatorSchema['title']->setOption('required', true);

    $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(),array(
      'style' => 'width:320px'
    ));
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor();
    $this->validatorSchema['content'] = new sfValidatorString(array(
      'trim' => true,
      'required' => true
    ), array(
      'required' => 'Bắt buộc',
    ));

    $this->widgetSchema['image_path'] = new sfWidgetFormInputFileEditable(array(
        'edit_mode' => !$this->isNew(),
        'with_delete' => false,
        'file_src' => $this->getObject()->getImagePath(),
        'is_image' => true,
        'template' => $this->isNew() ? "%input%" : "<div>%input%<br /><img style='width:150px; height: auto;' src='" . $this->getObject()->getImagePath() . "' ></div>"
      )
    );

    $maxSize = sfConfig::get('app_max_image_upload',2)*1024*1024;
    $i18n = sfContext::getInstance()->getI18N();
    $this->validatorSchema['image_path'] = new sfValidatorFileViettel(array(
        'required' => false,
        'path' =>  sfConfig::get('sf_web_dir').sfConfig::get('app_upload_images',"/uploads/images/")."/article/",
        'prefix_path' => sfConfig::get('app_upload_images',"/uploads/images/")."/article/", # duong dan se luu vao DB: /uploads/users/image1.jpg
        'mime_types' => array('image/jpeg','image/png','image/gif'),
        'extensions' => array('jpg', 'jpeg', 'png'),
        'max_size' => $maxSize,
      ), array('invalid' => 'Ảnh của bạn không đúng định dạng hỗ trợ.',
        'max_size' => $i18n->__('File ảnh không được vượt quá %1%Mb', array('%1%' => $maxSize)),
        'mime_types' => 'File upload phải có định dạng .jpeg, .jpg và .png ')
    );

    $statusArr = array(0 => 'Không hiển thị', 1 => 'Hiển thị');
    $this->widgetSchema['status'] =  new sfWidgetFormChoice(array(
      'choices' => $statusArr
    ));
    $this->validatorSchema['status'] = new sfValidatorChoice(array(
      'required' => true,
      'choices' => array_keys($statusArr)
    ));

    $this->widgetSchema['group_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleGroup'), 'add_empty' => '-- Chọn nhóm tin --'));
    $this->validatorSchema['group_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleGroup'), 'required' => true));

    $this->widgetSchema->setLabels(array(
      'title' => 'Tiêu đề',
      'description' => 'Mô tả ngắn',
      'content' => 'Nội dung',
      'image_path' => 'Ảnh đại diện',
      'status' => 'Trạng thái',
      'group_id' => 'Nhóm tin',
    ));
  }
}
