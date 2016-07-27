<?php
class SmartLab_Baokim_Model_Observer{
	public function saveQuoteBefore(){
		$post = Mage::app()->getFrontController()->getRequest()->getPost();
		if(isset($post['credit-card'])){
			$bank= $post['credit-card'];
			Mage::getSingleton('core/session')->setMySessionVariable($bank);
		}
		}
}