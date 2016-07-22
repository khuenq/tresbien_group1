<?php

class SmartLab_Blog_Model_Observer
{
    public function hookIntoPostTag($observer)
    {
        // die(ooooooooooooooooo);
        $postId = Mage::app()->getRequest()->getParam('id');
        //var_dump($postId);die;
        $tagOption = Mage::getModel('blog/post')->getCollection()->addFieldToFilter('entity_id', $postId);
        foreach ($tagOption as $tagOp) {
            $tagString = $tagOp->getData('tag_ids');
        }
        $tagArr = explode(',', $tagString);// name tag of each post
        for ($i = 0; $i < count($tagArr); $i++) {
            $tagArr[$i] = trim($tagArr[$i]);
        }
        $tagIdArr = array(); // id tag of each post
        $tagTable = Mage::getModel('blog/tag')->getCollection()->addFieldToFilter('name', array('in' => $tagArr));
        foreach ($tagTable as $item) {
            $id = $item->getData('entity_id');//var_dump($id);die;
            $index = $item->getData('index');
            $index = $index + 1; //var_dump($index);die;
            $tag = Mage::getModel('blog/tag');
            $tag->setData('entity_id', $id);
            $tag->setData('index', $index);
            $tag->save(); //var_dump($tagIndex->save());die;
            //array_push($tagIdArr, $item->getData('entity_id'));
        }
        //var_dump($tagIdArr);die;
    }
}


?>