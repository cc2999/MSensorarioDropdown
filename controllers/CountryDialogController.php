<?php

class CountryDialogController extends Controller
{
    public function actionList()
    {
        $criteria = array('order' => 'name');
        echo '<ul>';
        foreach (Country::model()->findAll($criteria) as $item) {
            echo '<li>' . $item['name'] . '</li>';
        }
        echo '</ul>';
    }

    public function actionAdd()
    {
        $country = new Country;
        $country->name = $_POST['Country']['name'];
        $country->save();
    }

}