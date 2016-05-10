<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Block_Imaclean extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getImaclean()
    {
        if (!$this->hasData('imaclean')) {
            $this->setData('imaclean', Mage::registry('imaclean'));
        }
        return $this->getData('imaclean');
    }
}
