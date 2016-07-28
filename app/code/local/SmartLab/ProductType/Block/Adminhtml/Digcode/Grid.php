<?php

class SmartLab_ProductType_Block_Adminhtml_Digcode_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct(){
		parent::__construct();
		$this->setId('imageGrid');
		$this->setDefaultSort('code_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}

	protected function _prepareCollection(){
		if(($this->getRequest()->getParam('id'))==null){
		$collection = Mage::getModel('producttype/digcode')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}else {
		$id=$this->getRequest()->getParam('id');
		echo $id;
		$collection = Mage::getModel('producttype/digcode')->getCollection()->addFieldToFilter('album_id',$id);
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	}

	protected function _prepareColumns(){
		$digcodelist=Mage::getModel('producttype/digcode')->getCollection();
        $datadigcode=array();
        foreach ($digcodelist as $item) {
            $datadigcode[$item->getId()] =$item->getName();
        }
		$this->addColumn('code_id', array(
			'header'	=> Mage::helper('producttype')->__('ID'),
			'align'	 =>'right',
			'width'	 => '70px',
			'index'	 => 'code_id',
		));

		$this->addColumn('customer_id', array(
			'header'	=> Mage::helper('producttype')->__('Customer ID'),
			'align'	 =>'right',
			'width'	 => '70px',
			'index'	 => 'customer_id',
		));

		$this->addColumn('product_id', array(
			'header'	=> Mage::helper('producttype')->__('Product ID'),
			'align'	 =>'right',
			'width'	 => '70px',
			'index'	 => 'product_id',
		));

		$this->addColumn('level', array(
			'header'	=> Mage::helper('producttype')->__('Level'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'level',
			'type' => 'options',
			'options' => array(
			 1 => 'Platinum',
			 2 => 'Golden',
			 3 => 'Silver',
			 4 => 'Bronze',
			 ),
		));

		$this->addColumn('code_value', array(
			'header'	=> Mage::helper('producttype')->__('Code'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'code_value',
		));

		$this->addColumn('voucher_code', array(
			'header'	=> Mage::helper('producttype')->__('Voucher code'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'voucher_code',
		));

		$this->addColumn('order_date', array(
			'header'	=> Mage::helper('producttype')->__('Order date'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'order_date',
			'type' => 'date',
		));

		$this->addColumn('start_date', array(
			'header'	=> Mage::helper('producttype')->__('Start date'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'start_date',
			'type' => 'date',
		));

		$this->addColumn('end_date', array(
			'header'	=> Mage::helper('producttype')->__('End Date'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'end_date',
			'type' => 'date',
		));

		$this->addColumn('status', array(
			'header'	=> Mage::helper('producttype')->__('Status'),
			'align'	 =>'right',
			'width'	 => '100px',
			'index'	 => 'status',
			'type' => 'options',
			'options' => array(
			 1 => 'Enabled',
			 0 => 'Disabled',
			 ),
			 ));


		return parent::_prepareColumns();
	}

	public function getRowUrl($row){
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}