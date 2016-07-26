<?php

class SmartLab_Myblog_Model_Observer
{
    public function hookIntoPostTag($observer)
    {
        // die(ooooooooooooooooo);
        $postId = Mage::app()->getRequest()->getParam('id');
        //var_dump($postId);die;
        $tagOption = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('entity_id', $postId);
        foreach ($tagOption as $tagOp) {
            $tagString = $tagOp->getData('tag_ids');
        }
        $tagArr = explode(',', $tagString);// name tag of each post
        for ($i = 0; $i < count($tagArr); $i++) {
            $tagArr[$i] = trim($tagArr[$i]);
        }
        $tagIdArr = array(); // id tag of each post
        $tagTable = Mage::getModel('myblog/tag')->getCollection()->addFieldToFilter('name', array('in' => $tagArr));
        foreach ($tagTable as $item) {
            $id = $item->getData('entity_id');
            $index = $item->getData('index');
            $index = $index + 1;
            $tag = Mage::getModel('myblog/tag');
            $tag->setData('entity_id', $id);
            $tag->setData('index', $index);
            $tag->save();
        }

    }
}


?>