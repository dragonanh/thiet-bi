<?php

/**
 * ArticleTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArticleTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArticleTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Article');
    }

    public static function getArticleByPositionQuery($positionId){
        return self::getInstance()->createQuery('a')
          ->innerJoin('a.ArticleGroup g')
          ->where('g.is_active = 1')
          ->andWhere('a.status = 1')
          ->andWhere('FIND_IN_SET(?,position)', $positionId);
    }

    public static function getListArticleByPosition($positionId, $limit = null){
        $query = self::getArticleByPositionQuery($positionId);
        if($limit)
          $query->limit($limit);

        return $query->execute();
    }

  public static function getListRelateArticle($positionId, $curId){
    return self::getArticleByPositionQuery($positionId)
      ->andWhere('id <> ?', $curId)
      ->orderBy('rand()')
      ->execute();
  }

  public static function getArticleBySlug($slug){
    return self::getInstance()->createQuery()
      ->where('status = 1')
      ->andWhere('slug = ?', $slug)
      ->fetchOne();
  }
}