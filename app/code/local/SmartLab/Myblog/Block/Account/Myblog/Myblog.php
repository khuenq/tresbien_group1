<?php

class SmartLab_Myblog_Block_Account_Myblog_Myblog extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    function __construct()
    {
        parent::__construct();
        $collection = $this->getPostCollection();
        $this->setCollection($collection);
        $this->setTitle('My blog');
    }

    /*
     * get Post collection by customer ID
     * @return $collection
     */
    public function getPostCollection()
    {
        // Check if any customer is logged in or not
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $listPostId = array();
            // load Customer ID
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $cust_id = $customer->getId();
            $custPostOption = Mage::getModel('myblog/custpost')->getCollection()->addFieldToFilter('customer_id', $cust_id);
            // can replace by id cus when create post post_date is automatic insert to database.
            // get list ID post by customer ID
            foreach ($custPostOption as $custPost) {
                array_push($listPostId, $custPost->getData('post_id'));
            };
            // get post collection filter by ID post
            $collection = Mage::getModel('myblog/post')->getCollection()
                ->addFieldToFilter('entity_id', array('in' => $listPostId))->setOrder('entity_id', 'desc');
        }
        return $collection;
    }

    //prepare layout
    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager', 'myblog.pager')->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /*
     * get name of category of each post
     * @return $post_cate
     */
    public function getCategoryLabel($post_cate)
    {
        $cate = Mage::getModel('myblog/category')->getCollection();
        foreach ($cate as $value) {
            $category_id = $value->getID();
            $category_name = $value->getData('name');
            if ($post_cate == $category_id)
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
        if (isset($status)) {
            if ($status == 0) {
                $status = 'Inactive';
            } else if ($status == 1) {
                $status = 'Active';
            } else if ($status == 2) {
                $status = 'Draft';
            }
        }
        return $status;
    }

    public function getAddNewForm()
    {
        return $this->getUrl('myblog/myblog/addnew');
    }

    public function getViewUrl($post)
    {
        return $this->getUrl('*/*/view', array('id' => $post->getId()));
    }

    public function getEditUrl($post)
    {
        return $this->getUrl('*/*/edit', array('id' => $post->getId()));
    }

    public function getDeleteUrl($post)
    {
        return $this->getUrl('*/*/delete', array('id' => $post->getId()));
    }
}