<?php

class SmartLab_Blog_Block_Account_Myblog_Post extends Mage_Core_Block_Template
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

    function getPost()
    {
        if (Mage::registry('current_post') == NULL) {
            if ($this->getPostId() != NULL) {
                Mage::register('current_post', Mage::getModel('blog/post')->load($this->getPostId()));
            }
        }
        return Mage::registry('current_post');
    }
}