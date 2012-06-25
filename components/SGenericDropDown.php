<?php

class SGenericDropDown
{
    public static function create($country, $state, $city, $params = array(), $configuration)
    {
        $params['htmlOptions'] = array();

        if (isset($params['action'])) {

            $url = (Yii::app()->createUrl('MSensorarioDropdown/default/' . $params['action'], array(
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                        'configuration' => $configuration,
                    )));

            $fk = Yii::app()->getUrlManager()->getUrlFormat() === 'path' ?
                    '/fk/' :
                    '&fk=';

            $params['htmlOptions'] = array('onchange' => '
                $.ajax({
                    url: "' . $url . $fk . '"+this.value,
                    success: function (data) {
                        $("#' . $params['id'] . '").html(data);
                    }
                })');
        }

        echo CHtml::dropDownList($params['name'], $params['select'], $params['model'], $params['htmlOptions']);
    }

    public static function createDinamic($country, $state, $city, $params = array(), $configuration)
    {
        if (count($params['model']) === 1) {
            echo $params['error_message'];
        } else {
            SGenericDropDown::create($country, $state, $city, $params, $configuration);
        }
    }

}
