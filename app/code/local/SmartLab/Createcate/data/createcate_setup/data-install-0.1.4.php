<?php
//SET SECURE AND UNSECURE URL
$installer=$this;
    $installer->startSetup();
    $vnvalue='http://vn.local.tres-bien.com/';
    $cnvalue='http://cn.local.tres-bien.com/';
    $krvalue='http://kr.local.tres-bien.com/';

//Viet Nam
    $vnId = Mage::getModel('core/store_group')->load('vietnam','name')->getId();
    $installer->setConfigData('web/unsecure/base_url',$vnvalue,'websites',$vnId);
    $installer->setConfigData('web/secure/base_url',$vnvalue,'websites',$vnId);

//Korea
    $krId = Mage::getModel('core/store_group')->load('korea','name')->getId();
    $installer->setConfigData('web/unsecure/base_url',$krvalue,'websites',$krId);
    $installer->setConfigData('web/secure/base_url',$krvalue,'websites',$krId);
    $installer->endSetup();
     
//China
    $cnId = Mage::getModel('core/store_group')->load('china','name')->getId();
    $installer->setConfigData('web/unsecure/base_url',$cnvalue,'websites',$cnId);
    $installer->setConfigData('web/secure/base_url',$cnvalue,'websites',$cnId);