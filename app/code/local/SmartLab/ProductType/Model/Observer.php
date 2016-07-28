<?php

class SmartLab_ProductType_Model_Observer
{   
    //public $cartProduct= Mage::getModel('catalog/product'); 
    public $cartProduct;
    public function hookIntoGetFinalPrice($observer)
    {
    $event = $observer->getEvent();
    $product = $event->getProduct(); 
    if($product->getTypeId()=='digcerti'){
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {

                Mage::getSingleton('core/session')->addSuccess('You will need to login to buy this product');
            }else{
                $customer = Mage::getSingleton('customer/session')->getCustomer();
                $digList=Mage::getModel('producttype/digcode')->getCollection()
                ->addFieldToFilter('customer_id',$customer->getId())
                ->addFieldToFilter('product_id', $product->getId());
                if(count($digList)>0){
                    Mage::getSingleton('core/session')->addSuccess('You already have this product, sure that you want to replace it !');
                }
            }
        }
    }
    public function hookIntoCatalogProductTypePrepare($observer)
    {
        $event = $observer->getEvent();
        $quoteItem = $event->getQuoteItem();
        $product = $quoteItem->getProduct();
        $digModel=Mage::getModel('producttype/digcode');
        if($product->getTypeId()=='digcerti'){
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                Mage::throwException('You need to login first');
            }else{
                if($product->getQty()>1){// can not choose more than 1 item to cart
                    Mage::throwException('You only add 1 checkout for this product');
                 }else{
                    $cardList=$this->cardProduct;
                    foreach ($this->cartProduct as $item) {
                        $check=0;
                        if($item->getProduct()->getId()==$product->getId()){
                             $check=1;
                             break;
                        }
                    }
                    if($check==1) Mage::throwException('You only can chose 1 item for this product, need to remove existed item'.$product->getSku());
                }
            }
        }
        
    }


