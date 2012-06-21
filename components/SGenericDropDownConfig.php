<?php

/**
 * Country -> State -> City 
 */
class SGenericDropDownConfig
{
    public static function getConfig()
    {
        return require dirname(__FILE__) . '/../config/main.php';
    }

    public static function Country($state, $model = array())
    {
        $config = SGenericDropDownConfig::getConfig();

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

    public static function State($id = null, $city = 'city', $model = array())
    {
        $config = SGenericDropDownConfig::getConfig();

        eval('$model = ' . $config['State']['model']);

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

    public static function City($id = null, $model = array())
    {
        $config = SGenericDropDownConfig::getConfig();

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