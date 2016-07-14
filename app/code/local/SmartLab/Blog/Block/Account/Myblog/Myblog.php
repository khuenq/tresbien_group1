<?php
class SmartLab_Blog_Block_Account_Myblog_Myblog
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    function __construct()
    {
        parent::__construct();
        $collection = $this->getPostCollection();
        $this->setCollection($collection);
        $this->setTitle('My blog');
    }
    public function getPostCollection() {
        // Check if any customer is logged in or not
        if (Mage::getSingleton('customer/session')->isLoggedIn())
        {
            // Load the customer's data
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $author = $customer->getName(); // Full Name
            $collection = Mage::getModel('blog/post')->getCollection()->addFieldToFilter('author', $author);
        }
        return $collection;
    }
    //prepare layout
    public function _prepareLayout() {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager', 'blog.pager')->setCollection($this->getPostCollection());
        $this->setChild('pager', $pager);
        return $this;
    }

    public function getPagerHtml() {
        return $this->getChildHtml('pager');
    }
/*
 * get name of category of each post
 * @return $post_cate
 */
    public function getCategoryLabel($post_cate)
    {
        $cate = Mage::getModel('blog/category')->getCollection();
        foreach($cate as $value)
        {
            $category_id = $value->getID();
            $category_name= $value->getData('name');
            if($post_cate == $category_id)
                $post_cate = $category_name;
        }
    return $post_cate;
    }
    /*
     * get status of each post
     * @return $status
     */
    public function getStatusLabel($status)
    {
        if(isset($status))
        {
            if($status == 0)
            {
                $status = 'Inactive';
            }
            else if($status == 1)
            {
                $status = 'Active';
            }
            else if($status == 2)
            {
                $status = 'Draft';
            }
        }
        return $status;
    }
    public function getAddNewForm()
    {
        return $this->getUrl('blog/myblog/addnew');
    }
    public function getViewUrl($post)
    {
        return $this->getUrl('*/*/view', array('id' => $post->getId()));
    }
    public function getEditUrl($post)
    {
        return $this->getUrl('*/*/edit', array('id' => $post->getId()));
    }
}