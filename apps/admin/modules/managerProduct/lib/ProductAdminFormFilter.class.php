<?php

/**
 * Product filter form.
 *
 * @package    source
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductAdminFormFilter extends BaseProductFormFilter
{
    public function configure()
    {
        $this->useFields(array('name','status','category_list'));
        $this->widgetSchema['name'] = new sfWidgetFormInputText();
        $this->validatorSchema['name'] = new sfValidatorString(array(
            'trim' => true,
            'required' => false
        ));

        $isActiveArr = array('' => 'Tất cả') + ProductStatus::getArr();
        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
            'choices' => $isActiveArr
        ));
        $this->validatorSchema['status'] = new sfValidatorChoice(array(
            'required' => false,
            'choices' => array_keys($isActiveArr)
        ));

        $this->widgetSchema->setLabels(array(
            'name' => 'Tên sản phẩm',
            'status' => 'Trạng thái',
            'category_list' => 'Thuộc danh mục',
        ));
    }

    public function doBuildQuery(array $values)
    {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        if(isset($values['category_list']) && count($values['category_list'])) {
            $query->innerJoin($alias . '.ProductCategory pc')
                ->andWhereIn('pc.category_id', $values['category_list']);
        }
        if(isset($values['name']) && $values['name'] != '')
            $query->andWhere('name like ?', '%'.VtHelper::translateQuery($values['name']).'%');
        if(isset($values['status']) && $values['status'] != '')
            $query->andWhere('status = ?', $values['status']);
        return $query->orderBy($alias.'.priority');
    }
}
