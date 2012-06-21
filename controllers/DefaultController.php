<?php

class DefaultController extends Controller
{

    public function actionCountry($country, $state, $city)
    {
        $config = SGenericDropDownConfig::Country($state);
        SGenericDropDown::create($country, $state, $city, $config);
    }

    public function actionState($country, $state, $city, $fk)
    {
        $config = SGenericDropDownConfig::State($fk, $city);
        SGenericDropDown::createDinamic($country, $state, $city, $config);
    }

    public function actionCity($country, $state, $city, $fk)
    {
        $config = SGenericDropDownConfig::City($fk);
        SGenericDropDown::createDinamic($country, $state, $city, $config);
    }

}