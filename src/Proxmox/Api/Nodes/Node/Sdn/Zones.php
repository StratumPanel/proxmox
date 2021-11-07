<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Sdn;

use Stratum\Proxmox\Api\Cluster\Sdn\Zones\Zone;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Zones
 * @package Stratum\Proxmox\Api\Nodes\Node\Sdn
 */
class Zones extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'zones/');
    }

    /**
     * Index of available pci methods
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hardware/pci/{pciid}
     * @param string $zone
     * @return \Stratum\Proxmox\Api\Cluster\Sdn\Zones\Zone
     */
    public function zone(string $zone): Zone
    {
        return new Zone($this->getPve(), $this->getPathAdditional() . $zone . '/');
    }

    /**
     * Get status for all zones.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/sdn/zones
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}