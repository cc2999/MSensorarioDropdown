<?php
require dirname(__FILE__) . '/../helpers/ESConfig.php';
require dirname(__FILE__) . '/../models/Country.php';
require dirname(__FILE__) . '/../models/State.php';
require dirname(__FILE__) . '/../models/City.php';

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

    private function plusButton($dialogId, $model, $visible = false)
    {
        $this->addDialog($dialogId, $model);

        return '
            <span class="plus-box" style="visibility: ' . ($visible === true ? 'visible' : 'hidden') . ';">
                <span class="button-plus"> [' .
                CHtml::link('+', '#', array(
                    'onclick' => '$("#' . ($dialogId) . '").dialog("open"); 
                                    return false;',
                )) . ']
                </span>
            </span>';
    }

    private function addDialog($dialogId, $model)
    {
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => $dialogId,
            'options' => array(
                'title' => 'Add Item',
                'autoOpen' => false,
                'modal' => true,
            ),
        ));
        ?>
        <div class="form">
            <?php echo CHtml::beginForm(); ?>
            <?php echo CHtml::errorSummary($model); ?>
            <div class="row">
                <?php echo CHtml::activeLabel($model, 'name'); ?>
                <?php echo CHtml::activeTextField($model, 'name') ?>
            </div>
            <div class="row submit">
                <?php $url = Yii::app()->createUrl('MSensorarioDropdown/' . ($dialogId) . '/add'); ?>
                <?php
                echo CHtml::ajaxSubmitButton('Save', $url, array(
                'success' => 'function(){
                        $.ajax({
                            url: "'.Yii::app()->createUrl('MSensorarioDropdown/' . ($dialogId) . '/list').'",
                            success: function (data) {
                                $("#MSensorarioDropdown_'. $dialogId .'_list").html(data);
                            }
                        });
                    }'
                ));
                ?>
            </div>
                    <?php echo CHtml::endForm(); ?>
            <div id="MSensorarioDropdown_<?php echo $dialogId; ?>_list">
                <ul>
                    <?php $criteria = array('order' => 'name'); ?>
                    <?php foreach ($model->findAll($criteria) as $item) : ?>
                        <li><?php echo $item['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
        $this->endWidget('zii.widgets.jui.CJuiDialog');
    }

    public function run()
    {
        parent::run();

        /* Three dropdowns */
        echo '
        <div  class="box">
        
            <span id="' . $this->config['Country']['id'] . '"></span>
            ' . ($this->plusButton('countryDialog', new Country, true)) . '
            
            <span id="' . $this->config['State']['id'] . '"></span>
            ' . ($this->plusButton('state-dialog', new State, false)) . '
            
            <span id="' . $this->config['City']['id'] . '"></span>
            ' . ($this->plusButton('city-dialog', new City, false)) . '
            
        </div>';
    }

}