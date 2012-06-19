<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStati()
    {
        echo CHtml::dropDownList('Stati', null, Stato::getStati(), array(
            'onchange' => '$.ajax({
                url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/regioni')) . '/stato_id/"+this.value,
                success: function (data) {
                    $("#regioni").html(data);
                }
            })'
        ));
    }

    public function actionRegioni($stato_id)
    {
        $regioni = Regione::getRegione($stato_id);
        if (count($regioni) === 0) {
            echo 'Questo stato non ha regioni';
        } else {
            echo CHtml::dropDownList('Regioni', -1, $regioni, array(
                'onchange' => '$.ajax({
                    url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/comuni')) . '/regione_id/"+this.value,
                    success: function (data) {
                        $("#comuni").html(data);
                    }
                })'
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