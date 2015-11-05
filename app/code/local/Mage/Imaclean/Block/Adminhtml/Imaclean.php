<?php
class Mage_Imaclean_Block_Adminhtml_Imaclean extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_imaclean';
    $this->_blockGroup = 'imaclean';
    $this->_headerText = Mage::helper('imaclean')->__('Items Manager. These files are not in database.');
   $this->_addButtonLabel = Mage::helper('imaclean')->__('Refresh');
    parent::__construct();
	
  }
}