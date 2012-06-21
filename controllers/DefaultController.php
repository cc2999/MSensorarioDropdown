<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStati()
    {
        $config = SensorarioGenericDropDownConfig::LeftConfig();
        SensorarioGenericDropDown::create($config);
    }

    public function actionRegioni($stato_id)
    {
        $model = Regione::getRegione($stato_id);
        $config = SensorarioGenericDropDownConfig::CenterConfig($model);
        SensorarioGenericDropDown::createDinamic($config);
    }

    public function actionComuni($regione_id)
    {
        $model = Comune::getComune($regione_id);
        $config = SensorarioGenericDropDownConfig::RightConfig($model);
        SensorarioGenericDropDown::createDinamic($config);
    }

}