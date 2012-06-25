<?php

class ESConfig extends CWidget
{
    public static function getConfig($configuration = null)
    {
        $config = require dirname(__FILE__) . '/../config/main.php';
        
        $configuraionName = trim($configuration) === "" ?
                $config['defaultConfiguration'] :
                $configuration;
        
        return $config['configurations'][$configuraionName];
    }

}