<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api;

use Stratum\Proxmox\Api\Nodes\Node;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Nodes
 * @package Stratum\Proxmox\Api
 */
class Nodes extends PVEPathClassBase
{
    /**
     * Nodes constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'nodes/');
    }

    /**
     * Node index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}
     * @param string $node
     * @return Node
     */
    public function node(string $node): Node
    {
        return new Node($this->getPve(), $this->getPathAdditional() . $node . '/');
    }

    /**
     * Cluster node index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}