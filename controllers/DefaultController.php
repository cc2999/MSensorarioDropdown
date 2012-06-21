<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionCountry()
    {
        $config = SGenericDropDownConfig::Country();
        SGenericDropDown::create($config);
    }

    public function actionState($fk)
    {
        $config = SGenericDropDownConfig::State($fk);
        SGenericDropDown::createDinamic($config);
    }

    public function actionCity($fk)
    {
        $config = SGenericDropDownConfig::City($fk);
        SGenericDropDown::createDinamic($config);
    }

}