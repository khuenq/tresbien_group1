<?php
try{
//get root category's ID
    $vietCategory= Mage::getModel('catalog/category')
    ->getCollection()
    ->addFieldToFilter('name', 'Vietnam')->getFirstItem();
    $vietId= $vietCategory->getId();

    $koreaCategory=Mage::getModel('catalog/category')
    ->getCollection()
    ->addFieldToFilter('name', 'Korea')->getFirstItem();
    $koreaId=$koreaCategory->getId();

    $chinaCategory=Mage::getModel('catalog/category')
    ->getCollection()
    ->addFieldToFilter('name', 'China')->getFirstItem();
    $chinaId=$chinaCategory->getId();


//Add Website, store Group and Storeview
    //Viet Nam============================================
    $website = Mage::getModel('core/website');
    $website->setCode('vietnam')
        ->setName('vn.local.tres-bien.com')
        ->save();
    $storeGroup = Mage::getModel('core/store_group');
    $storeGroup->setWebsiteId($website->getId())
        ->setName('vietnam')
        ->setRootCategoryId($vietId)
        ->save();

    $store = Mage::getModel('core/store');
    $store->setCode('en_vietnam')
        ->setWebsiteId($storeGroup->getWebsiteId())
        ->setGroupId($storeGroup->getId())
        ->setName('English')
        ->setIsActive(1)
        ->save();

    $store = Mage::getModel('core/store');
    $store->setCode('vi_vietnam')
        ->setWebsiteId($storeGroup->getWebsiteId())
        ->setGroupId($storeGroup->getId())
        ->setName('Tiếng Việt')
        ->setIsActive(1)
        ->save();
    //Korea==================================================
    $website = Mage::getModel('core/website');
    $website->setCode('korea')
        ->setName('kr.local.tres-bien.com')
        ->save();
    $storeGroup = Mage::getModel('core/store_group');
    $storeGroup->setWebsiteId($website->getId())
        ->setName('korea')
        ->setRootCategoryId($koreaId)
        ->save();

    $store = Mage::getModel('core/store');
    $store->setCode('en_korea')
        ->setWebsiteId($storeGroup->getWebsiteId())
        ->setGroupId($storeGroup->getId())
        ->setName('English')
        ->setIsActive(1)
        ->save();

    $store = Mage::getModel('core/store');
    $store->setCode('kr_korea')
        ->setWebsiteId($storeGroup->getWebsiteId())
        ->setGroupId($storeGroup->getId())
        ->setName('Korean')
        ->setIsActive(1)
        ->save();

    //China=====================================================
    $website = Mage::getModel('core/website');
    $website->setCode('china')
        ->setName('cn.local.tres-bien.com')
        ->save();
    $storeGroup = Mage::getModel('core/store_group');
    $storeGroup->setWebsiteId($website->getId())
        ->setName('china')
        ->setRootCategoryId($chinaId)
        ->save();

    $store = Mage::getModel('core/store');
    $store->setCode('en_china')
        ->setWebsiteId($storeGroup->getWebsiteId())
        ->setGroupId($storeGroup->getId())
        ->setName('English')
        ->setIsActive(1)
        ->save();

    $store = Mage::getModel('core/store');
    $store->setCode('cn_china')
        ->setWebsiteId($storeGroup->getWebsiteId())
        ->setGroupId($storeGroup->getId())
        ->setName('Chinese')
        ->setIsActive(1)
        ->save();
    }catch(Exception $e){
        echo 'error: '.$e;
    }