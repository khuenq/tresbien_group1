<?php

/**

 */
class SmartLab_Myblog_MyblogController extends Mage_Core_Controller_Front_Action
{
    // display myblog
    public function indexAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            $this->renderLayout();
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to manage your post.'));
        }
    }

    // display detail of a post
    public function ViewAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            $this->renderLayout();
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to view post.'));
        }
    }

    // display form add new post
    public function addNewAction()
    {
        // check customer login to store
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            // check customer buy new product type or not
            // if they bought, allow customer to create myblog post

            // Load the customer's data
            $cust_id = "";
            $custArr = array();
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $cust_id = $customer->getId();
            $digcodeOption = Mage::getModel('producttype/digcode')->getCollection()->addFieldToFilter('customer_id', $cust_id);
            foreach ($digcodeOption as $digcode) {
                array_push($custArr, $digcode->getData('customer_id'));
            }
            //var_dump($custArr);die;
            if (count($custArr) > 0) {//var_dump(count($custArr));die;
                $this->loadLayout();
                $this->renderLayout();
            } else {
                $this->_redirect('myblog/myblog/index');
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You must purchase Digital Certification product to be posted.'));
            }
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to be posted.'));
        }
    }

    // save new post action
    public function CreatePostAction()
    {
        // check customer login to store
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {

            // add post
            $tagString = $this->getRequest()->getParam('tag');
            $tag = $this->tagOption($tagString);
            $tagStringNew = implode(', ', $tag);
            $data = $this->getRequest()->getPost();
            $post = Mage::getModel('myblog/post');
            $post->setData($data);
            $post->setData('tag_ids', $tagStringNew);
            try {
                $post->save();
            } catch (Exceptiion $e) {
                print_r($e);
            }
            // add tag
            $tagString = $this->getRequest()->getParam('tag');
            $this->addTag($tagString);

            // Load the customer's data
            $cust_id = "";
            $custArr = array();
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $cust_id = $customer->getId();

            //get Id of new post
            $postOption = Mage::getModel('myblog/post')->load($post->getId());
            $post_id = $postOption->getId();

            // save data to table neotheme_customer_post
            $custpost = Mage::getModel('myblog/custpost');
            $custpost->setData('customer_id', $cust_id);
            $custpost->setData('post_id', $post_id);

            try {
                $custpost->save();
                Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('Post was successfully posted'));
            } catch (Exception $e) {
                print_r($e);
            }
            $this->_redirect('myblog/myblog/index');
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to be posted.'));
        }

    }

    // display form edit of a post
    public function editAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $this->loadLayout();
            $this->renderLayout();
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to be edited post.'));
        }
    }

    // save edit post action
    public function editPostAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            if (null != Mage::app()->getRequest()->getPost()) {
                //Delete tag that appear once time in the tag table and in the tag of this post
                $tagId = Mage::app()->getRequest()->getParam('entity_id');
                $tagDelete = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('entity_id', $tagId);
                foreach ($tagDelete as $tagDel) {
                    $tagDlt = $tagDel->getData('tag_ids');
                    $this->deleteTag($tagDlt);
                }

                // edit post and add tag again
                $info = Mage::app()->getRequest()->getPost();
                $tagString = $this->getRequest()->getParam('tag');
                $this->addTag($tagString); // add tag to tag table
                $model = Mage::getModel('myblog/post');
                $model->setData($info);
                $model->setData('tag_ids', $tagString); // add tag to field tag_ids in post table
                try {
                    $model->save();
                    Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('Post was successfully edited'));
                    $this->_redirect('myblog/myblog/index');
                } catch (Exception $e) {
                    Mage::getSingleton('core/session')->addError($e->getMessage());
                }
            }
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to be edited post.'));
        }
    }

    // delete post action
    public function deleteAction()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $postId = $this->getRequest()->getParam('id');
            if ($postId > 0) {
                try {
                    $model = Mage::getModel('myblog/post');
                    $tagDelete = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('entity_id', $postId);
                    foreach ($tagDelete as $tagDel) {
                        $tagDlt = $tagDel->getData('tag_ids');
                    }
                    // delete post
                    $result = $model->setId($postId)->delete();
                    // delete post-customer
                    $cuspos = Mage::getModel('myblog/custpost')->getCollection()->addFieldToFilter('post_id', $postId);
                    $custpostId = "";
                    foreach ($cuspos as $custpost) {
                        $custpostId = $custpost->getId();
                    }
                    $cuspostDelete = Mage::getModel('myblog/custpost');

                    // delete tag that only appear in this post
                    if ($result) {
                        $this->deleteTag($tagDlt);
                        $cuspostDelete->setId($custpostId)->delete();
                    }

                    Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('Post was successfully deleted'));
                    $this->_redirect('*/*/index');
                } catch (Exception $e) {
                    Mage::getSingleton('core/session')->addError($e->getMessage());
                }
                $this->_redirect('myblog/myblog/index');
            }
        } else {
            $this->_redirect('customer/account/login/');
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('myblog')->__('You have to log in to be deleted post.'));
        }
    }

    /*
     * process tag string when user input
     * @param $tagString
     * @return $tag
     */

    public function tagOption($tagString)
    {
        $tag = array();
        $tag = explode(",", $tagString);
        for ($i = 0; $i < count($tag); $i++) {
            $tag[$i] = trim($tag[$i]);
        }
        $empty = "";
        if (($key = array_search($empty, $tag)) != false) {
            unset($tag[$key]);
        }
        $tag = array_filter($tag);
        $tag = array_unique($tag);
        return $tag;
    }

    /*
     * Add tag of posts into database
     * @param $tagString
     */

    public function addTag($tagString)
    {
        $tag = $this->tagOption($tagString);
        $tagPost = array();
        $tagOption = Mage::getModel('myblog/tag')->getCollection();
        foreach ($tagOption as $value) {
            array_push($tagPost, $value->getData('name'));
        }
        //$tagAdded->save();
        foreach ($tag as $item) {
            $tagAdded = Mage::getModel('myblog/tag');
            if (!in_array($item, $tagPost)) {

                $tagAdded->setData('name', $item);
                $tagAdded->save();
            }
        }
    }

    /*
     * delete tag when user edit or delete post
     * @param $tagString
     */

    public function deleteTag($tagString)
    {
        $tag = $this->tagOption($tagString);
        $tagInPost = array();
        $tagPost = Mage::getModel('myblog/post')->getCollection();
        foreach ($tagPost as $item) {
            $itemArr = $this->tagOption($item->getData('tag_ids'));
            foreach ($itemArr as $arr) {
                array_push($tagInPost, $arr);
            }
        }
        foreach ($tag as $value) {
            $count = 0;
            foreach ($tagInPost as $tagIp) {
                if ($value == $tagIp) {
                    $count = $count + 1;
                }
            }
            if ($count < 2) {
                $tagOption = Mage::getModel('myblog/tag')->getCollection()->addFieldToFilter('name', $value);
                foreach ($tagOption as $tag) {
                    $tagId = $tag->getData('entity_id');
                }
                $model = Mage::getModel('myblog/tag');
                $model->setId($tagId)->delete();
            }
        }
    }


}