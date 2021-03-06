<?php

/**
 * BannerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BannerTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BannerTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Banner');
    }

    public static function getBanner($limit = 10){
        $query = self::getInstance()->createQuery()
        ->where('status = 1')
        ->orderBy('priority');
      if($limit)
        $query->limit($limit);
      return $query->fetchArray();
    }
}