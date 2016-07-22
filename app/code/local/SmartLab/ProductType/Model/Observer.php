<?php

class SmartLab_ProductType_Model_Observer
{   
    //public $cartProduct= Mage::getModel('catalog/product'); 
    public $cartProduct;
    public function hookIntoCatalogProductTypePrepare($observer)
    {
        $event = $observer->getEvent();
        $quoteItem = $event->getQuoteItem();
        $product = $quoteItem->getProduct();
        if($product->getTypeId()=='digcerti'){
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                Mage::throwException('You need to login first');
            }else{
                if($product->getQty()>1){
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
                    //else Mage::throwException($check);
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

            foreach ($order->getAllItems() as $item) {
                if ($item->getProduct()->getTypeId()=='digcerti'){
                    $itemProduct=$item->getProduct();
                    $dcProduct=array('customer_id'=>$cusId, 
                        'product_id'=>$item->getProduct()->getId(), 
                        'level'=>$item->getProduct()->getSku(),
                        'code_value'=>md5(Mage::getModel('core/date')->date('Y-m-d H:i:s').$itemProduct->getSku.$cusId), 
                        'voucher_id'=>5);
                    $model = Mage::getModel('producttype/digcode');
                    $model->setData($dcProduct);
                    $model->save();
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
        $product = $observer->getEvent()->getProduct();
        $event = $observer->getEvent();
        $product->setHasOptions(1);
        $product->setRiquriedOptions(1);
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