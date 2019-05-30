<?php

/**
 * Product form.
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductAdminForm extends BaseProductForm
{
  public function configure()
  {
      $this->useFields(array('name','image_path','price','description','content','status','category_list'));
      $this->widgetSchema['name'] = new sfWidgetFormInputText();
      $this->validatorSchema['name'] = new sfValidatorString(array(
          'trim' => true,
          'required' => true,
          'max_length' => 255
      ));

      $this->validatorSchema['price'] = new sfValidatorInteger(array(
          'trim' => true,
          'required' => true,
          'min' => 1000,
          'max' => 99999999
      ), array(
        'required' => 'Bắt buộc',
        'min' => 'Giá phải trong khoảng từ 1.000đ đến 99.999.999đ',
        'max' => 'Giá phải trong khoảng từ 1.000đ đến 99.999.999đ',
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

      $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array(
          'jsoptions' => array('width' => '800px','height' => '200px')
      ));
      $this->validatorSchema['content'] = new sfValidatorString(array(
          'trim' => true,
          'required' => true
      ), array(
          'required' => 'Bắt buộc',
      ));

      $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(),array(
          'style' => 'width:800px'
      ));
      $this->validatorSchema['description'] = new sfValidatorString(array(
          'required' => true,
          'max_length' => 500,
          'trim' => true
      ));

      $isActiveArr = array('' => 'Tất cả') + ProductStatus::getArr();
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
          'choices' => $isActiveArr
      ));
      $this->validatorSchema['status'] = new sfValidatorChoice(array(
          'required' => false,
          'choices' => array_keys($isActiveArr)
      ));

      $this->widgetSchema['category_list'] = new sfWidgetFormDoctrineChoice(array(
          'multiple' => true,
          'expanded' => true,
          'model' => 'Category',
          'order_by' => array('name', 'asc'),
      ));

      $this->validatorSchema['category_list'] = new sfValidatorDoctrineChoice(array(
          'multiple' => true, 'model' => 'Category', 'required' => false
      ));

      $this->widgetSchema->setLabels(array(
          'name' => 'Tên sản phẩm',
          'status' => 'Trạng thái',
          'category_list' => 'Thuộc danh mục',
          'content' => 'Nội dung chi tiết',
          'image_path' => 'Ảnh đại diện',
          'price' => 'Giá',
      ));
  }
}
