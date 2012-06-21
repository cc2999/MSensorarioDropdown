<?php

/**
 * Country -> State -> City 
 */
class SGenericDropDownConfig
{
    public static function Country($state)
    {
        return array(
            'name' => 'Stati',
            'model' => Stato::getStati(),
            /* Do not alter this items */
            'select' => null,
            'action' => 'state',
            'id' => $state,
        );
    }

    public static function State($id, $city)
    {
        return array(
            'name' => 'Regioni',
            'model' => Regione::getRegione($id),
            'error_message' => 'Questo stato non ha regioni',
            /* Do not alter this items */
            'select' => -1,
            'action' => 'city',
            'id' => $city,
        );
    }

    public static function City($id)
    {
        return array(
            'name' => 'Comuni',
            'model' => Comune::getComune($id),
            'error_message' => 'Questa regione non ha comuni',
            /* Do not alter this items */
            'select' => -1,
        );
    }

}
