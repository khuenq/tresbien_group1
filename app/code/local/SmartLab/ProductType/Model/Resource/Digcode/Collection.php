<?php

class SmartLab_ProductType_Model_Resource_Digcode_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	public function _construct(){
		parent::_construct();
		$this->_init('producttype/digcode');
	}
}