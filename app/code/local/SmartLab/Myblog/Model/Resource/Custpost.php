<?php

class SmartLab_Myblog_Model_Resource_Custpost extends NeoTheme_Blog_Model_Resource_Post
{
    public function _construct()
    {
        $this->_init('myblog/custpost', 'entity_id');
    }
}