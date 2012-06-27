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

    private function plusButton($dialogId, $visible = false)
    {
        $this->addDialog($dialogId);

        return '
            <span id="country-plus-box" style="visibility: '.($visible === true ? 'visible' : 'hidden').';">
                <span id="country-plus"> [' .
                    CHtml::link('+', '#', array(
                        'onclick' => '$("#country-dialog").dialog("open"); 
                                    return false;',
                    )) . ']
                </span>
            </span>';
    }

    private function addDialog($dialogId)
    {
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => $dialogId,
            'options' => array(
                'title' => 'Add Country',
                'autoOpen' => false,
                'modal' => true,
            ),
        ));
        echo 'ciao mondo';
        $this->endWidget('zii.widgets.jui.CJuiDialog');
    }

    public function run()
    {
        parent::run();

        /* Three dropdowns */
        echo '
        <div  class="box">
        
            <span id="' . $this->config['Country']['id'] . '"></span>
            ' . ($this->plusButton('country-dialog', true)) . '
            
            <span id="' . $this->config['State']['id'] . '"></span>
            ' . ($this->plusButton('state-dialog', false)) . '
            
            <span id="' . $this->config['City']['id'] . '"></span>
            ' . ($this->plusButton('city-dialog', false)) . '
            
        </div>';
    }

}