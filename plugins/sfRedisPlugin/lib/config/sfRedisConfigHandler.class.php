<?php

/**
 * sfRedisConfigHandler
 *
 * @uses      sfYamlConfigHandler
 * @package   sfRedisPlugin
 * @author    Benjamin VIELLARD <bicou@bicou.com>
 * @license   The MIT License
 * @version   SVN: $Id: sfRedisConfigHandler.class.php 28813 2010-03-26 19:47:10Z bicou $
 */
class sfRedisConfigHandler extends sfYamlConfigHandler
{
  /**
   * Executes this configuration handler.
   *
   * @param array $configFiles An array of absolute filesystem path to a configuration file
   *
   * @return string Data to be written to a cache file
   */
  public function execute($configFiles)
  {
    $config = self::getConfiguration($configFiles);

    // compile data
    $retval = "<?php\n".
              "// auto-generated by %s\n".
              "// date: %s\nreturn %s;\n";
    $retval = sprintf($retval, __CLASS__, date('Y/m/d H:i:s'), var_export($config, true));

    return $retval;
  }

  /**
   * @see sfConfigHandler
   */
  static public function getConfiguration(array $configFiles)
  {
    return self::replaceConstants(self::flattenConfigurationWithEnvironment(self::parseYamls($configFiles)));
  }
}

