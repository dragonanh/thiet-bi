<?php

/**
 * PluginSettingTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginSettingTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginSettingTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginSetting');
    }
}