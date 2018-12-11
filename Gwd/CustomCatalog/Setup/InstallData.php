<?php

namespace Gwd\CustomCatalog\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    /**
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;

    /**
     * InstallData constructor
     *
     * @param EavSetupFactory $eavSetupFactory
     * @param AttributeSetFactory $attributeSetFactory
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory, AttributeSetFactory $attributeSetFactory, CategorySetupFactory $categorySetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
        $this->categorySetupFactory = $categorySetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'vpn',
            [
                'type' => 'varchar',
                'label' => 'VPN',
                'backend' => '',
                'input' => 'text',
                'wysiwyg_enabled' => false,
                'source' => '',
                'required' => false,
                'sort_order' => 5,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                'used_in_product_listing' => true,
                'visible_on_front' => true,
                'attribute_set' => 'Default',
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'copywriteinfo',
            [
                'type' => 'text',
                'label' => 'CopyWriteInfo',
                'backend' => '',
                'input' => 'text',
                'wysiwyg_enabled' => false,
                'source' => '',
                'required' => false,
                'sort_order' => 5,
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                'used_in_product_listing' => true,
                'visible_on_front' => true,
                'attribute_set' => 'Default',
            ]
        );
        $setup->endSetup();
    }
}