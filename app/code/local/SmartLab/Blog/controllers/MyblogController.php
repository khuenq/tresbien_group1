<?php

/**

 */
class SmartLab_Blog_MyblogController extends Mage_Core_Controller_Front_Action
{
    // display myblog
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
//        $stores = Mage::app()->getStores();
//        $a= array();
//        foreach ($stores as $storeId => $store)
//        {
//            array_push($a, $storeId);
//
//        }
//        var_dump($a);die;
    }

    // display detail of a post
    public function ViewAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    // display form add new post
    public function addNewAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    // save new post action
    public function CreatePostAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $data = $this->getRequest()->getPost();
            $tagString = $this->getRequest()->getParam('tag'); $this->addTag($tagString);
            $post = Mage::getModel('blog/post');
            $post->setData($data);
            //var_dump($data);die();
            try {
                $post->save();
            } catch (Exceptiion $e) {
                print_r($e);
            }
            $cust_id = "";

            // Load the customer's data
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $cust_id = $customer->getId();
            //get Id of new post
            $postOption = Mage::getModel('blog/post')->load($post->getId());
            $post_id = $postOption->getId();

            $custpost = Mage::getModel('blog/custpost');
            //        var_dump($post_id);die;
            $custpost->setData('customer_id', $cust_id);
            $custpost->setData('post_id', $post_id);

            try {
                $custpost->save();
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('blog')->__('Post was successfully posted'));
            } catch (Exception $e) {
                print_r($e);
            }
            $this->_redirect('blog/myblog/index');
        }

    }

    // display form edit of a post
    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    // save edit post action
    public function editPostAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            if (null != Mage::app()->getRequest()->getPost()) {
//            Neu co request Post thi vao form edit
                $info = Mage::app()->getRequest()->getPost();
                $model = Mage::getModel('blog/post');
                $model->setData($info);
                try {
                    $model->save();
                    Mage::getSingleton('core/session')->addSuccess(Mage::helper('blog')->__('Post was successfully edited'));
                    $this->_redirect('blog/myblog/index');
                } catch (Exception $e) {
                    Mage::getSingleton('core/session')->addError($e->getMessage());
                }
            }
        }
    }

    // delete post action
    public function deleteAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            if ($this->getRequest()->getParam('id') > 0) {
                try {
                    $model = Mage::getModel('blog/post');

                    $model->setId($this->getRequest()->getParam('id'))
                        ->delete();

                    Mage::getSingleton('core/session')->addSuccess(Mage::helper('blog')->__('Post was successfully deleted'));
                    $this->_redirect('*/*/index');
                } catch (Exception $e) {
                    Mage::getSingleton('core/session')->addError($e->getMessage());
                }
                $this->_redirect('blog/myblog/index');
            }
        }
    }
/*
 * Add tag of posts into database
 * @param $tagString
 */
    public function addTag($tagString)
    {
        $tag = array();
        $tagPost = array();
        $tag = explode(",", $tagString);
        for ($i = 0; $i < count($tag); $i++) {
            $tag[$i] = trim($tag[$i]);
        }
        $tag = array_unique($tag);
//        var_dump($tag);die;

        $tagOption = Mage::getModel('blog/tag')->getCollection();
        foreach($tagOption as $value)
        {
            array_push($tagPost,$value->getData('name'));
        }
        //$tagAdded->save();
        foreach($tag as $item)
        {
            $tagAdded = Mage::getModel('blog/tag');
            if (!in_array($item, $tagPost))
            {

                $tagAdded->setData('name', $item);
                $tagAdded->save();
            }
        }
    }


}