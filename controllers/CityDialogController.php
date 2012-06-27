<?php

class CityDialogController extends Controller
{
    public function actionList()
    {
        $criteria = array('order' => 'name');
        echo '<ul>';
        foreach (City::model()->findAll($criteria) as $item) {
            echo '<li>' . $item['name'] . '</li>';
        }
        echo '</ul>';
    }

    public function actionAdd()
    {
        $country = new City;
        $country->name = $_POST['City']['name'];
        $country->state_id = $_POST['City']['state_id'];
        $country->save();
    }

}