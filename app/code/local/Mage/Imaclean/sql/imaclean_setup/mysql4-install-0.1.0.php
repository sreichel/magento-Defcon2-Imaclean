<?php

$installer = $this;

$installer->startSetup();

$installer->run("

DROP TABLE IF EXISTS {$this->getTable('imaclean')};
CREATE TABLE {$this->getTable('imaclean')} (
 `imaclean_id` int(11) unsigned NOT NULL auto_increment,
 `filename` varchar(255) NOT NULL default '',
 PRIMARY KEY  (`imaclean_id`),
 UNIQUE KEY `filename` (`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
    ");

$installer->endSetup(); 