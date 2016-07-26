<?php
class SmartLab_Baokim_Block_Form_Pay extends Mage_Payment_Block_Form
{
  protected function _construct()
  {
    parent::_construct();
    $this->setTemplate('baokim/form/pay.phtml');
  }
}