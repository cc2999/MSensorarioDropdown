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

            $config = SGenericDropDownConfig::getConfig($configuration);
            
            $params['htmlOptions'] = array('onchange' => '
                $("#' . $city . '").fadeOut().html("").fadeIn();
                var oggetto = $(this).val();
                $.ajax({
                    url: "' . $url . $fk . '"+this.value,
                    success: function (data) {
                            
                        var json = '.(json_encode($config)).';

                        if("'.$params['id'].'" === "country") {
                            $("#button-plus-stateDialog").fadeIn();
                        }

                        if("'.$params['id'].'" === "state") {
                            $("#country_id").val(oggetto);
                            $("#button-plus-stateDialog").fadeIn();
                        }

                        if("'.$params['id'].'" === "city") {
                            $("#state_id").val(oggetto);
                            $("#button-plus-cityDialog").fadeIn();
                        }
                            
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
