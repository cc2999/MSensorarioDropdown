<?php

require dirname(__FILE__) . '/../helpers/ESConfig.php';

class SGenericDropDownConfig extends ESConfig
{
    public static function Country($state, $model = array(), $configuration)
    {
        $config = SGenericDropDownConfig::getConfig($configuration);

        eval('$model = ' . $config['Country']['model']);

        return array(
            'name' => $config['Country']['name'],
            'model' => $model,
            /* Do not alter this items */
            'select' => null,
            'action' => 'state',
            'id' => $state,
        );
    }

    public static function State($id = null, $city = 'city', $model = array(), $configuration = array())
    {
        $id = $id;
        
        $config = SGenericDropDownConfig::getConfig($configuration);
        
        eval('$model = ' . $config['State']['model'] . ';');
        
        return array(
            'name' => $config['State']['name'],
            'model' => $model,
            'error_message' => $config['State']['message'],
            /* Do not alter this items */
            'select' => -1,
            'action' => 'city',
            'id' => $city,
        );
    }

    public static function City($id = null, $model = array(), $configuration)
    {
        $config = SGenericDropDownConfig::getConfig($configuration);

        eval('$model = ' . $config['City']['model']);

        return array(
            'name' => $config['City']['name'],
            'model' => $model,
            'error_message' => $config['City']['message'],
            /* Do not alter this items */
            'select' => -1,
        );
    }

}
