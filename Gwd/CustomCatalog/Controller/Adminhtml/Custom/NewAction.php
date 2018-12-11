<?php

namespace Gwd\CustomCatalog\Controller\Adminhtml\Custom;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
