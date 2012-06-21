<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStati()
    {
        $config = SGenericDropDownConfig::LeftConfig();
        SGenericDropDown::create($config);
    }

    public function actionRegioni($stato_id)
    {
        $model = Regione::getRegione($stato_id);
        $config = SGenericDropDownConfig::CenterConfig($model);
        SGenericDropDown::createDinamic($config);
    }

    public function actionComuni($regione_id)
    {
        $model = Comune::getComune($regione_id);
        $config = SGenericDropDownConfig::RightConfig($model);
        SGenericDropDown::createDinamic($config);
    }

}