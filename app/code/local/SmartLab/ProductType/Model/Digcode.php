<?php
class SmartLab_ProductType_Model_Digcode extends Mage_Core_Model_Abstract
{
	public function _construct(){
		parent::_construct();
		$this->_init('producttype/digcode');
	}
}