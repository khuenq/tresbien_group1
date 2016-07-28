<?php
/**
 * Created by PhpStorm.
 * User: smilelife.9x
 * Date: 07/27/2016
 * Time: 5:33 PM
 */
//die(kkkkkkkkkkk);
$installer = $this;
$installer->startSetup();
    $installer->run("

    INSERT INTO `neotheme_blog_post` (`status`, `title`, `author`, `post_date`, `summary`, `content_html`,`store_ids`, `category_ids`, `tag_ids`) VALUES
        ('1', 'Pho: Special food from VietNam', 'Nguyen Thi Huong', '2017-07-27', 'Pho Vietnam is one of the best food in the world!', '22222','2', '3', 'pho, viet nam');
    ");


$installer->endSetup();