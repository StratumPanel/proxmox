<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Acme\Plugins;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Id
 * @package Stratum\Proxmox\Api\Cluster\Acme\Plugins
 */
class Id extends PVEPathClassBase
{
    /**
     * Id constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Get ACME plugin configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/acme/plugins/{id}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Update ACME plugin configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/acme/plugins/{id}
     * @param $params array
     * @return array|null
     */
    public function put(array $params = []): ?array
    {
        return $this->getPve()->getApi()->put($this->getPathAdditional(), $params);
    }

    /**
     * Delete ACME plugin configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/acme/plugins/{id}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }
}