<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Netstat
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Netstat extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'netstat/');
    }

    /**
     * Read tap/vm network device interface counters
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/netstat
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}