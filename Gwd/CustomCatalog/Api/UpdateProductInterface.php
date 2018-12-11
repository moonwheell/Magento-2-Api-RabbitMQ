<?php

namespace Gwd\CustomCatalog\Api;

interface UpdateProductInterface
{
    /**
     * Updating products by PUT request
     *
     * @param int $entity_id
     * @param string $copywriteinfo
     * @param string $vpn
     *
     * @return void
     */
    public function update($entity_id, $copywriteinfo, $vpn);

}