<?php
$installer = $this;
$installer->startSetup();
$attArray = array('Foods & Beverages'=>array('calories','expiry_date','ingredients', 'brand'), 'Materials'=>array('from_farm','is_raw'), 'e-Books'=>array('isbn','author','publisher','book_type', 'date_of_publishing'), 'Cooking Appliances'=>array('voltage','ca_brand','manufacture_cauntry'));

$model=Mage::getModel('eav/entity_setup','core_setup');

foreach( $attArray as $groupItem => $attItems){
    //add attribute group to attributeset
    $attributeSetId=$model->getAttributeSetId('catalog_product',$groupItem);
    $installer->addAttributeGroup('catalog_product', $attributeSetId,$groupItem, 69);
    $attributeGroupId=$model->getAttributeGroup('catalog_product',$attributeSetId,$groupItem);
    foreach ($attItems as $item) {//add attribute to attribute group
        $attributeId=$model->getAttribute('catalog_product',$item);
        $installer->addAttributeToSet('catalog_product',$attributeSetId,$attributeGroupId['attribute_group_id'],$attributeId['attribute_id']);
    }
}
$installer->endSetup();