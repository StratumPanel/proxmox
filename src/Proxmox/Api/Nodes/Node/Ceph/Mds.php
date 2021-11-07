<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Ceph;

use Stratum\Proxmox\Api\Nodes\Node\Ceph\Mds\Name;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Mds
 * @package Stratum\Proxmox\Api\Nodes\Node\Ceph
 */
class Mds extends PVEPathClassBase
{
    /**
     * Mds constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'mds/');
    }

    /**
     * Create a Ceph filesystem
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/fs/{name}
     * @param string $name
     * @return Name
     */
    public function name(string $name): Name
    {
        return new Name($this->getPve(), $this->getPathAdditional() . $name . '/');
    }

    /**
     * MDS directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/mds
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}