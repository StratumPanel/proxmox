<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api;

use Stratum\Proxmox\Api\Pools\PoolId;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Pools
 * @package Stratum\Proxmox\Api
 */
class Pools extends PVEPathClassBase
{

    /**
     * Pools constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'pools/');
    }

    /**
     * Get pool configuration.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/pools/{poolid}
     * @param string $poolId
     * @return PoolId
     */
    public function poolId(string $poolId): PoolId
    {
        return new PoolId($this->getPve(), $this->getPathAdditional() . $poolId . '/');
    }

    /**
     * Pool index.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/pools
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Create new pool.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/pools
     * @param array $params
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}