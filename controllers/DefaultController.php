<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStati()
    {
        SensorarioGenericDropDown::create(array(
            'name' => 'Stati',
            'select' => null,
            'model' => Stato::getStati(),
            'action' => 'regioni',
            'fk' => 'stato_id',
            'id' => 'regioni',
        ));
    }

    public function actionRegioni($stato_id)
    {
        SensorarioGenericDropDown::createDinamic(array(
            'model' => Regione::getRegione($stato_id),
            'error_message' => 'Questo stato non ha regioni',
            'name' => 'Regioni',
            'select' => -1,
            'action' => 'comuni',
            'fk' => 'regione_id',
            'id' => 'comuni',
        ));
    }

    public function actionComuni($regione_id)
    {
        SensorarioGenericDropDown::createDinamic(array(
            'model' => Comune::getComune($regione_id),
            'error_message' => 'Questa regione non ha comuni',
            'name' => 'Comuni',
            'select' => -1,
            'htmlOptions' => array(
                'onchange' => 'console.log("Comune: " + this.value);'
            )
        ));
    }

}