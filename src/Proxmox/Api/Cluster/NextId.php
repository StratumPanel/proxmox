<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class NextId
 * @package Stratum\Proxmox\Api\Cluster
 */
class NextId extends PVEPathClassBase
{
    /**
     * NextId constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'nextid/');
    }

    /**
     * Get next free VMID. If you pass an VMID it will raise an error if the ID is already used.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/nextid
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}