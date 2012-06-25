<?php

require dirname(__FILE__) . '/../helpers/ESConfig.php';

class ESensorarioDropdown extends ESConfig
{
    public $configOption = 'default';
    private $config;

    public function init()
    {
        parent::init();

        $this->config = ESensorarioDropdown::getConfig($this->configOption);

        Yii::app()->getClientScript()->registerScript('drop', '$.ajax({
            url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/country', array(
                    'country' => $this->config['Country']['id'],
                    'state' => $this->config['State']['id'],
                    'city' => $this->config['City']['id'],
                    'configuration' => $this->configOption,
                ))) . '",
            success: function (data) {
                $("#' . $this->config['Country']['id'] . '").html(data);
            }
        })');
    }

    public function run()
    {
        parent::run();
        echo '
        <div  class="box">
            <span id="' . $this->config['Country']['id'] . '"></span>
            <span id="' . $this->config['State']['id'] . '"></span>
            <span id="' . $this->config['City']['id'] . '"></span>
        </div>';
    }

}