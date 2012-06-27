<?php

class StateDialogController extends Controller
{
    public function actionList()
    {
        $criteria = array('order' => 'name');
        echo '<ul>';
        foreach (State::model()->findAll($criteria) as $item) {
            echo '<li>' . $item['name'] . '</li>';
        }
        echo '</ul>';
    }

    public function actionAdd()
    {
        $country = new State;
        $country->name = $_POST['State']['name'];
        $country->country_id = $_POST['State']['country_id'];
        $country->save();
    }

}