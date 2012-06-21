<?php

class ESensorarioDropdown extends CWidget
{
    public $country = 'stati';
    public $state = 'regioni';
    public $city = 'comuni';

    public function init()
    {
        parent::init();
        Yii::app()->getClientScript()->registerScript('drop', '$.ajax({
            url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/country', array(
                    'country' => $this->country,
                    'state' => $this->state,
                    'city' => $this->city,
                ))) . '",
            success: function (data) {
                $("#' . $this->country . '").html(data);
            }
        })');
    }

    public function run()
    {
        parent::run();
        echo '
        <div  class="box">
            <span id="' . $this->country . '"></span>
            <span id="' . $this->state . '"></span>
            <span id="' . $this->city . '"></span>
        </div>';
    }

}