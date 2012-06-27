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

    <?php

    return array(
        'Country' => array(
            'id' => 'country',
            'name' => 'Countries',
            'model' => 'Country::getCountry();',
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

## from (Jun 25, 2012)

    $this->widget('MSensorarioDropdown.extensions.ESensorarioDropdown', array(
        'configOption' => 'default'
    ));

## from 1.1 (Jun 23, 2012)

    <?php $this->widget('MSensorarioDropdown.extensions.ESensorarioDropdown'); ?>

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

	
## 1.2 (Jun 23, 2012)

Bugfixes:
    #5 Changing Country, city is not resetted

Enhancement:
    #2 Dynamic models

## 1.1 (Jun 23, 2012)

Bugfixes:
    #1 Enable also non "path" style url