<?php

class SmartLab_Myblog_Model_Custpost extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('myblog/custpost');
    }
}