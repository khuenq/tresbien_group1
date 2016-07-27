<?php

class SmartLab_Myblog_Block_Listtag extends NeoTheme_Blog_Block_Post_List
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTagCollection()
    {
        $storeId = Mage::app()->getStore()->getStoreId();
        $postOption = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('store_ids', $storeId);
        $tagInPost = array();
        foreach ($postOption as $item) {
            array_push($tagInPost, $item->getData('tag_ids'));
        }
        $tagString = implode(',', $tagInPost);
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

        $tagOption = Mage::getModel('myblog/tag')->getCollection()->addFieldToFilter('name', array('in'=>$tag));
        $tagOption->getSelect()->order(array('index DESC'));
        $tagOption->getSelect()->limit(20);
        return $tagOption;
    }


}


?>