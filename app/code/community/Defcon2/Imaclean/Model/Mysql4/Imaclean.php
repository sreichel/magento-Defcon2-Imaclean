<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Model_Mysql4_Imaclean extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        // Note that the imaclean_id refers to the key field in your database table.
        $this->_init('defcon2imaclean/imaclean', 'imaclean_id');
    }
}
