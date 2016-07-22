<?php

class SmartLab_Blog_Model_Resource_Tagpost extends NeoTheme_Blog_Model_Resource_Post
{
    public function _construct()
    {
        $this->_init('blog/tagpost', 'entity_id');
    }
}