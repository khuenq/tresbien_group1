<?php
/**
 * Created by PhpStorm.
 * User: smilelife.9x
 * Date: 07/27/2016
 * Time: 11:26 PM
 */
$installer = $this;
$installer->startSetup();
$arr = array(2, 3);
$collection = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('store_ids', array('in' => $arr));
foreach ($collection as $item) {
    $id = $item->getId();
    $installer->run("
        INSERT INTO `neotheme_customer_post` (`customer_id`, `post_id`) VALUES ('3', $id);
    ");
}

$arr = array(4, 5);
$collection = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('store_ids', array('in' => $arr));
foreach ($collection as $item) {
    $id = $item->getId();
    $installer->run("
        INSERT INTO `neotheme_customer_post` (`customer_id`, `post_id`) VALUES ('5', $id);
    ");
}

$arr = array(6, 7);
$collection = Mage::getModel('myblog/post')->getCollection()->addFieldToFilter('store_ids', array('in' => $arr));
foreach ($collection as $item) {
    $id = $item->getId();
    $installer->run("
        INSERT INTO `neotheme_customer_post` (`customer_id`, `post_id`) VALUES ('2', $id);
    ");
}



$installer->endSetup();