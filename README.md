MSensorarioDropdown
===================

A module to build dependents dropdown

Install
=======

Move in your /protected/modules folder and clone the repository on your project:

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

    /protected/modules/MSensorarioDropdown/confih/maing.php

here the content:

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

Usage
=====

<?php $this->widget('MSensorarioDropdown.extensions.ESensorarioDropdown'); ?>

Sample Schema
=============

    CREATE TABLE IF NOT EXISTS `comune` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(50) NOT NULL,
        `regione_id` int(11) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `regione_id` (`regione_id`)
    );

    CREATE TABLE IF NOT EXISTS `regione` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(50) NOT NULL,
        `stato_id` int(11) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `stato_id` (`stato_id`)
    );

    CREATE TABLE IF NOT EXISTS `stato` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(50) NOT NULL,
        PRIMARY KEY (`id`)
    );

    ALTER TABLE `comune`
        ADD CONSTRAINT `comune_ibfk_1`
        FOREIGN KEY (`regione_id`)
        REFERENCES `regione` (`id`);

    ALTER TABLE `regione`
        ADD CONSTRAINT `regione_ibfk_1` 
        FOREIGN KEY (`stato_id`) 
        REFERENCES `stato` (`id`);

Sample data
===========

    INSERT INTO `stato` (`id`, `nome`) VALUES
        (1, 'Italia'),
        (2, 'Francia'),
        (3, 'Germania'),
        (4, 'Spagna'),
        (5, 'Inghilterrra'),
        (6, 'Svezia');

    INSERT INTO `regione` (`id`, `nome`, `stato_id`) VALUES
        (1, 'Emilia-Romagna', 1),
        (2, 'Molise', 1),
        (3, 'Lazio', 1);

    INSERT INTO `comune` (`id`, `nome`, `regione_id`) VALUES
        (1, 'Cesena', 1),
        (2, 'Bologna', 1),
        (3, 'Parma', 1);