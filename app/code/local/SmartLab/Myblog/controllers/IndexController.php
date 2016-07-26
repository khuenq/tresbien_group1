<?php

class SmartLab_Myblog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function postTagAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}