
<?php
/*
*ADD ATTRIBUTE SET
*/
//Get type is product
$installer=$this;
$installer->startSetup();
$skeletonID=$installer->getAttributeSetId('catalog_product','Default');
$entityTypeId = Mage::getModel('catalog/product')
      ->getResource()
      ->getEntityType()
      ->getId(); 

$dataAtt=array(
	'Foods & Beverages',
	'Materials',
	'e-Books', 
	'Cooking Appliances'
	);

//add attribute_set list
foreach ($dataAtt as $nameAtt) {
	$attributeSet = Mage::getModel('eav/entity_attribute_set')
                  ->setEntityTypeId($entityTypeId)
                  ->setAttributeSetName($nameAtt);

	$attributeSet->validate();
	$attributeSet->save();
	$attributeSet->initFromSkeleton($skeletonID)->save();
}
$installer->endSetup();



