<?php

class SGenericDropDownConfig
{
    public static function CenterConfig($model)
    {
        return array(
            'model' => $model,
            'error_message' => 'Questo stato non ha regioni',
            'name' => 'Regioni',
            'select' => -1,
            'action' => 'comuni',
            'fk' => 'regione_id',
            'id' => 'comuni',
        );
    }

    public function RightConfig($model)
    {
        return array(
            'model' => $model,
            'error_message' => 'Questa regione non ha comuni',
            'name' => 'Comuni',
            'select' => -1,
            'htmlOptions' => array(
                'onchange' => 'console.log("Comune: " + this.value);'
            )
        );
    }

    public static function LeftConfig()
    {
        return array(
            'name' => 'Stati',
            'select' => null,
            'model' => Stato::getStati(),
            'action' => 'regioni',
            'fk' => 'stato_id',
            'id' => 'regioni',
        );
    }

}
