<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Model_Mysql4_Imaclean_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected $total;

    public function _construct()
    {
        parent::_construct();
        $this->_init('defcon2imaclean/imaclean');
    }

    /**
     * trae imagenes que estan guardadas en la base de datos...
     */
    public function getImages()
    {
        try {
            $this->setConnection($this->getResource()->getReadConnection());
            $this->getSelect()
                ->from(array('main_table' => $this->getTable('catalog/product_attribute_media_gallery')), 'value')
                ->group(array('value_id'));

            $images = array_unique($this->getColumnValues('value'));
        } catch (Exception $e) {
            Mage::log($e->getMessage());
        }

        return $images;
    }
}
