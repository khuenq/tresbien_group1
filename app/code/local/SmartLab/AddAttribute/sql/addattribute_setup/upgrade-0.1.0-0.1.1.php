
<?php

$installer = $this;
$installer->startSetup();

//FOOD $ BEVERAGES =====================================================================================================
$installer->addAttribute('catalog_product', 'calories', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'Calories',
    'input'             => 'text',
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => true,
    'unique'            => false,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'expiry_date', array(
    'type'              => 'datetime',
    'frontend'          => '',
    'label'             => 'Expiry date',
    'input'             => 'date',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'ingredients', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'Ingredients',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'brand', array(
    'type'              => 'int',
    'frontend'          => '',
    'label'             => 'Brand',
    'input'             => 'select',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'is_configurable'   => false,
    'option' => 
  array (
    'values' => 
    array (
      1 => 'Descendant of the Sun',
      2 => 'KFC',
      3 => 'McDonald',
      4 => 'Jesus',
      5 => 'Mario Bros',
      6 => 'Pho24',
      7 => 'Teo Kai Chym Singapore',
      8 => 'Phuc Dat Binh'
    ),
  ),
));



//MATERIALS=======================================================================================================
$installer->addAttribute('catalog_product', 'from_farm', array(
    'type'              => 'int',
    'frontend'          => '',
    'label'             => 'Brand',
    'input'             => 'select',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'is_configurable'   => false,
    'option' => 
  array (
    'values' => 
    array (
      1 => 'Bruce Lee',
      2 => 'Small Ville',
      3 => 'H.K.T',
      4 => 'S.T MTP Vietnam',
    ),
  ),
));

$installer->addAttribute('catalog_product', 'is_raw', array(
    'type'              => 'boolean',
    'frontend'          => '',
    'label'             => 'Brand',
    'input'             => 'select',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'is_configurable'   => false,
    'option' => 
  array (
    'values' => 
    array (
      0 => 'No',
      1 => 'Yes',
    ),
  ),
));



//E-BOOK=======================================================================================================
$installer->addAttribute('catalog_product', 'isbn', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'ISBN',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'author', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'Author',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'publisher', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'Publisher',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'book_type', array(
    'type'              => 'int',
    'frontend'          => '',
    'label'             => 'Book Type',
    'input'             => 'multiselect',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'is_configurable'   => false,
    'option' => 
  array (
    'values' => 
    array (
      1 => 'Cooking Recipe',
      2 => 'Nutrition Guides',
      3 => 'Electronic User Manual',
      4 => 'Chef Biography',
      5 => 'Others'
    ),
  ),
));

$installer->addAttribute('catalog_product', 'date_of_publishing', array(
    'type'              => 'datetime',
    'frontend'          => '',
    'label'             => 'Date of publishing',
    'input'             => 'date',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'is_configurable'   => false
));



//COOKING APPLIANCES=================================================================================================
$installer->addAttribute('catalog_product', 'voltage', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'Voltage',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'ca_brand', array(
    'type'              => 'varchar',
    'frontend'          => '',
    'label'             => 'Brand',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'is_configurable'   => false
));

$installer->addAttribute('catalog_product', 'manufacture_country', array(
    'type'              => 'int',
    'frontend'          => '',
    'label'             => 'Country of manufacture',
    'input'             => 'select',
    'class'             => '',
    'source'            => '',
    'visible'           => true,
    'required'          => false,
    'is_configurable'   => false,
    'option' => 
  array (
    'values' => 
    array (
      1 => 'Viet Nam',
      2 => 'Korea',
      3 => 'China'
    ),
  )
));

$installer->endSetup();