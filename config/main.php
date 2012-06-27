<?php

return array(
    'defaultConfiguration' => 'default',
    'configurations' => array(
        'default' => array(
            'Country' => array(
                'id' => 'country',
                'name' => 'Countries',
                'model' => 'Country::getCountries(array(), $config[\'Country\'][\'label\']);',
                'label' => 'Select a country',
            ),
            'State' => array(
                'id' => 'state',
                'name' => 'States',
                'model' => 'State::getStates($id, array(), $config[\'State\'][\'label\']);',
                'message' => 'This country has no states',
                'label' => 'Select a state',
            ),
            'City' => array(
                'id' => 'city',
                'name' => 'Cities',
                'model' => 'City::getCities($id, array(), $config[\'City\'][\'label\']);',
                'message' => 'This state has no cities',
                'label' => 'Select a city',
            ),
        ),
    ),
);