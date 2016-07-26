<?php

$installer = $this;
$installer->startSetup();
$installer->run("
INSERT INTO `cms_block` (`block_id`, `title`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`) VALUES
(4, 'Number Phone', 'position-01', '<div class=\"phone\">Need support ? (+123) 546 455</div>', '2014-08-04 07:28:53', '2014-08-07 03:36:16', 1),
(5, 'JM Slideshow', 'position-02', '<div class=\"jm-home-slideshow\">{{block type=\"joomlart_jmslideshow/list\" name=\"home.jmslideshow.list\" }}</div>', '2014-08-04 07:31:30', '2014-08-04 07:31:30', 1),
(6, 'Our Special Foods', 'position-03', '<div class=\"home-our-special\">{{block type=\"joomlart_jmproducts/list\" title=\"Our Special Foods\" name=\"home.jmproducts.our-special\" quanlity=\"4\" perrow=\"2\" max=\"100\" template=\"joomlart/jmproducts/specials.phtml\"}}</div>', '2014-08-04 08:10:14', '2014-08-28 08:25:37', 1),
(7, 'Hot Foods', 'position-04', '<div class=\"home-jmcategorylist\">{{block type=\"joomlart_jmcategorylist/list\" name=\"home.jmcategorylist.list\"}}</div>', '2014-08-05 02:06:09', '2014-08-26 04:51:18', 1),
(8, 'Desserts', 'position-05', '<div>{{block type=\"joomlart_jmproducts/list\" name=\"Desserts\" title=\"Desserts\" catsid=\"4\"}}</div>', '2014-08-05 02:18:30', '2014-08-22 07:09:13', 1),
(9, 'Pizza-pasta', 'position-06', '<div>{{block type=\"joomlart_jmproducts/list\" name=\"Pizza-pasta\" title=\"Pizza-pasta\" catsid=\"5\"}}</div>', '2014-08-05 02:19:01', '2014-08-22 07:09:33', 1),
(10, 'Seafood', 'position-07', '<div>{{block type=\"joomlart_jmproducts/list\" name=\"Seafood\"  title=\"Seafood\" catsid=\"6\"}}</div>', '2014-08-05 02:21:04', '2014-08-22 07:09:48', 1),
(11, 'Cooking With Love & Passion', 'position-08', '<div class=\"cooking-with-love\">\r\n<div class=\"main\"><span class=\"cooking-title ub fadeInLeft\">Cooking With<br />Love &amp; Passion</span> <span class=\"cooking-desc ub fadeInLeft\">A day made in heaven for those who love baking<br />prepare cakes using a variety of techniques.</span></div>\r\n</div>', '2014-08-05 07:28:55', '2014-08-27 03:34:48', 1),
(12, 'Book Table', 'position-09', '<h4 class=\"ub fadeInUp\">Ok, I&rsquo;m ready Book Table</h4>\r\n<p class=\"ub fadeInUp\"><a class=\"btn-book\" href=\"{{store direct_url=\"\"}}appetizers.html\">Book now</a></p>', '2014-08-05 07:45:09', '2014-08-26 07:29:21', 1),
(13, 'Working Hours', 'position-10', '<div class=\"block block-working col-1\">\r\n<div class=\"block-title\"><strong><span>Working Hours</span></strong></div>\r\n<div class=\"block-content\">\r\n<ul>\r\n<li>Monday - Saturday</li>\r\n<li>8am - 10pm</li>\r\n<li>Sunday</li>\r\n<li>1pm - 10pm</li>\r\n</ul>\r\n</div>\r\n</div>', '2014-08-05 08:15:06', '2014-08-26 04:46:00', 1),
(14, 'Information', 'position-11', '<div class=\"block block-information col-2\">\r\n<div class=\"block-title\"><strong><span>Information</span></strong></div>\r\n<div class=\"block-content\">\r\n<ul>\r\n<li><a href=\"{{store direct_url=\"\"}}about-us\">About Us</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}contacts\">Contact Us</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}customer-service\">Terms &amp; Conditions</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}privacy-policy\">Privacy Policy</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}sales/guest/form\">Orders and Returns</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}catalog/seo_sitemap/category\">Site Map</a></li>\r\n</ul>\r\n</div>\r\n</div>', '2014-08-05 08:17:12', '2014-08-26 04:45:47', 1),
(15, 'My account', 'position-12', '<div class=\"hr2\">&nbsp;</div>\r\n<div class=\"block block-my-account col-3\">\r\n<div class=\"block-title\"><strong><span>My account</span></strong></div>\r\n<div class=\"block-content\">\r\n<ul>\r\n<li><a href=\"{{store direct_url=\"\"}}customer/account/login/\">Sign In</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}checkout/cart/\">View Cart</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}wishlist\">My Wishlist</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}sales/guest/form\">Track My Order</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}catalogsearch/advanced/\">Advanced Search</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}contacts\">Help</a></li>\r\n</ul>\r\n</div>\r\n</div>', '2014-08-05 08:21:38', '2014-08-26 04:45:32', 1),
(16, 'Help & More', 'position-13', '<div class=\"hr\">&nbsp;</div>\r\n<div class=\"block block-help-more col-4\">\r\n<div class=\"block-title\"><strong><span>Help &amp; More</span></strong></div>\r\n<div class=\"block-content\">\r\n<ul>\r\n<li><a href=\"{{store direct_url=\"\"}}sales/guest/form\">Returns</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}customer-service\">F.A.Q</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}privacy-policy\">Shipping Policy</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}catalogsearch/term/popular/\">Search Terms</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}contacts\">Contact Us</a></li>\r\n</ul>\r\n</div>\r\n</div>', '2014-08-05 08:22:58', '2014-08-26 04:45:19', 1),
(17, 'Sign up for emails', 'position-14', '<div class=\"hr3\">&nbsp;</div>\r\n<div>{{block type=\"newsletter/subscribe\" name=\"left.newsletter\" template=\"newsletter/subscribe.phtml\"}}</div>', '2014-08-05 08:24:36', '2014-08-26 04:45:05', 1),
(18, 'Socials', 'position-15', '<div class=\"block-social\">\r\n<ul class=\"social-list\">\r\n<li class=\"facebook\"><a href=\"http://www.facebook.com/joomlart\">Facebook</a></li>\r\n<li class=\"twitter\"><a href=\"https://twitter.com/JoomlArt\">Twitter</a></li>\r\n<li class=\"google\"><a href=\"http://feeds.feedburner.com/joomlart/magento\">Google Plus</a></li>\r\n</ul>\r\n</div>', '2014-08-05 09:17:40', '2014-08-26 04:44:52', 1),
(19, 'Footer links', 'footer_links', '<ul class=\"footer-links\">\r\n<li><a href=\"{{store direct_url=\"\"}}privacy-policy\">Privacy Policy</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}customer-service\">Terms</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}contacts\">FAQs</a></li>\r\n<li><a href=\"{{store direct_url=\"\"}}catalog/seo_sitemap/category\">Sitemap</a></li>\r\n</ul>', '2014-08-05 09:40:45', '2014-08-13 02:37:02', 1),
(20, 'Mega Banner', 'mega-banner', '<div class=\"mega-banner\"><img src=\"{{media url=\"wysiwyg/banners/mega-banner.jpg\"}}\" alt=\"Mega Banner\" /></div>', '2014-08-06 09:11:21', '2014-08-06 09:11:21', 1),
(21, 'Mega one product', 'mega-one-product', '<div class=\"mega-one-jmproducts\">{{block type=\"joomlart_jmproducts/list\" name=\"mega.jmproducts.list\" template=\"joomlart/jmproducts/oneproduct.phtml\" quanlity=\"1\" quanlitytable=\"1\"}}</div>', '2014-08-06 09:57:42', '2014-08-06 09:57:42', 1),
(22, 'Mega two products', 'mega-two-products', '<div class=\"mega-two-jmproducts\">{{block type=\"joomlart_jmproducts/list\" name=\"mega.jmproducts.list\" template=\"joomlart/jmproducts/twoproduct.phtml\" quanlity=\"2\" quanlitytable=\"2\"}}</div>', '2014-08-06 09:58:51', '2014-08-07 04:24:09', 1),
(23, 'Google Map', 'position-16', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5442701.766085238!2d-121.173541!3d48.23416900000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6af9b3074e327675!2sMt.+Baker-Snoqualmie+National+Forest!5e0!3m2!1sen!2sus!4v1408069383659\" width=\"1600\" height=\"490\" frameborder=\"0\" style=\"border:0\"></iframe>', '2014-08-15 02:21:26', '2014-08-15 02:24:03', 1),
(24, 'Contact info', 'contact-info', '<div class=\"contact-info\">\r\n<h2>Find Us</h2>\r\n<img src=\"{{media url=\"wysiwyg/contact-photo.jpg\"}}\" alt=\"Find Us\" />\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel sapien non nunc semper tincidunt sed id lacus.</p>\r\n<ul>\r\n<li class=\"add\">Add: 108 Street, AZ District, Green City</li>\r\n<li class=\"tel\">Tel: +123 456 7890</li>\r\n<li class=\"email\">Email: yourcompany@gmail.com</li>\r\n</ul>\r\n</div>', '2014-08-15 03:23:07', '2014-08-15 03:24:38', 1),
(25, 'Colors', 'colors', '<div class=\"colors-setting\"><label>Colors:</label> <a class=\"colors-default\" title=\"Default\" href=\"{{store url=\"\"}}?jmcolor=default\"><span>default</span></a> <a class=\"colors-green\" title=\"Green\" href=\"{{store url=\"\"}}?jmcolor=green\"><span>green</span></a> <a class=\"colors-brown\" title=\"Brown\" href=\"{{store url=\"\"}}?jmcolor=brown\"><span>Brown</span></a> <a class=\"colors-orange\" title=\"Orange\" href=\"{{store url=\"\"}}?jmcolor=orange\"><span>orange</span></a> <a class=\"colors-red\" title=\"Red\" href=\"{{store url=\"\"}}?jmcolor=red\"><span>red</span></a></div>', '2014-08-26 03:56:45', '2014-08-27 04:22:32', 1),
(26, 'Special offer description', 'special-description', '<h3 class=\"ub fadeInUp\">The smoothies are made from superior ingredients <br /> including real fruit and natural sugar.</h3>', '2014-08-27 02:39:17', '2014-08-27 02:45:39', 1),
(27, 'Menu Description', 'menu-description', '<h3 class=\"ub fadeInUp\">Feeling adventurous, add a floating shot <br /> to the top&nbsp; with a jello shot.</h3>', '2014-08-27 02:40:02', '2014-08-27 02:47:01', 1),
(28, 'Cookie restriction notice', 'cookie_restriction_notice_block', '<p>This website requires cookies to provide all of its features. For more information on what data is contained in the cookies, please see our <a href=\"{{store direct_url=\"privacy-policy-cookie-restriction-mode\"}}\">Privacy Policy page</a>. To accept cookies from this site, please click the Allow button below.</p>', '2014-08-01 08:35:45', '2014-08-01 08:35:45', 1);
    ");

$installer->endSetup(); 