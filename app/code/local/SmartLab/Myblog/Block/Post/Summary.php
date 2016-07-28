<?php

/**
 * Created by PhpStorm.
 * User: smilelife.9x
 * Date: 07/25/2016
 * Time: 10:41 AM
 */
class SmartLab_Myblog_Block_Post_Summary extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    function _construct()
    {
        $this->setTemplate('smartlab/myblog/post/summary.phtml');
    }
}