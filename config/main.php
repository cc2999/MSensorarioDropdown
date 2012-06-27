<?php

return array(
    'defaultConfiguration' => 'default',
    'configurations' => array(
        'default' => array(
            'Country' => array(
                'id' => 'country',
                'name' => 'Countries',
                'model' => 'Country::getCountries();',
            ),
            'State' => array(
                'id' => 'state',
                'name' => 'States',
                'model' => 'State::getStates($id);',
                'message' => 'This country has no states',
            ),
            'City' => array(
                'id' => 'city',
                'name' => 'Cities',
                'model' => 'City::getCities($id);',
                'message' => 'This state has no cities',
            ),
        ),
    ),
);