//Create Code and do something else after checkout successfully
    public function hookIntoCheckoutSuccess($observer)
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        $cusId = $customer->getId();
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        $order = Mage::getSingleton('sales/order');
        $order->load($lastOrderId);
        //if($order->getStatus()=='complete'||$order->getStatus()=='closed')
        {

            foreach ($order->getAllItems() as $item) {
                if ($item->getProduct()->getTypeId()=='digcerti'){
                    //get end_date
                    $date = new Zend_Date(Mage::getModel('core/date')->date());
                    $date->addDay('60');
                    //======

                    //Insert data to digcode table - manage Code and voucher code======================================================
                    $itemProduct=$item->getProduct();
                    $sku=$item->getSku();
                    $dcProduct=array('customer_id'=>$cusId, 
                        'product_id'=>$item->getProduct()->getId(), 
                        'level'=>$sku[strlen($sku)-1],
                        'code_value'=>md5($cusId.Mage::getModel('core/date')->date('Y-m-d H:i:s').$sku), 
                        'voucher_code'=>md5($cusId.$date->toString('Y-M-d H:m:s').$sku),
                        'order_date'=>Mage::getModel('core/date')->date('Y-m-d'),
                        'start_date'=>Mage::getModel('core/date')->date('Y-m-d'),
                        'end_date'=>$date->toString('Y-M-d'),
                        'status'=>1
                        );

                    //==
                    $model = Mage::getModel('producttype/digcode');
                    $digCollection = $model->getCollection()
                    ->addFieldToFilter('customer_id',$customer->getId())
                    ->addFieldToFilter('product_id', $itemProduct->getId());
                    if(count($digCollection)>0){
                        $digId=$digCollection->getFirstItem()->getId();
                        $model->load($digId)->addData($dcProduct);
                        $model->setId($digId)->save();
                    }else{
                        $model->setData($dcProduct);
                        $model->save();
                    }

                    //send mail =====================================================================================================  
                    $body = "Hello ".$customer->getName().", Wre are Tre-bien these are your <br> Digital Certification code:".$dcProduct['code_value']."<br> Voucher code: ".$dcProduct['voucher_code'];
                    $mail = Mage::getModel('core/email');
                    $mail->setToName($customer->getName());
                    $mail->setToEmail($customer->getEmail());
                    $mail->setBody($body);
                    $mail->setSubject('[Digital Certification]');
                    $mail->setFromEmail('trebien@vn.local');
                    $mail->setFromName("Tre-bien");
                    $mail->setType('html');// You can use 'html' or 'text'

                    try {
                        $mail->send();
                        Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
                        //$this->_redirect('');
                    }
                    catch (Exception $e) {
                        Mage::getSingleton('core/session')->addError('Unable to send.');
                        $this->_redirect('');
                    }

                    //Add voucher code to coupon code to discount=======================================================================
                    $discountArray=array(50,20,10,5);
                    $dataCoupon = array(
                        'product_ids' => null,
                        'name' => sprintf('AUTO_GENERATION CUSTOMER_%s - DC discount', $cusId),
                        'description' => null,
                        'is_active' => 1,
                        'website_ids' => array(Mage::app()->getWebsite()->getId()),
                        'customer_group_ids' => array(1),
                        'coupon_type' => 2,
                        'coupon_code' => $dcProduct['voucher_code'],
                        'uses_per_coupon' => 1,
                        'uses_per_customer' => 1,
                        'from_date' => $dcProduct['start_date'],
                        'to_date' => $dcProduct['end_date'],
                        'sort_order' => null,
                        'is_rss' => 1,
                        'rule' => array(
                            'conditions' => array(
                                array(
                                    'type' => 'salesrule/rule_condition_combine',
                                    'aggregator' => 'all',
                                    'value' => 1,
                                    'new_child' => null
                                )
                            )
                        ),
                        'simple_action' => 'by_percent',
                        'discount_amount' => $discountArray[$dcProduct['level']],
                        'discount_qty' => 0,
                        'discount_step' => null,
                        'apply_to_shipping' => 0,
                        'simple_free_shipping' => 0,
                        'stop_rules_processing' => 0,
                        'rule' => array(
                            'actions' => array(
                                array(
                                    'type' => 'salesrule/rule_condition_product_combine',
                                    'aggregator' => 'all',
                                    'value' => 1,
                                    'new_child' => null
                                )
                            )
                        ),
                        'store_labels' => array('Digital Certification discount')
                    );
                     
                    $discountModel = Mage::getModel('salesrule/rule');
                    //$dataCoupon = $this->_filterDates($dataCoupon, array('from_date', 'to_date'));
                     
                    $validateResult = $discountModel->validateData(new Varien_Object($dataCoupon));
                     
                    if ($validateResult == true) {
                        if (isset($dataCoupon['simple_action']) && $dataCoupon['simple_action'] == 'by_percent'
                                && isset($data['discount_amount'])) {
                            $dataCoupon['discount_amount'] = min(100, $data['discount_amount']);
                        }
                     
                        if (isset($dataCoupon['rule']['conditions'])) {
                            $dataCoupon['conditions'] = $dataCoupon['rule']['conditions'];
                        }
                     
                        if (isset($dataCoupon['rule']['actions'])) {
                            $dataCoupon['actions'] = $dataCoupon['rule']['actions'];
                        }
                     
                        unset($dataCoupon['rule']);
                     
                        $discountModel->loadPost($dataCoupon);
                     
                        $discountModel->save();
                    }
                }
            }
        }
    }

    public function hookIntoFullPrepare($observer)
    {
        $this->cartProduct= Mage::getSingleton('checkout/session')->getQuote()->getAllItems();
    }   
    public function hookIntoCatalogProductNewAction($observer)
    {
        $product = $observer->getEvent()->getProduct();
        
        return $this;    	
    }
    
    public function hookIntoCatalogProductEditAction($observer)
    {
        $product = $observer->getEvent()->getProduct();
        return $this;    	
    }    
    
    //Add custom option in here====================================
    public function hookIntoCatalogProductPrepareSave($observer)
    {
        $event = $observer->getEvent();
        $product = $event->getProduct();
        if($product->getTypeId()=='digcerti')
        $product->setHasOptions(1);
        return $this;    	
    }


    public function hookIntoSalesOrderItemSaveAfter($observer)
    {
        return $this;   	
    }

    public function hookIntoSalesOrderSaveBefore($observer)
    {
        return $this;    	
    }     
    
    public function hookIntoSalesOrderSaveAfter($observer)
    {
        $product = $observer->getEvent()->getProduct();
        return $this;    	
    } 

    public function hookIntoCatalogProductDeleteBefore($observer)
    {
        $product = $observer->getEvent()->getProduct();
        return $this;    	
    }    
    
    public function hookIntoCatalogruleBeforeApply($observer)
    {
        return $this;    	
    }  

    public function hookIntoCatalogruleAfterApply($observer)
    {
        return $this;    	
    }    
    
    public function hookIntoCatalogProductSaveAfter($observer)
    {
        $product = $observer->getEvent()->getProduct();
        $event = $observer->getEvent();
        $product->setHasOptions(1);
        return $this;    	
    }   
	
    public function hookIntoCatalogProductStatusUpdate($observer)
    {
        $product = $observer->getEvent()->getProduct();
        $event = $observer->getEvent();
        return $this;    	
    }

    public function hookIntoCatalogEntityAttributeSaveAfter($observer)
    {
        return $this;    	
    }
    
    public function hookIntoCatalogProductDeleteAfterDone($observer)
    {
        $product = $observer->getEvent()->getProduct();
        $event = $observer->getEvent();
        return $this;    	
    }
    
    public function hookIntoCustomerLogin($observer)
    {
        $event = $observer->getEvent();
        return $this;    	
    }       

    public function hookIntoCustomerLogout($observer)
    {
        $event = $observer->getEvent();
        return $this;    	
    }

    public function hookIntoSalesQuoteSaveAfter($observer)
    {
        $event = $observer->getEvent();
        return $this;    	
    }

    public function hookIntoCatalogProductCollectionLoadAfter($observer)
    {
        $event = $observer->getEvent();
        return $this;    	
    }
    
}