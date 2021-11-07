<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Capabilities\Qemu;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Cpu
 * @package Stratum\Proxmox\Api\Nodes\Node\Capabilities\Qemu
 */
class Cpu extends PVEPathClassBase
{
    /**
     * Cpu constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'cpu/');
    }

    /**
     * List all custom and default CPU models.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/capabilities/qemu/cpu
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}