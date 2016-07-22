<?php

class SmartLab_Blog_Model_Tag extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('blog/tag');
    }
}