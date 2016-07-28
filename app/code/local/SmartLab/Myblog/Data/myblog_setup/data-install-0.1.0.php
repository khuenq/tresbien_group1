<?php
/*
 * run data script to add category of post allow customer to choose
 */
$installer = $this;
$installer->startSetup();
$stores = Mage::app()->getStores();
foreach ($stores as $storeId => $store) {
    if ($storeId != 1) {
        $installer->run("

        INSERT INTO `neotheme_blog_category` (`status`, `name`, `store_ids`, `cms_identifier`, `root_template`)VALUES
        ('1', 'Foods and Beverages', '$storeId', 'food-beverage', 'one_column'),
        ('1', 'Materials', '$storeId', 'materials', 'one_column'),
        ('1', 'Receipt e-Book', '$storeId', 'recipe-ebooks', 'one_column'),
        ('1', 'Cooking Appliances', '$storeId', 'cooking-appliances', 'one_column'),
        ('1', 'Customized Meals', '$storeId', 'customized-meals', 'one_column');

        ");
    }
}


$installer->endSetup();