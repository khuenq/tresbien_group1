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
  `voucher_code` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

$installer->endSetup();