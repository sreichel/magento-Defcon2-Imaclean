<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $result = array();
    protected $_mainTable;
    public $valdir = array();

    public function listDirectories($path)
    {
        if (is_dir($path)) {
            if ($dir = opendir($path)) {
                while (($entry = readdir($dir)) !== false) {
                    if (preg_match('/^\./', $entry) != 1) {
                        if (is_dir($path . DS . $entry) && !in_array($entry, array('cache', 'watermark', 'placeholder'))) {
                            $this->listDirectories($path . DS . $entry);
                        } elseif (!in_array($entry, array('cache', 'watermark')) && (strpos($entry, '.') != 0)) {
                            $this->result[] = substr($path . DS . $entry, 21);
                        }
                    }
                }
                closedir($dir);
            }
        }
        return $this->result;
    }

    public function compareList()
    {
        $model = Mage::getModel('defcon2imaclean/imaclean');

        $resource = $model->getResource();
        $connection = $resource->getReadConnection();
        $connection->truncateTable($resource->getMainTable());
        $connection->changeTableAutoIncrement($resource->getMainTable(), 1);

        $path = 'media' . DS . 'catalog' . DS . 'product';
        $files = $this->listDirectories($path);

        $gallery = Mage::getModel('defcon2imaclean/imaclean')->getCollection()->getImages();

        foreach ($files as $item) {
            try {
                $item = strtr($item, '\\', '/');
                if (!in_array($item, $gallery)) {
                    $model->setId(null);
                    $model->setData(array('filename' => $item));
                    $model->save();
                }
            } catch (Zend_Db_Exception $e) {
            } catch (Exception $e) {
                Mage::log($e->getMessage());
            }
        }
    }
}
