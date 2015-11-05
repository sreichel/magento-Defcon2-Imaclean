<?php

class Mage_Imaclean_Model_Mysql4_Imaclean extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the imaclean_id refers to the key field in your database table.
        $this->_init('imaclean/imaclean', 'imaclean_id');
    }
	
}