<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Scan;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Glusterfs
 * @package Stratum\Proxmox\Api\Nodes\Node\Scan
 */
class Glusterfs extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'glusterfs/');
    }

    /**
     * Scan remote GlusterFS server.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/scan/glusterfs
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}