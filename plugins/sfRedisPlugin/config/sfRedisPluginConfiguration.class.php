<?php

/**
 * sfRedisPlugin configuration.
 *
 * @package     sfRedisPlugin
 * @subpackage  config
 * @uses        sfPluginConfiguration
 * @author      Benjamin VIELLARD <bicou@bicou.com>
 * @license     The MIT License
 * @version     SVN: $Id: sfRedisPluginConfiguration.class.php 30560 2010-08-06 08:33:47Z bicou $
 */
class sfRedisPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.2';

  /**
   * path to config
   *
   * @var string
   */
  const CONFIG_PATH = 'config/redis.yml';

  /**
   * initialize plugin
   *
   * @access public
   * @return void
   */
  public function initialize()
  {
    if ($this->configuration instanceof sfApplicationConfiguration)
    {
      $configCache = $this->configuration->getConfigCache();
      $configCache->registerConfigHandler(self::CONFIG_PATH, 'sfRedisConfigHandler');
      $config = include $configCache->checkConfig(self::CONFIG_PATH);
    }
    else
    {
      $configPaths = $this->configuration->getConfigPaths(self::CONFIG_PATH);
      $config = sfRedisConfigHandler::getConfiguration($configPaths);
    }

    sfRedis::initialize($config);
  }
}

