<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Ceph;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Status
 * @package Stratum\Proxmox\Api\Cluster\Ceph
 */
class Status extends PVEPathClassBase
{
    /**
     * Status constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'status/');
    }

    /**
     * Get ceph status.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/ceph/status
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}