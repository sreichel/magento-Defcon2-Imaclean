<?php

class Mage_Imaclean_Helper_Data extends Mage_Core_Helper_Abstract
{

protected $result = array();
protected $_mainTable;
public $valdir = array();

	public function listDirectories($path){
        if(is_dir($path)){
									
			if ($dir = opendir($path)) {
				while (($entry = readdir($dir)) !== false) {
					if(preg_match('/^\./',$entry) != 1){
							  if (is_dir($path . DS . $entry) && !in_array($entry,array('cache','watermark')) ){
								  $this->listDirectories($path . DS . $entry);
							  } elseif(!in_array($entry,array('cache','watermark')) && (strpos($entry,'.') != 0)) {
								  $this->result[] = substr($path . DS . $entry, 21);
							  }
					}
					
				}
				closedir($dir);
			}
			
		}
		return $this->result;
    }
	
	
	public function compareList() {
		
		$valores	= Mage::getModel('imaclean/imaclean')->getCollection()->getImages();
						
		$pepe = 'media' . DS . 'catalog' . DS . 'product';
		
		$leer = $this->listDirectories($pepe);
				
			$model = Mage::getModel('imaclean/imaclean');		
			foreach ($leer as $item){
				try{
					$item	= strtr($item,'\\','/');
					if(!in_array($item, $valores)){
						$valdir[]['filename'] = $item;
						$model->setData(array('filename'=>$item))->setId(null);
						$model->save();
					}
				} catch(Zend_Db_Exception $e){
				} catch(Exception $e){
					Mage::log($e->getMessage());
				}
			}  
		
	}
	
}
