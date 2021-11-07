<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Api\Nodes\Node\Capabilities\Qemu;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Capabilities
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Capabilities extends PVEPathClassBase
{
    /**
     * Apt constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'capabilities/');
    }

    /**
     * QEMU capabilities index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/capabilities/qemu
     * @return Qemu
     */
    public function qemu(): Qemu
    {
        return new Qemu($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Node capabilities index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/capabilities
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}