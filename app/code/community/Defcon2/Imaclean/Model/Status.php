<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Model_Status extends Varien_Object
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

    public static function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED => Mage::helper('defcon2imaclean')->__('Enabled'),
            self::STATUS_DISABLED => Mage::helper('defcon2imaclean')->__('Disabled')
        );
    }
}
