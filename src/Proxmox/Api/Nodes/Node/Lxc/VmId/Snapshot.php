<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId;

use Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId\Snapshot\Snapname;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Snapshot
 * @package Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId
 */
class Snapshot extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'snapshot/');
    }

    /**
     * Read network device configuration
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/network/{iface}
     * @param string $snapname
     * @return \Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId\Snapshot\Snapname
     */
    public function snapname(string $snapname): Snapname
    {
        return new Snapname($this->getPve(), $this->getPathAdditional() . $snapname . '/');
    }

    /**
     * List all snapshots.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/snapshot
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Snapshot a container.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/snapshot
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}