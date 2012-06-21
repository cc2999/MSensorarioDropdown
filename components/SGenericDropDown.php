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
class SGenericDropDown
{
    public static function create($params = array())
    {
        $params['htmlOptions'] = array();
        
        if (isset($params['action'])) {
            $params['htmlOptions'] = array('onchange' => '
            $.ajax({
                url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/' . $params['action'])) . '/' . $params['fk'] . '/"+this.value,
                success: function (data) {
                    $("#' . $params['id'] . '").html(data);
                }
            })');
        }

        echo CHtml::dropDownList($params['name'], $params['select'], $params['model'], $params['htmlOptions']);
    }

    public static function createDinamic($params = array())
    {
        if (count($params['model']) === 0) {
            echo $params['error_message'];
        } else {
            SGenericDropDown::create($params);
        }
    }

}
