<?php

namespace Gwd\CustomCatalog\Model;

use Gwd\CustomCatalog\Api\CustomCatalogApiInterface;

class CustomCatalogApi implements CustomCatalogApiInterface
{
    /**
     * Get product list with declared vpn
     *
     * @param string $vpn
     *
     * @return string
     */
    public function getByVPN($vpn)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $collection = $productCollection->create()
            ->addAttributeToSelect('*')
            ->addFieldToFilter("vpn", array("eq" => "$vpn"))
            ->load();

        $result = [];
        foreach ($collection as $attributes) {
            $result[] = $attributes->getData('vpn');
        }

        return json_encode($result);
    }
}


