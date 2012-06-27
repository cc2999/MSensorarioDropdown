MSensorarioDropdown
===================

A module to build dependents dropdown

Requirement
===========

Be shure to have 'urlFormat'=>'path' enabled in your config file

    'components'=>array(
        'urlManager'=>array(
            'urlFormat'=>'path',
        ),
    ),

Install
=======

Move in your /protected/modules folder. If not exists, create it. And now clone 
the repository on your project:

    $ git clone git@github.com:sensorario/MSensorarioDropdown

And add it into your module list

    'modules' => array(
        ...
        'MSensorarioDropdown',
        ...
    ),

Configure
=========

To configure this module, you need to update this config file:

    /protected/modules/MSensorarioDropdown/config/maing.php

here the content:

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

The widget use these vars generating this html. The most important thing to
change is *model* and *message*. Message will appear when there are no *city*
once selected a *state*. Or there are no *state once selected a *country*.

    <div  class="box">
        <span id="' . $this->config['Country']['id'] . '"></span>
        <span id="' . $this->config['State']['id'] . '"></span>
        <span id="' . $this->config['City']['id'] . '"></span>
    </div>';

Usage
=====

    $this->widget('MSensorarioDropdown.extensions.ESensorarioDropdown', array(
        'configOption' => 'default'
    ));

Sample Schema
=============

    CREATE TABLE IF NOT EXISTS `city` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `state_id` int(11) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `state_id` (`state_id`)
    );

    CREATE TABLE IF NOT EXISTS `state` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `country_id` int(11) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `country_id` (`country_id`)
    );

    CREATE TABLE IF NOT EXISTS `country` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        PRIMARY KEY (`id`)
    );

    ALTER TABLE `city`
        ADD CONSTRAINT `city_ibfk_1`
        FOREIGN KEY (`state_id`)
        REFERENCES `state` (`id`);

    ALTER TABLE `state`
        ADD CONSTRAINT `state_ibfk_1` 
        FOREIGN KEY (`country_id`) 
        REFERENCES `country` (`id`);

Sample data
===========

    INSERT INTO `country` (`id`, `name`) VALUES
        (1, 'Italy'),
        (2, 'Spain'),
        (3, 'Germany'),
        (4, 'England'),
        (5, 'Swiss'),
        (6, 'Norway');

    INSERT INTO `state` (`id`, `name`, `country_id`) VALUES
        (1, 'Emilia-Romagna', 1),
        (2, 'Molise', 1),
        (3, 'Lazio', 1);

    INSERT INTO `city` (`id`, `name`, `state_id`) VALUES
        (1, 'Cesena', 1),
        (2, 'Bologna', 1),
        (3, 'Parma', 1);

	
## 1.2 (Jun 27, 2012)

Bugfixes:
*    #7: Label configurable in config file
*    #5: Changing Country, city is not resetted
*   #11: Fixed README.md

Enhancement:
*    #3: Modal window for adding new items
*    #8: Convert data samples en english
*    #2: Dynamic models

## 1.1 (Jun 23, 2012)

Bugfixes:
*    #1: Enable also non "path" style url