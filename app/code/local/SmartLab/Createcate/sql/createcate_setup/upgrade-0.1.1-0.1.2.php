<?php
try{
	//
	$rootDefaultId=1;
    $rootCategory = Mage::getModel('catalog/category');
    $rootCategory->setName('China');
    $rootCategory->setUrlKey('chinese-food');
    $rootCategory->setIsActive(1);
    $rootCategory->setDisplayMode('PRODUCTS');
    $rootCategory->setIsAnchor(1); //for active achor
    $rootCategory->setStoreId(Mage::app()->getStore()->getId());
    $parentCategory = Mage::getModel('catalog/category')->load($rootDefaultId);
    $rootCategory->setPath($parentCategory->getPath());
    $rootCategory->save();
    $rootId=$rootCategory->getId();



	    $firstCategory = Mage::getModel('catalog/category');
	    $firstCategory->setName('Foods and Beverages');
	    $firstCategory->setUrlKey('food-beverage');
	    $firstCategory->setIsActive(1);
	    $firstCategory->setDisplayMode('PRODUCTS');
	    $firstCategory->setIsAnchor(1); //for active achor
	    $firstCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($rootId);
	    $firstCategory->setPath($parentCategory->getPath());
	    $firstCategory->save();

	    //CATEGORY CẤP 2 CHO FODDS AND BEVERANGERS ===========>
	    $firstId=$firstCategory->getId();


	    	//Appetizers===================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Appetizers');
	    $secondCategory->setUrlKey('appetizer');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Breakfast=========================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Breakfast');
	    $secondCategory->setUrlKey('Breakfast');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Lunch=============================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Lunch');
	    $secondCategory->setUrlKey('lunch');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Dinner=============================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Dinner');
	    $secondCategory->setUrlKey('dinner');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Street Food===============================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Street Foods');
	    $secondCategory->setUrlKey('street-food');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Bakery=====================================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Bakery & Pastry');
	    $secondCategory->setUrlKey('bakery-pastry');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Pizzas
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Pizzas');
	    $secondCategory->setUrlKey('pizzas');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Traditional Sweet==============================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Traditional Sweet');
	    $secondCategory->setUrlKey('traditional-sweet');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();

	    	//Beverages=======================================
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Beverages');
	    $secondCategory->setUrlKey('beverages');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();




//LEVEL1: Materials
	    $firstCategory = Mage::getModel('catalog/category');
	    $firstCategory->setName('Materials');
	    $firstCategory->setUrlKey('materials');
	    $firstCategory->setIsActive(1);
	    $firstCategory->setDisplayMode('japan');
	    $firstCategory->setIsAnchor(1); //for active achor
	    $firstCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($rootId);
	    $firstCategory->setPath($parentCategory->getPath());
	    $firstCategory->save();

	    //LEVEL2:CATEGORY CẤP 2 CHO METERIALS ===========>
	    $firstId=$firstCategory->getId();

	    	//Meat
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Meat');
	    $secondCategory->setUrlKey('meat');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();
	    $secondId=$secondCategory->getId();

	    	//LEVEL3: Category for Meet
	    		//Meat cut to Order
	    	$thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Meats Cut to Order');
		    $thirdCategory->setUrlKey('meat-cut-order');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

		    	//Grinds, cube......
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Grinds, Cubed & Sausage');
		    $thirdCategory->setUrlKey('grind-cube-sausage');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

		    	//Prepped to Cook
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Prepped to Cook');
		    $thirdCategory->setUrlKey('prepped-cook');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

	    	//Vegetables
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Vegetables');
	    $secondCategory->setUrlKey('vegetables');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();
	    $secondId=$secondCategory->getId();

	    	//Seefood
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Seefood');
	    $secondCategory->setUrlKey('seefood');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();
	    $secondId=$secondCategory->getId();

	    	//LEVEL3:
	    		//seafood
	    	$thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Seafood');
		    $thirdCategory->setUrlKey('seafood');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

		    	//Prepped to cook
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Prepped to cook');
		    $thirdCategory->setUrlKey('prepped-cook');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

	    	//Cheese
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Cheese');
	    $secondCategory->setUrlKey('cheese');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();
	    $secondId=$secondCategory->getId();
	    	//LEVEL3
	    		//Cheese
	    	$thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Cheese');
		    $thirdCategory->setUrlKey('cheese');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();


		    	//Firmness
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Firmness');
		    $thirdCategory->setUrlKey('firmness');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

	    	//Fruit
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Fruit');
	    $secondCategory->setUrlKey('fruit');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();
	    $secondId=$secondCategory->getId();

	    	//LEVEL3
	    		//Pre-Cut
	    	$thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Pre-Cut');
		    $thirdCategory->setUrlKey('pre-cut');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

		    	//Tropical & Specialty
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Tropical & Specialty');
		    $thirdCategory->setUrlKey('troopical-specialty');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

	    	//Dairly
	    $secondCategory = Mage::getModel('catalog/category');
	    $secondCategory->setName('Dairy');
	    $secondCategory->setUrlKey('dairy');
	    $secondCategory->setIsActive(1);
	    $secondCategory->setDisplayMode('PRODUCTS');
	    $secondCategory->setIsAnchor(1); //for active achor
	    $secondCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($firstId);
	    $secondCategory->setPath($parentCategory->getPath());
	    $secondCategory->save();
	    $secondId=$secondCategory->getId();
	    	//LEVEL3
	    		//Butter & Magarine
	    	$thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Butter & Margarine');
		    $thirdCategory->setUrlKey('butter-margarine');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

		    	//Eggs
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Eggs');
		    $thirdCategory->setUrlKey('egg');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();

		    	//Cream & Creamers
		    $thirdCategory = Mage::getModel('catalog/category');
		    $thirdCategory->setName('Cream & Creamers');
		    $thirdCategory->setUrlKey('grind-cube-sausage');
		    $thirdCategory->setIsActive(1);
		    $thirdCategory->setDisplayMode('PRODUCTS');
		    $thirdCategory->setIsAnchor(1); //for active achor
		    $thirdCategory->setStoreId(Mage::app()->getStore()->getId());
		    $parentCategory = Mage::getModel('catalog/category')->load($secondId);
		    $thirdCategory->setPath($parentCategory->getPath());
		    $thirdCategory->save();



//LEVEL1====================================================
		//Recipe e-Books
	    $firstCategory = Mage::getModel('catalog/category');
	    $firstCategory->setName('Recipe e-Books');
	    $firstCategory->setUrlKey('recipe-ebook');
	    $firstCategory->setIsActive(1);
	    $firstCategory->setDisplayMode('PRODUCTS');
	    $firstCategory->setIsAnchor(1); //for active achor
	    $firstCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($rootId);
	    $firstCategory->setPath($parentCategory->getPath());
	    $firstCategory->save();

	    //Cooking Appliances
	    $firstCategory = Mage::getModel('catalog/category');
	    $firstCategory->setName('Cooking Appliances');
	    $firstCategory->setUrlKey('cooking-appliances');
	    $firstCategory->setIsActive(1);
	    $firstCategory->setDisplayMode('PRODUCTS');
	    $firstCategory->setIsAnchor(1); //for active achor
	    $firstCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($rootId);
	    $firstCategory->setPath($parentCategory->getPath());
	    $firstCategory->save();
	    
	    //Customized Meal
	    $firstCategory = Mage::getModel('catalog/category');
	    $firstCategory->setName('Customized Meals');
	    $firstCategory->setUrlKey('customized-meals');
	    $firstCategory->setIsActive(1);
	    $firstCategory->setDisplayMode('PRODUCTS');
	    $firstCategory->setIsAnchor(1); //for active achor
	    $firstCategory->setStoreId(Mage::app()->getStore()->getId());
	    $parentCategory = Mage::getModel('catalog/category')->load($rootId);
	    $firstCategory->setPath($parentCategory->getPath());
	    $firstCategory->save();


	} catch(Exception $e) {
	    print_r($e);
	}