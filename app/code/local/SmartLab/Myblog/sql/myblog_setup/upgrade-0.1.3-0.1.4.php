<?php
/**
 * Created by PhpStorm.
 * User: smilelife.9x
 * Date: 07/27/2016
 * Time: 11:43 PM
 */

$installer = $this;
$installer->startSetup();

$installer->run("
    INSERT INTO `neotheme_blog_tag` (`status`, `name`, `index`)VALUES
    ('1', 'pho', '0'),
    ('1', 'viet nam', '0'),
    ('1', 'material', '0'),
    ('1', 'fresh', '0'),
    ('1', 'ebook', '0'),
    ('1', 'cooking', '0'),
    ('1', 'cooking appliances', '0'),
    ('1', 'microwave', '0'),
    ('1', 'customized', '0'),
    ('1', 'meals', '0');

");
$installer->endSetup();