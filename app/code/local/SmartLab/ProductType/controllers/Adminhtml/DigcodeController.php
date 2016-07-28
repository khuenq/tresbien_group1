<?php

class SmartLab_ProductType_Adminhtml_DigcodeController extends Mage_Adminhtml_Controller_Action
{
 
	
	public function indexAction(){
		$this->loadLayout();
		$this->renderLayout();
	}

	public function editAction() {
		$id	 = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('producttype/digcode')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data))
				$model->setData($data);

			Mage::register('digcode_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('producttype/digcode');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock('producttype/adminhtml_digcode_edit'))
				->_addLeft($this->getLayout()->createBlock('producttype/adminhtml_digcode_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('producttype')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}
 
	public function newAction() {
		$this->_forward('edit');
	}

	public function listAction(){
		$id=$this->getRequest()->getParam('id');
		$listcollection = Mage::getModel('producttype/digcode')->getCollection()->addFildToFilter('code_id',$id);
	}
 
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
	  		if(isset($_FILES['name']['name']) and (file_exists($_FILES['name']['tmp_name']))) {
				  try {
				    $uploader = new Varien_File_Uploader('name');
				    $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); // or pdf or anything
				  
				  
				    $uploader->setAllowRenameFiles(false);
				    $uploader->setFilesDispersion(false);
				    
				    $path = Mage::getBaseDir('media') ."/album" ;
				                
				    $uploader->save($path, $_FILES['name']['name']);
				    $data['name'] = $_FILES['name']['name'];
				  }catch(Exception $e) {
				  echo('khong load duoc');
				  }
				} 
			$model = Mage::getModel('producttype/digcode');		
			$model->setData($data)
				->setId($this->getRequest()->getParam('id'));
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL)
					$model->setCreatedTime(now())
						->setUpdateTime(now());
				else
					$model->setUpdateTime(now());
				
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('album')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->setFormData($data);
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('album')->__('Unable to find item to save'));
		$this->_redirect('*/*/');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('producttype/digcode');
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
	

	public function massDeleteAction() {
		$digcodeIds = $this->getRequest()->getParam('digcode');
		if(!is_array($digcodeIds)){
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
		}else{
			try {
				foreach ($digcodeIds as $digcodeId) {
					$digcode = Mage::getModel('producttype/digcode')->load($digcodeId);
					$digcode->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($digcodeIds)));
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
	
	public function massStatusAction() {
		$digcodeIds = $this->getRequest()->getParam('digcode');
		if(!is_array($digcodeIds)) {
			Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
		} else {
			try {
				foreach ($digcodeIds as $digcodeId) {
					$digcode = Mage::getSingleton('producttype/digcode')
						->load($digcodeId)
						->setStatus($this->getRequest()->getParam('status'))
						->setIsMassupdate(true)
						->save();
				}
				$this->_getSession()->addSuccess(
					$this->__('Total of %d record(s) were successfully updated', count($digcodeIds))
				);
			} catch (Exception $e) {
				$this->_getSession()->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
  
	public function exportCsvAction(){
		$fileName   = 'digcode.csv';
		$content	= $this->getLayout()->createBlock('album/adminhtml_digcode_grid')->getCsv();
		$this->_prepareDownloadResponse($fileName,$content);
	}

	public function exportXmlAction(){
		$fileName   = 'digcode.xml';
		$content	= $this->getLayout()->createBlock('album/adminhtml_digcode_grid')->getXml();
		$this->_prepareDownloadResponse($fileName,$content);
	}
}