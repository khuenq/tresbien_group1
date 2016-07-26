<?php

class SmartLab_Myblog_Model_Resource_Tag extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('myblog/tag', 'entity_id');
    }
}