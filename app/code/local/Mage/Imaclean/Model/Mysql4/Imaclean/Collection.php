<?php

class Mage_Imaclean_Model_Mysql4_Imaclean_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	protected $total;
    public function _construct()
    {
        parent::_construct();
        $this->_init('imaclean/imaclean');
        
    }

	// trae imagenes que estan guardadas en la base de datos...
	
	public function getImages(){
		try {
			$this->setConnection($this->getResource()->getReadConnection());
			$this->getSelect()
				->from(array('main_table'=>$this->getTable('catalog/product_attribute_media_gallery')),'*')
				->group(array('value_id'));

			$array=array();
			foreach	($this->getData() as $item){
				$array[]	= $item['value'];
			}
		}catch(Exception $e){
			Mage::log($e->getMessage());
		}
				
		return $array;
	}
	
	
	
}
