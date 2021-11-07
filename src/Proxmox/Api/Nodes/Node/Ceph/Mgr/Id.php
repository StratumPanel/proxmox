<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Ceph\Mgr;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Id
 * @package Stratum\Proxmox\Api\Nodes\Node\Ceph\Mgr
 */
class Id extends PVEPathClassBase
{

    /**
     * @param \Stratum\Proxmox\PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Create Ceph Manager
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/mgr/{id}
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

    /**
     * Destroy Ceph Manager.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/mgr/{id}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }

}