<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Ceph;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class ConfigDb
 * @package Stratum\Proxmox\Api\Nodes\Node\Ceph
 */
class ConfigDb extends PVEPathClassBase
{
    /**
     * ConfigDb constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'configdb/');
    }

    /**
     * Get Ceph configuration database.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/configdb
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}