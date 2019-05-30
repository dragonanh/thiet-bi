<?php

/**
 * Article form base class.
 *
 * @method Article getObject() Returns the current form's model object
 *
 * @package    source
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'title'            => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'content'          => new sfWidgetFormTextarea(),
      'image_path'       => new sfWidgetFormInputText(),
      'status'           => new sfWidgetFormInputText(),
      'group_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleGroup'), 'add_empty' => true)),
      'meta_title'       => new sfWidgetFormInputText(),
      'meta_keyword'     => new sfWidgetFormInputText(),
      'meta_description' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'slug'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'      => new sfValidatorString(array('required' => false)),
      'content'          => new sfValidatorString(),
      'image_path'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'           => new sfValidatorInteger(array('required' => false)),
      'group_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ArticleGroup'), 'required' => false)),
      'meta_title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_keyword'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Article', 'column' => array('slug', 'title')))
    );

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

}
