<?php
class SmartLab_Baokim_Model_Standard extends Mage_Payment_Model_Method_Abstract {
	protected $_code = 'baokim';
	protected $_formBlockType = 'baokim/form_pay';
	
	protected $_isInitializeNeeded      = true;
	protected $_canUseInternal          = true;
	protected $_canUseForMultishipping  = false;
	
	public function getOrderPlaceRedirectUrl() {
		return Mage::getUrl('baokim/payment/redirect', array('_secure' => true));
	}
	public function assignData($data)
	{
		if (!($data instanceof Varien_Object)) {
			$data = new Varien_Object($data);
		}
		$info = $this->getInfoInstance();
		$info->setCheckNo($data->getCheckNo())
				->setCheckDate($data->getCheckDate());
		return $this;
	}

	
}
?>