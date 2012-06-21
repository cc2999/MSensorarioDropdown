<?php

return array(
    'Country' => array(
        'id' => 'stati',
        'name' => 'Stati',
        'model' => 'Stato::getStati();',
    ),
    'State' => array(
        'id' => 'regioni',
        'name' => 'Regioni',
        'model' => 'Regione::getRegione($id);',
        'message' => 'Questa regione non ha comuni',
    ),
    'City' => array(
        'id' => 'comuni',
        'name' => 'Comuni',
        'model' => 'Comune::getComune($id);',
        'message' => 'Questa regione non ha comuni',
    ),
);