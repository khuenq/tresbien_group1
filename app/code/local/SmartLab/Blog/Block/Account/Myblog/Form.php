<?php

class SmartLab_Blog_Block_Account_Myblog_Form extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    function __construct()
    {
        parent::__construct();
        $collection = $collection = Mage::getModel('blog/post')->getCollection();
        $this->setCollection($collection);
        $this->setTitle();
    }

    public function getActionOfForm()
    {
        return $this->getUrl('blog/myblog/createpost');
    }
//    public function getCategoryName($category)
//    {
//        $cate = Mage::getModel('blog/category')->getCollection();
//        foreach($cate as $value)
//        {
//            $category_id = $value->getID();
//            $category_name= $value->getData('name');
//            if($category == $category_id)
//                $post_cate = $category_name;
//        }
//        return $post_cate;
//    }

}