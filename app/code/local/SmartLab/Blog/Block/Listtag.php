<?php

class SmartLab_Blog_Block_Listtag extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('blog/tag')->getCollection();
        $this->setCollection($collection);
    }
}


?>