<?php

$installer = $this;
$installer->startSetup();

$installer->run("

DROP TABLE IF EXISTS {$this->getTable('neotheme_customer_post')};
CREATE TABLE {$this->getTable('neotheme_customer_post')} (
  `entity_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 ALTER TABLE neotheme_blog_category
        DROP INDEX IDX_CMS_IDENTIFIER;
    ");


$installer->endSetup();
