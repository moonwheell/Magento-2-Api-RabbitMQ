<?php

namespace Gwd\CustomCatalog\Model;

use Gwd\CustomCatalog\Api\UpdateProductInterface;
use \Rcason\Mq\Api\PublisherInterface as Publisher;

class UpdateProductApi implements UpdateProductInterface
{
    /**
     * @var Publisher
     */
    private $publisher;

    /**
     * UpdateProductApi constructor
     *
     * @param Publisher $publisher
     */
    public function __construct(
        Publisher $publisher)
    {
        $this->publisher = $publisher;
            }

    /**
     * Sending message to queue
     *
     * @param int $entity_id
     * @param string $copywriteinfo
     * @param string $vpn
     *
     * @return void
     */
    public function update($entity_id, $copywriteinfo, $vpn)
    {
        $message = ['entity_id' => $entity_id, 'copywriteinfo' => $copywriteinfo, 'vpn' => $vpn];
        $this->publisher->publish('product.updates', json_encode($message));
    }
}


