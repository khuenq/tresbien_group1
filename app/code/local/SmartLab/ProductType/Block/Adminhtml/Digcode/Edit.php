<?php

class SmartLab_ProductType_Block_Adminhtml_Digcode_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct(){
		parent::__construct();
		
		$this->_objectId = 'id';
		$this->_blockGroup = 'producttype';
		$this->_controller = 'adminhtml_digcode';
		
		$this->_updateButton('save', 'label', Mage::helper('producttype')->__('Save Digicert'));
		$this->_updateButton('delete', 'label', Mage::helper('producttype')->__('Delete Digicert'));
		
		$this->_addButton('saveandcontinue', array(
			'label'		=> Mage::helper('adminhtml')->__('Save And Continue Edit'),
			'onclick'	=> 'saveAndContinueEdit()',
			'class'		=> 'save',
		), -100);

		$this->_formScripts[] = "
			function toggleEditor() {
				if (tinyMCE.getInstanceById('producttype_content') == null)
					tinyMCE.execCommand('mceAddControl', false, 'producttype_content');
				else
					tinyMCE.execCommand('mceRemoveControl', false, 'producttype_content');
			}

			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
	}

	public function getHeaderText(){
		if(Mage::registry('producttype_data') && Mage::registry('producttype_data')->getId())
			return Mage::helper('album')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('producttype_data')->getTitle()));
		return Mage::helper('producttype')->__('Add Item');
	}
}