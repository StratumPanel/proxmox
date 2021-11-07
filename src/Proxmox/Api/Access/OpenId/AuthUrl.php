<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Access\OpenId;


use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class AuthUrl
 * @package Stratum\Proxmox\Api\Access\OpenId
 */
class AuthUrl extends PVEPathClassBase
{

    /**
     * AuthUrl constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'auth-url/');
    }

    /**
     * Get the OpenId Authorization Url for the specified realm.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/openid/auth-url
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}