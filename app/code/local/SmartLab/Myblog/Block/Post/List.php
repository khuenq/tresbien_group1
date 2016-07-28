<?php

/**
 * Created by PhpStorm.
 * User: smilelife.9x
 * Date: 07/25/2016
 * Time: 10:39 AM
 */
class SmartLab_Myblog_Block_Post_List extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    function _construct()
    {
        $this->setTemplate('neotheme/blog/post/list.phtml');
        $this->setSummaryBlockType('myblog/post_summary');
        $this->setSummaryTemplate('smartlab/myblog/post/summary.phtml');
        //$this->addData(array(
        //    'cache_lifetime' => 1500,
        //    'cache_tags' => array(NeoTheme_Blog_Model_Post::CACHE_TAG, NeoTheme_Blog_Model_Category::CACHE_TAG),
        //));
    }

    //public function getCacheKeyInfo()
    //{
    //    $cacheKeyInfo = array(
    //            'BLOCK_TPL',
    //            Mage::app()->getStore()->getCode(),
    //            $this->getTemplateFile(),
    //            'template' => $this->getTemplate()
    //        );
    //     //if (Mage::registry('post')) {
    //     //   $cacheKeyInfo[] = NeoTheme_Blog_Model_Post::CACHE_TAG . $this->getRequest()->getParam('id');
    //    //}
    //    if ($this->getRequest()->getParam('id') && $this->getRequest()->getControllerName() == "category") {
    //         $cacheKeyInfo[] = NeoTheme_Blog_Model_Category::CACHE_TAG . $this->getRequest()->getParam('id');
    //     }
    //     $cacheKeyInfo[] = Mage::getSingleton('customer/session')->getCustomerGroupId();
    //     return $cacheKeyInfo;
    //}

    private $_collection;

    function getUseCustomerPreferences()
    {
        return filter_var($this->getData('use_customer_preferences'), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Prepare the post collection for list display
     * @return type
     */
    function _prepareCollection()
    {

        $this->_collection = Mage::getModel('neotheme_blog/post')
            ->getCollection()
            ->addStoreFilter()
            ->addStatusFilter(NeoTheme_Blog_Model_Post::STATUS_ACTIVE)
            //->addPublishFilter();
            ->setOrder('entity_id', 'DESC');
        if ($this->_showDrafts()) {
            $this->_collection->addStatusFilter(NeoTheme_Blog_Model_Post::STATUS_DRAFT);
        }

        $session = Mage::getSingleton('customer/session');
        if (Mage::getStoreConfig(NeoTheme_Blog_Helper_Data::XPATH_CUSTOMER_GROUP_FILTERING)) {
            $this->_collection->addCustomerGroupFilter($session->getCustomerGroupId());
        }
        if ($this->getCategoryId()) {
            $this->_collection->addCategoryFilter($this->getCategoryId());
        } elseif ($this->getUseCustomerPreferences()) {
            if ($session->isLoggedIn() && $session->getCustomer()->getDefaultBlogCategoryIds()) {
                try {
                    $userChosenIds = explode(",", $session->getCustomer()->getDefaultBlogCategoryIds());
                    if (count($userChosenIds)) {
                        $this->_collection->addCategoryFilter($userChosenIds);
                    }
                } catch (Exception $ex) {
                    Mage::log($ex->getTraceAsString(), null, "neotheme_blog.log");
                }
            }
        }
        return $this->_collection;
    }

    function _showDrafts()
    {
        return Mage::helper('neotheme_blog')->isIpPermitted();
    }

    function getCollection()
    {
        if ($this->_collection == null) {
            $this->_prepareCollection();
        }
        return $this->_collection;
    }

    function _prepareLayout()
    {

        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(5 => 5, 10 => 10, 20 => 20, 'all' => 'all'));

        $this->setChild('pager', $pager);
        parent::_prepareLayout();
    }

    function _toHtml()
    {
        $this->getChild('pager')->setCollection($this->getCollection());
        return parent::_toHtml();
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function getCategory()
    {
        if (!Mage::registry('current_blog_category')) {
            $this->_initCategory($this->getCategoryId());
        }
        return Mage::registry('current_blog_category');
    }

    protected function _initCategory($id = NULL)
    {
        if ($id == NULL) {
            $data = $this->getRequest()->getParams();
            $id = $data['id'];
        }
        $category = Mage::getModel('neotheme_blog/category');
        if ($id != NULL) {
            $category->load($id);
            Mage::register('current_blog_category', $category);
        }
        return $category;
    }

    function getSummaryBlock($post)
    {
        if (!$this->getLayout()->getBlock('post_summary_' . $post->getId())) {
            $post->setCurrentCategoryId($this->getCategoryId());
            $post_summary = $this->getLayout()->createBlock($this->getSummaryBlockType(), 'post_summary_' . $post->getId())
                ->setTemplate("smartlab/myblog/post/summary.phtml")
                ->setPost($post);
            $this->getLayout()->getBlock('post_summary_' . $post->getId());
        }
        return $this->getLayout()->getBlock('post_summary_' . $post->getId());
    }

    /*
     * get Post collection by tag name
     * return $this->_postCollection
     */
    public function getPostCollection()
    {
        $storeId = Mage::app()->getStore()->getStoreId();
        $tag = $this->getRequest()->getParam('name'); //var_dump($tag);die;
        $this->_postCollection = Mage::getModel('myblog/post')->getCollection()
            ->addFieldToFilter('store_ids', $storeId)
            ->addFieldToFilter('tag_ids', array('like' => '%' . $tag . '%'))
            ->setOrder('entity_id', 'desc');
        return $this->_postCollection;
    }

}