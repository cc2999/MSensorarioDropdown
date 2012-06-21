<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStati()
    {
        echo SensorarioGenericDropDown::create(array(
            'name' => 'Stati',
            'select' => null,
            'data' => Stato::getStati(),
            'action' => 'regioni',
            'fk' => 'stato_id',
            'id' => 'regioni',
        ));
    }

    public function actionRegioni($stato_id)
    {
        $regioni = Regione::getRegione($stato_id);
        if (count($regioni) === 0) {
            echo 'Questo stato non ha regioni';
        } else {
            echo SensorarioGenericDropDown::create(array(
                'name' => 'Regioni',
                'select' => -1,
                'data' => $regioni,
                'action' => 'comuni',
                'fk' => 'regione_id',
                'id' => 'comuni',
            ));
        }
    }

    public function actionComuni($regione_id)
    {
        $comuni = Comune::getComune($regione_id);
        if (count($comuni) === 0) {
            echo 'Questa regione non ha comuni';
        } else {
            echo CHtml::dropDownList('Comuni', -1, $comuni, array(
                'onchange' => 'console.log("Comune: " + this.value);'
            ));
        }
    }

}