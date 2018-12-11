<?php

namespace Gwd\CustomCatalog\Model;

use \Psr\Log\LoggerInterface;
use \Magento\Framework\App\ObjectManager;

class Consumer implements \Rcason\Mq\Api\ConsumerInterface
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * Consumer constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->_logger = $logger;
    }

    /**
     * Process queue message
     *
     * @param mixed $message
     */
    public function process($message)
    {
        $data = json_decode($message, true);

        $objectManager = ObjectManager::getInstance();
        $product = $objectManager->create('Magento\Catalog\Model\Product')->load($data['entity_id']);

        try {
            if (!$product->getId()) {
                return;
            }

            if ($data['entity_id']) {
                unset($data['entity_id']);
            }

            foreach ($data as $key => $value)
            {
                $this->updateAttribute($product, $data, $key);
            }

        }catch (Exception $e){
            $this->_logger->addError($e);
        }
    }

    /**
     * Updating product attribute
     *
     * @param $product
     * @param $data
     * @param $attributeName
     *
     * @return mixed $product
     */
    protected function updateAttribute($product, $data, $attributeName)
    {
        if ($data[$attributeName]) {
            $product->setData($attributeName, $data[$attributeName]);
            $product->getResource()->saveAttribute($product, $attributeName);
        }

        return $product;
    }
}