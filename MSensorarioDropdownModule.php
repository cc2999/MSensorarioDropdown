<?php

class MSensorarioDropdownModule extends CWebModule
{
    public function init()
    {
        $this->setImport(array(
            'MSensorarioDropdown.models.*',
            'MSensorarioDropdown.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        return parent::beforeControllerAction($controller, $action);
    }

}
