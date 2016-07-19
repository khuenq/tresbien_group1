<?php

$installer = $this;
$installer->startSetup();

$installer->run("
    ALTER TABLE neotheme_blog_tag
        ADD `index` int(11);

");
$installer->endSetup();