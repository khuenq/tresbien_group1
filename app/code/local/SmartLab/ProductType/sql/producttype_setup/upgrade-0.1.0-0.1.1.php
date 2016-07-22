<?php
$installer = $this;

$installer->startSetup();
$installer->run("
DROP TABLE IF EXISTS {$this->getTable('digcode')};
CREATE TABLE {$this->getTable('digcode')} (
  `code_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `code_value` varchar(50) NOT NULL,
  `voucher_id` int(11),
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

$installer->endSetup();