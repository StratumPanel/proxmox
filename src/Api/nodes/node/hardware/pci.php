<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Hardware;

use Stratum\Proxmox\Api\Nodes\Node\Hardware\Pci\PciId;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Pci
 * @package Stratum\Proxmox\Api\Nodes\Node\Hardware
 */
class Pci extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'pci/');
    }

    /**
     * Index of available pci methods
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hardware/pci/{pciid}
     * @param string $pciId
     * @return \Stratum\Proxmox\Api\Nodes\Node\Hardware\Pci\PciId
     */
    public function pciId(string $pciId): PciId
    {
        return new PciId($this->getPve(), $this->getPathAdditional() . $pciId . '/');
    }

    /**
     * List local PCI devices.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hardware/pci
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}