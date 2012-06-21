<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStati()
    {
        SensorarioGenericDropDown::create(SensorarioGenericDropDownConfig::LeftConfig());
    }

    public function actionRegioni($stato_id)
    {
        SensorarioGenericDropDown::createDinamic(SensorarioGenericDropDownConfig::CenterConfig(Regione::getRegione($stato_id)));
    }

    public function actionComuni($regione_id)
    {
        SensorarioGenericDropDown::createDinamic(SensorarioGenericDropDownConfig::RightConfig(Comune::getComune($regione_id)));
    }

}