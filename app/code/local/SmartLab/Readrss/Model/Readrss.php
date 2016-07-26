<?php

class SmartLab_Readrss_Model_Readrss extends Mage_Core_Model_Abstract
{
  public function listContent()
  {
    $feeds= new Zend_Feed_Rss('http://feeds.feedburner.com/smittenkitchen');
    return $feeds;
  }
}