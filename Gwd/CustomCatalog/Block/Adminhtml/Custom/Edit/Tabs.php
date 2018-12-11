<?php

namespace Gwd\CustomCatalog\Block\Adminhtml\Custom\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Setting data to edit page
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('checkmodule_custom_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Product Information'));
    }
}