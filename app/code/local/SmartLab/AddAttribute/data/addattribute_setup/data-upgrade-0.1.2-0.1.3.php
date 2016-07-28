 <?php
 $installer=$this;
 $installer->startSetup();
 try{
        //Get type product
        $entityTypeId = Mage::getModel('catalog/product')
          ->getResource()
          ->getEntityType()
          ->getId();

        //Load csv file
        $file = 'productdata.csv';
        $csv = new Varien_File_Csv();
        $data = $csv->getData($file);



        for($i=1; $i<count($data); $i++){
        //Get id 
	        $attributeSetId = Mage::getModel('eav/entity_attribute_set')
	                    ->getCollection()
	                    ->setEntityTypeFilter($entityTypeId)
	                    ->addFieldToFilter('attribute_set_name', $data[$i][0])
	                    ->getFirstItem()
	                    ->getId();
	        $webId= Mage::getModel('core/website')->load($data[$i][11],'name')->getId();
	        $cateId1=Mage::getModel('catalog/category')->getCollection()->addFieldToFilter('name', $data[$i][8])->getFirstItem()->getId();
	        $cateId2=Mage::getModel('catalog/category')->getCollection()->addFieldToFilter('name', $data[$i][9])->getFirstItem()->getId();
	        $cateId3=Mage::getModel('catalog/category')->getCollection()->addFieldToFilter('name', $data[$i][10])->getFirstItem()->getId();

	    	//create new product
		    $newProduct = new Mage_Catalog_Model_Product();
		    $newProduct->setAttributeSetId($attributeSetId)
		    		->setTypeId($data[$i][1])
	               ->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
	               ->setTaxClassId($data[$i][2])
	               ->setCreatedAt(strtotime('now'))
	               ->setName($data[$i][3])
	               ->setSku($data[$i][4])
	               ->setWeight($data[$i][5])
	               ->setStatus($data[$i][6])
	               ->setPrice($data[$i][7])
	               ->setCategoryIds(array($cateId1,$cateId2,$cateId3))
	               ->setWebsiteIds(array($webId))
	               ->setDescription($data[$i][12])
	               ->setShortDescription($data[$i][13])
	               ->setMetaTitle('fdasd')
	               ->setMetaKeyword('i')
	               ->setMetaDescription('daf')
	               ->setStockData(array(
	                                   'use_config_manage_stock' => 0, //'Use config settings' checkbox
	                                   'manage_stock'=>1, //manage stock
	                                   'min_sale_qty'=>1, //Minimum Qty Allowed in Shopping Cart
	                                   'max_sale_qty'=>2, //Maximum Qty Allowed in Shopping Cart
	                                   'is_in_stock' => 1, //Stock Availability
	                                   'qty' => 999 //qty
	                                   )
	               )
	                ->setSetupFee(4)
	                ->setExpiryDate($data[$i][14])
	                ->setCalories(10)
	                ->setIngredients($data[$i][15])
	                ->setBrand($data[$i][16])
	                ->setMediaGallery (array('images'=>array (), 'values'=>array ()))
    				->addImageToMediaGallery('media/catalog/product/d/o/'.$data[$i][17], array('image','thumbnail','small_image'), true, true) //
	               ->setsetupCost(4);
	    	$newProduct->save();
    	}



}catch(Exception $e){
     $result['status'] = 3;
     $result['message'] = $e->getMessage();
     echo json_encode($result);
     return;
}
$installer->endSetup();