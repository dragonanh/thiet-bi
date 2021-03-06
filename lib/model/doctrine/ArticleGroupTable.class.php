<?php

/**
 * ArticleGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArticleGroupTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArticleGroupTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArticleGroup');
    }

    public static function getListGroupArticleByPositionQuery($positionId){
      return self::getInstance()->createQuery('g')
        ->innerJoin('g.Article a')
        ->where('g.is_active = 1')
        ->andWhere('a.status = 1')
        ->andWhere('FIND_IN_SET(?,position)', $positionId);
    }

  public static function getListGroupArticleByPosition($positionId, $limit = null){
    $query = self::getListGroupArticleByPositionQuery($positionId);
    if($limit)
      $query->limit($limit);

    return $query->execute();
  }
}