<?php
class SmartLab_Blog_Block_Account_Myblog_Editpost
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    function __construct()
    {
        parent::__construct();
        $collection = $this->getPostCollection();
        $this->setCollection($collection);
    }
    public function getPostCollection()
    {
        $collection = Mage::getModel('blog/post')->getCollection();
        return $collection;
    }
}