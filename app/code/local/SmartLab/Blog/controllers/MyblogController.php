<?php

/**
 * NeoTheme (Neo Industries Pty Ltd)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to Neo Industries Pty LTD Non-Distributable Software Modification License (NDSML)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.neotheme.com/legal/licenses/NDSM.html
 * If the license is not included with the package or for any other reason, 
 * you did not receive your licence please send an email to 
 * license@neotheme.com so we can send you a copy immediately.
 *
 * This software comes with no warrenty of any kind. By Using this software, the user agrees to hold 
 * Neo Industries Pty Ltd harmless of any damage it may cause.
 *
 * @category    modules
 * @module      NeoTheme_Blog
 * @copyright   Copyright (c) 2011 Neo Industries Pty Ltd (http://www.neotheme.com)
 * @license     http://www.neotheme.com/  Non-Distributable Software Modification License(NDSML 1.0)
 */
class SmartLab_Blog_MyblogController extends Mage_Core_Controller_Front_Action
{

    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function ViewAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function addNewAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function CreatePostAction()
    {
        $data = $this->getRequest()->getPost();
        $post = Mage::getModel('blog/post');
//        var_dump($data);die();
         $post->setData($data);
        try
        {
            $post->save();
        }
        catch(Exceptiion $e)
        {
        }
        $this->_redirect('blog/myblog/index');
    }

    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function editPostAction()
    {

    }

}