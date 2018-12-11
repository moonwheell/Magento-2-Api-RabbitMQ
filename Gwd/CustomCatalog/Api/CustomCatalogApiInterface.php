<?php

namespace Gwd\CustomCatalog\Api;

interface CustomCatalogApiInterface
{
    /**
     * Get products by VPN
     *
     * @param string $vpn
     *
     * @return string
     */
    public function getByVPN($vpn);

}