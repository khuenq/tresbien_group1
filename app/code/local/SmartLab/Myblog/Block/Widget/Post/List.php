<?php

class SmartLab_Myblog_Block_Widget_Post_List
extends NeoTheme_Blog_Block_Post_List 
implements Mage_Widget_Block_Interface
{	
    function _construct(){
        $this->setTemplate('smartlab1/myblog/widget/post/list_block.phtml');
      //  $this->setSummaryBlockType('neotheme_blog/post_summary');
      //  $this->setSummaryTemplate('neotheme/blog/widget/post/summary.phtml');
        $this->setTitle('Latest Posts');
    }

    /**
     * Returns the render of the html of the block
     *
     * @return string
     */
    public function _toHtml() {
        //setTemplate is run on construct, the data 'template' doesn't get retrieved in 'getTemplate' 
        //so we have to do the following before render.
        if ($this->getData('template')){
            $this->setTemplate($this->getData('template'));
        }
        return parent::_toHtml();
    }

    /**
     * Prepares Post Collection
     * @return type|void
     */
    public function _prepareCollection(){
        parent::_prepareCollection();
        if (is_numeric($this->getPostCount())){
            $this->getCollection()->setCurPage(0);
            $this->getCollection()->setPageSize($this->getPostCount());
        }

    }
}

