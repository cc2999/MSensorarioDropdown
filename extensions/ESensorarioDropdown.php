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

        /* Modal window */
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'country-dialog',
            'options' => array(
                'title' => 'Add Country',
                'autoOpen' => false,
                'modal' => true,
            ),
        ));
        echo 'ciao mondo';
        $this->endWidget('zii.widgets.jui.CJuiDialog');

        /* Three dropdowns */
        echo '
        <div  class="box">
            <div id="country-box">
                <span id="' . $this->config['Country']['id'] . '"></span>
                <span id="country-plus"> [' . 
                    CHtml::link('+', '#', array(
                        'onclick' => '$("#country-dialog").dialog("open"); 
                            return false;',
                    )) . ']
                </span>
            </div>
            <span id="' . $this->config['State']['id'] . '"></span>
            <span id="' . $this->config['City']['id'] . '"></span>
        </div>';
    }

}