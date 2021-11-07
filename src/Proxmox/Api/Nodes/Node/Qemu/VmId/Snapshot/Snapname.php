<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot;

use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot\Snapname\Config;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot\Snapname\Rollback;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Snapname
 * @package Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot
 */
class Snapname extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Get snapshot configuration
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}/config
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot\Snapname\Config
     */
    public function config(): Config
    {
        return new Config($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Rollback LXC state to specified snapshot.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}/rollback
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot\Snapname\Rollback
     */
    public function rollback(): Rollback
    {
        return new Rollback($this->getPve(), $this->getPathAdditional());
    }

    /**
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());

    }

    /**
     * Delete a LXC snapshot.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }
}