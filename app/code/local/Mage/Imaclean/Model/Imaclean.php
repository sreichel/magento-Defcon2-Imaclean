<?php

class Mage_Imaclean_Model_Imaclean extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('imaclean/imaclean');
    }
}