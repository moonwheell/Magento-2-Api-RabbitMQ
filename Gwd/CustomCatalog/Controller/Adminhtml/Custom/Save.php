<?php

namespace Gwd\CustomCatalog\Controller\Adminhtml\Custom;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();

        if ($data) {
            $model = $this->_objectManager->create('Magento\Catalog\Model\Product');
            $id = $this->getRequest()->getParam('id');

            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
            $model->setVisibility(1);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('The product has been Saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));

                    return;
                }
                $this->_redirect('*/*/');

                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the product.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array());

            return;
        }
        $this->_redirect('*/*/');
    }
}
