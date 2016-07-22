<?php

class SmartLab_Custom_Model_Resource_Custom_Order_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('custom/custom_order');
    }
}