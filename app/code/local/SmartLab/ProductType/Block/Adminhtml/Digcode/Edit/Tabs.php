<?php

class SmartLab_ProductType_Block_Adminhtml_Digcode_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct(){
		parent::__construct();
		$this->setId('digcode_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('album')->__('Digcode Information'));
	}

	protected function _beforeToHtml(){
		$this->addTab('form_section', array(
			'label'	 => Mage::helper('producttype')->__('Digcode Information'),
			'title'	 => Mage::helper('producttype')->__('Digcode Information'),
			'content'	 => $this->getLayout()->createBlock('producttype/adminhtml_digcode_edit_tab_form')->toHtml(),
		));
		return parent::_beforeToHtml();
	}
}