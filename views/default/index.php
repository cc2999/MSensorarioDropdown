---
<?php Yii::app()->getClientScript()->registerScript('drop', '$.ajax({
        url: "' . (Yii::app()->createUrl('MSensorarioDropdown/default/stati')) . '",
        success: function (data) {
            $("#stati").html(data);
        }
    })'); ?>

<div  class="box">
    <span id="stati"></span>
    <span id="regioni"></span>
    <span id="comuni"></span>
</div>
---