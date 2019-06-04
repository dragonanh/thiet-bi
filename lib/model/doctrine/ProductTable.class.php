<?php

/**
 * ProductTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProductTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProductTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Product');
    }

    public static function getListProductActiveQuery(){
      return self::getInstance()->createQuery()
        ->where('status = ?', ProductStatus::ACTIVE);
    }

    public static function getListProductByCategoryQuery($categoryId, $limit = null, $productIdIgnore = null){
      $query = self::getInstance()->createQuery('p')
        ->innerJoin('p.ProductCategory c')
        ->where('p.status = ?', ProductStatus::ACTIVE)
        ->orderBy('p.priority');
      if($limit)
        $query->andWhere($limit);

      if(!is_array($categoryId)){
        $query->andWhere('c.category_id = ?', $categoryId);
      }else{
        $query->andWhereIn('c.category_id', $categoryId);
      }

      if($productIdIgnore)
        $query->andWhere('c.product_id <> ?', $productIdIgnore);

      return $query;
    }

    public static function getListProductByCategory($categoryId, $limit = null, $productIdIgnore = null){
      return self::getListProductByCategoryQuery($categoryId, $limit, $productIdIgnore)
        ->fetchArray();
    }

    public static function getListNewestProduct($limit = null){
      $query = self::getInstance()->createQuery('p')
        ->andWhere('p.status = ?', ProductStatus::ACTIVE)
        ->orderBy('p.created_at desc');
      if($limit)
        $query->limit($limit);

      return $query->fetchArray();
    }

    public static function getProductBySlug($slug){
      return self::getListProductActiveQuery()
        ->andWhere('slug = ?', $slug)
        ->fetchOne();
    }

    public static function searchProduct($params){
      $query = self::getListProductActiveQuery();
      if($params['kw']){
        $query->andWhere('(name like ? Or description like ?)', array('%'.$params['kw'].'%', '%'.$params['kw'].'%'));
      }
      return $query;
    }

    public static function getProductById($productId){
      return self::getListProductActiveQuery()
        ->andWhere('id = ?', $productId)
        ->fetchOne();
    }
}