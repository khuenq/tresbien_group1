<?php
/**
 * Created by PhpStorm.
 * User: smilelife.9x
 * Date: 07/27/2016
 * Time: 5:39 PM
 */

$installer = $this;
$installer->startSetup();
$stores = array(2,3,4,5,6,7);
foreach ($stores as $storeId)
{//var_dump($storeId);die;
        // add blog for Foods and Beverages in all store
        $cateCollection = Mage::getModel('myblog/category')->getCollection()
            ->addFieldToFilter('store_ids', $storeId)
            ->addFieldToFilter('name', 'Foods and Beverages');
        foreach ($cateCollection as $item) {
            $cateId = $item->getId();

            $installer->run("

            INSERT INTO `neotheme_blog_post` (`status`, `title`, `author`, `post_date`, `summary`, `content_html`,`store_ids`, `category_ids`, `tag_ids`) VALUES
            ('1', 'Pho: Special food from VietNam', 'Nguyen Thi Huong', '2017-07-27', 'Pho Vietnam is one of the best food in the world!', 'Who interested in cooking, see now??? Cooking ebook is in your own.Introduction This is a listing of 126 sites that legally offer free Cooking, Food & Wine ebooks, recipes online and food blogs.There is also a listing here ofPlaces For Free Cooking, Food & Wine Audiobooks & VideosAll of these sites listed have content that is legal for them to distribute.  If you find that any site listed is offering content that can not be legally transferred, please let me know in the comments below.',$storeId, $cateId, 'pho, viet nam');

        ");
        }

    // add blog for Materials in all store
    $cateCollection = Mage::getModel('myblog/category')->getCollection()
        ->addFieldToFilter('store_ids', $storeId)
        ->addFieldToFilter('name', 'Materials');
    foreach ($cateCollection as $item) {
        $cateId = $item->getId();

        $installer->run("

            INSERT INTO `neotheme_blog_post` (`status`, `title`, `author`, `post_date`, `summary`, `content_html`,`store_ids`, `category_ids`, `tag_ids`) VALUES
            ('1', 'How to choose freshe Fruits and Vegetables to prepare your meal!', 'Nguyen Thi Huong', '2017-07-27', 'When you buy produce, you want the most for your money. But fruits and vegetables don’t come with an expiration date. I’ve collected these tips for helping you choose the freshest fruits and vegetables.', 'Onions: Should be heavy and hard, with dark skins and no sprouting.Garlic: Old garlic will also start to sprout.Grapes: Lift up the package and look from underneath. As grapes ripen, they fall off the bunch so a lot of loose grapes means they are very ripe.Strawberries: Firm and without too strong a smell. Always sort strawberries as soon as you get home.Citrus fruits like lemons, oranges, grapefruits,tangerines: Fresh smell and no soft spots. ',$storeId, $cateId, 'material, fresh');

            ");
    }

    // add blog for Receipt e-Book in all store
    $cateCollection = Mage::getModel('myblog/category')->getCollection()
        ->addFieldToFilter('store_ids', $storeId)
        ->addFieldToFilter('name', 'Receipt e-Book');
    foreach ($cateCollection as $item) {
        $cateId = $item->getId();

        $installer->run("

            INSERT INTO `neotheme_blog_post` (`status`, `title`, `author`, `post_date`, `summary`, `content_html`,`store_ids`, `category_ids`, `tag_ids`) VALUES
            ('1', 'Latest Ebook for cooking.', 'Nguyen Thi Huong', '2017-07-27', 'Who interested in cooking, see now??? Cooking ebook is in your own.', 'Introduction This is a listing of 126 sites that legally offer free Cooking, Food & Wine ebooks, recipes online and food blogs.There is also a listing here ofPlaces For Free Cooking, Food & Wine Audiobooks & Video All of these sites listed have content that is legal for them to distribute.  If you find that any site listed is offering content that can not be legally transferred, please let me know in the comments below.This list is not comprehensive and if you know of any other sites please post in the comments below or at our forums.A comprehensive alphabetical listing of free books for reading or listening can be found on these pages:Best Free eBooks Online  (913 sites)Best Free Audio Books Online  (224 Sites)For a complete listing of the free ebook pages here at Gizmos, see',$storeId, $cateId, 'ebook, cooking');

            ");
    }

    // add blog for Cooking Appliances in all store
    $cateCollection = Mage::getModel('myblog/category')->getCollection()
        ->addFieldToFilter('store_ids', $storeId)
        ->addFieldToFilter('name', 'Cooking Appliances');
    foreach ($cateCollection as $item) {
        $cateId = $item->getId();

        $installer->run("

            INSERT INTO `neotheme_blog_post` (`status`, `title`, `author`, `post_date`, `summary`, `content_html`,`store_ids`, `category_ids`, `tag_ids`) VALUES
            ('1', 'Cooking Appliances help much more.', 'Nguyen Thi Huong', '2017-07-27', 'Have all cooking appliances in your home.', 'It’s the most popular gathering spot in the house! Make if functional, elegant and energy-efficient with LG kitchen appliances:Refrigerators: From French door, to side-by-side, traditional to bottom-freezer designs, LG has one of the largest and most innovative selections of refrigerators. And with LG`s exclusive Linear Compressor technology, you’ll get optimum cooling, operating efficiency and reliability.Ranges and ovens: Choose from a huge variety of gas and electric ovens and ranges, including the largest single oven in the industry. They’re more than ready for your most ambitious meals. Explore kitchen appliances designed to make cooking easy and life good.Cooktops: Boasting features including stainless steel trim, Smooth Touch™ controls, induction bridge elements and premium-grade griddles, LG cooktops truly are style and convenience in perfect harmony.Microwave ovens: With innovative features like Easy Clean® interiors for quick, high-performance cleaning without chemicals, plus Sensor Cook technology, you can find a stylish LG microwave oven that’s just right for your home.Dishwashers: Dish duty just got easier. Browse LG dishwashers with intuitive controls that let you enter your desired settings with the touch of a finger.',$storeId, $cateId, 'cooking appliances, microwave');

            ");
    }

    // add blog for Customized Meals in all store
    $cateCollection = Mage::getModel('myblog/category')->getCollection()
        ->addFieldToFilter('store_ids', $storeId)
        ->addFieldToFilter('name', 'Customized Meals');

    foreach ($cateCollection as $item) {
        $cateId = $item->getId();

        $installer->run("

            INSERT INTO `neotheme_blog_post` (`status`, `title`, `author`, `post_date`, `summary`, `content_html`,`store_ids`, `category_ids`, `tag_ids`) VALUES
            ('1', 'Customized Meals: Which choice is the best mix.', 'Nguyen Thi Huong', '2017-07-27', 'Make your meal different and strange food from all over the world', 'To help you decide which nutrition type is best for your goals, here is a description of each nutrition type in this free custom fitness meal planner:Medium Carb nutrition means a fair amount of high quality carbohydrates, typically with 40%-50% coming from quality complex carbohydrates. Most bodybuilders who are bulking or are doing a slight cut (say, less than 15% reduction) will use this nutritional plan. The carbohydrate sources are from things like legumes, whole grains, vegetables, and fruits. This type of nutrition is great for those who are very active and need quality energy sources and for those who seek to maintain their weight or those who are bulking. It can be used if you are cutting to lower your bodyfat but it can be problematic when used in this way but this is a very healthy nutritional plan to live on 365 days a year.Low carb nutrition means very limited carbohydrates, typically 15%-25%. The carbohydrate sources in a low carb diet are from vegetables rather than from very starchy things like breads, legumes, fruits, and whole grains. Low carb diets are of most value when you are trying to lower you bodyweight and remove fat. There are many diets out there that have their own little twist on the low-carb angle but they are all similar to this. A Word of warning about my version of low carb nutrition is in order. Many low carb diets out there let you get away with nutritional murder, not me. You will not find bacon anywere on my list of foods, nor salami, nor deep fried pork rinds, nor cheese. Low carb diets by necessity need to have lots of fat in them but the fat I put into these meals are very healthy fats. In addition, a lot of the low carb diets out there are completely void of vegetables and any sort of fiber at all which can lead to significant digetstional tract health issues, again, not a problem with my healthy version of low carb here. You can bet that these low carb meals will be packed with healthy low net carb vegetables so it makes this nutritional plan healthy to maintain long term if desired. Although you could use low carb for bulking and gaining weight, I dont recommend this.',$storeId, $cateId, 'customized, meals');

            ");
    }

}


$installer->endSetup();