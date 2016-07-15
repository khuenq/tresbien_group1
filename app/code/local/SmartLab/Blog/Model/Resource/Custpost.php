<?php

class SmartLab_Blog_Model_Resource_Custpost extends NeoTheme_Blog_Model_Resource_Post
{
    public function _construct()
    {
        $this->_init('blog/custpost', 'entity_id');
    }
}