<?php

/**
 * Country -> State -> City 
 */
class SGenericDropDownConfig
{
    public static function Country()
    {
        return array(
            'name' => 'Stati',
            'select' => null,
            'model' => Stato::getStati(),
            'action' => 'state',
            'id' => 'regioni',
        );
    }

    public static function State($id)
    {
        return array(
            'model' => Regione::getRegione($id),
            'error_message' => 'Questo stato non ha regioni',
            'name' => 'Regioni',
            'select' => -1,
            'action' => 'city',
            'id' => 'comuni',
        );
    }

    public static function City($id)
    {
        return array(
            'model' => Comune::getComune($id),
            'error_message' => 'Questa regione non ha comuni',
            'name' => 'Comuni',
            'select' => -1
        );
    }

}
