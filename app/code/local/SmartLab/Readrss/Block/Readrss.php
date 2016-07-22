<?php

class SmartLab_Readrss_Block_Readrss extends Mage_Core_Block_Template
{
	public function _prepareLayout(){
		return parent::_prepareLayout();
	}
  public function getCollection()
  {
    return Mage::getModel('readrss/readrss')->listContent();
  }
}