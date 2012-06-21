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
    public static function create($country, $state, $city, $params = array())
    {
        $params['htmlOptions'] = array();

        if (isset($params['action'])) {
            $url = (Yii::app()->createUrl('MSensorarioDropdown/default/' . $params['action'], array(
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                    )));
            $params['htmlOptions'] = array('onchange' => '
                $.ajax({
                    url: "' . $url . '/fk/"+this.value,
                    success: function (data) {
                        $("#' . $params['id'] . '").html(data);
                    }
                })');
        }

        echo CHtml::dropDownList($params['name'], $params['select'], $params['model'], $params['htmlOptions']);
    }

    public static function createDinamic($country, $state, $city, $params = array())
    {
        if (count($params['model']) === 0) {
            echo $params['error_message'];
        } else {
            SGenericDropDown::create($country, $state, $city, $params);
        }
    }

}
