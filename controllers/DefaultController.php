<?php

class DefaultController extends Controller
{
    public function actionCountry($country, $state, $city, $configuration)
    {
        $config = SGenericDropDownConfig::Country($state, array(), $configuration);
        SGenericDropDown::create($country, $state, $city, $config, $configuration);
    }

    public function actionState($country, $state, $city, $configuration, $fk)
    {
        $config = SGenericDropDownConfig::State($fk, $city, array(), $configuration);
        SGenericDropDown::createDinamic($country, $state, $city, $config, $configuration);
    }

    public function actionCity($country, $state, $city, $configuration, $fk)
    {
        $config = SGenericDropDownConfig::City($fk, array(), $configuration);
        SGenericDropDown::createDinamic($country, $state, $city, $config, $configuration);
    }

}