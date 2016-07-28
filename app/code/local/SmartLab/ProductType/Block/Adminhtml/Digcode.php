<?php

class SmartLab_ProductType_Block_Adminhtml_Digcode extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct(){
		$this->_controller = 'adminhtml_digcode';
		$this->_blockGroup = 'producttype';
		$this->_headerText = Mage::helper('producttype')->__('Digicert Manager');
		parent::__construct();
		$this->_removeButton('add');
	}
}