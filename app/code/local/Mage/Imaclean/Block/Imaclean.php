<?php
class Mage_Imaclean_Block_Imaclean extends Mage_Core_Block_Template
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