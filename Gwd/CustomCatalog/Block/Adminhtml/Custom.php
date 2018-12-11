<?php

namespace Gwd\CustomCatalog\Block\Adminhtml;

class Custom extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_custom';
        $this->_blockGroup = 'Gwd_CustomCatalog';
        $this->_headerText = __('CustomCatalog');
        $this->_addButtonLabel = __('Add New Product');

        parent::_construct();
    }
}
