<?php

class SmartLab_ProductType_Block_Adminhtml_Digcode_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm(){
		$form = new Varien_Data_Form();
		$this->setForm($form);
		
		if (Mage::getSingleton('adminhtml/session')->getProducttypeData()){
			$data = Mage::getSingleton('adminhtml/session')->getProducttypeData();
			Mage::getSingleton('adminhtml/session')->setProducttypeData(null);
		}elseif(Mage::registry('producttype_data'))
			$data = Mage::registry('producttype_data')->getData();
		
		$fieldset = $form->addFieldset('producttype_form', array('legend'=>Mage::helper('producttype')->__('Item information')));

		$fieldset->addField('status', 'select', array(
		 'label' => Mage::helper('producttype')->__('Status'),
		 'name'	=>'status',
		 'values'=>array('-1'=>'please Select..','0'=>'Disable', '1'=>'Enable'),
		 'disabled'=>false,
		 'readonly'=>false,
		 'tabindex'=>1,
		 'required' => true
		 ));

		$form->setValues($data);
		return parent::_prepareForm();
	}
}