<?php

class SmartLab_Blog_Model_Tagpost extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blog/tagpost');
    }
}