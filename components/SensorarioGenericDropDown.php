<?php

/**
 * This component permit to create a dropDownList with an array as
 * configuration.
 * 
 * SensorarioGenericDropDown::create(array(
            'name' => 'Stati',
            'select' => null,
            'data' => Stato::getStati(),
            'action' => 'regioni',
            'fk' => 'stato_id',
            'id' => 'regioni',
        )) 
 */
class SensorarioGenericDropDown
{
    public static function create($params = array())
    {
        return CHtml::dropDownList($params['name'], $params['select'], $params['data'], array('onchange' => '
            $.ajax({
                url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/' . $params['action'])) . '/' . $params['fk'] . '/"+this.value,
                success: function (data) {
                    $("#' . $params['id'] . '").html(data);
                }
            })'));
    }

}
