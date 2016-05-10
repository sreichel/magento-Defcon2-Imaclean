<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$installer->run("
CREATE TABLE IF NOT EXISTS {$this->getTable('imaclean')} (
 `imaclean_id` int(11) unsigned NOT NULL auto_increment,
 `filename` varchar(255) NOT NULL default '',
 PRIMARY KEY  (`imaclean_id`),
 UNIQUE KEY `filename` (`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

$oldDir = Mage::getModuleDir('', 'Mage_Imaclean');
if (file_exists($oldDir)) {
    $etcFile = Mage::getBaseDir('etc') . DS . 'modules' . DS . 'Mage_Imaclean.xml';
    if (file_exists($etcFile) && is_file($etcFile)) {
        if (unlink($etcFile)) {
            unlink(Mage::getBaseDir('design') . DS . 'adminhtml' . DS . 'default' . DS . 'default' . DS . 'layout' . DS . 'imaclean.xml');
            Varien_Io_File::rmdirRecursive($oldDir);
            $installer->run("DELETE FROM {$this->getTable('core_resource')}  WHERE `code` = 'imaclean_setup'");
        }
    }
}
$installer->endSetup();
