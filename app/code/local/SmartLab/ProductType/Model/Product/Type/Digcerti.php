<?php

/**
 * 
 * @author Branko Ajzele
 * 
 * Mage_Catalog_Model_Product_Type_Abstract
 * 
 * Mage_Catalog_Model_Product_Type_Simple
 * Mage_Catalog_Model_Product_Type_Virtual
 * Mage_Catalog_Model_Product_Type_Configurable
 * Mage_Catalog_Model_Product_Type_Grouped
 *
 */

class SmartLab_ProductType_Model_Product_Type_Digcerti extends Mage_Catalog_Model_Product_Type_Abstract
{
	public function save($product= null){
		$option = array(
        'title' => 'Level',
        'type' => 'drop_down',
        'is_require' => 1,
        'previous_type' => null,
        'previous_group' => 'select',
        'price_type' => 'fixed',
        'sku' => 'digcerti_level',
        'values' => array(
          array(
            'title' => "Platinum",
            'price' => 6.00,
            'price_type' => 'fixed',
            'sku' => "1",
            'sort_order' => '1'
          ),
          array(
            'title' => "Gold",
            'price' => 5.00,
            'price_type' => 'fixed',
            'sku' => "2",
            'sort_order' => '2'

          ),
          array(
            'title' => "Silver",
            'price' => 4.00,
            'price_type' => 'fixed',
            'sku' => "3",
            'sort_order' => '3'

          ),
          array(
            'title' => "Bronze",
            'price' => 0.00,
            'price_type' => 'fixed',
            'sku' => "4",
            'sort_order' => '4'

          )
        )
    );
        //Add digcerti_level custom option if it's not exist
        $productId=$product->getId();
        $optionCount = Mage::getModel('catalog/product_option')->getCollection()
                                                               ->addFieldToFilter('product_id', $productId)
                                                               ->addFieldToFilter('sku', 'digcerti_level')
                                                               ->count();
        if($optionCount<1){
            $product->setCanSaveCustomOptions(true);
            $product->setHasOptions(1);
            $optionInstance = $product->getOptionInstance();
            $optionInstance->unsetOptions();
            $optionInstance->addOption($option);
            $optionInstance->setProduct($product);
        }
        return $this;
	}
}