<?php

class SmartLab_ProductType_Model_Resource_Digcode extends Mage_Core_Model_Resource_Db_Abstract
{
	public function _construct(){
		$this->_init('producttype/digcode', 'code_id');
	}
}