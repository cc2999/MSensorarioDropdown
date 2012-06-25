<?php

class ESConfig extends CWidget
{
    public static function getConfig()
    {
        $config = require dirname(__FILE__) . '/../config/main.php';
        return $config['configurations'][$config['defaultConfiguration']];
    }

}