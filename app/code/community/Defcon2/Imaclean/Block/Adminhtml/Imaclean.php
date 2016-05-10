<?php

/**
 * Defcon2_Imaclean
 *
 * @category   Defcon2
 * @package    Defcon2_Imaclean
 * @copyright  Copyright (c) 2016 Manuel Canepa (http://cv.manuelcanepa.com.ar/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Defcon2_Imaclean_Block_Adminhtml_Imaclean extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_imaclean';
        $this->_blockGroup = 'defcon2imaclean';
        $this->_headerText = Mage::helper('defcon2imaclean')->__('Items Manager. These files are not in database.');
        $this->_addButtonLabel = Mage::helper('defcon2imaclean')->__('Refresh');
        parent::__construct();
    }
}
