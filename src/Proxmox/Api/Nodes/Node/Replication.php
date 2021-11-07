<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Api\Nodes\Node\Replication\Id;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Replication
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Replication extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'replication/');
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication/{id}
     * @param string $id
     * @return \Stratum\Proxmox\Api\Nodes\Node\Replication\Id
     */
    public function id(string $id): Id
    {
        return new Id($this->getPve(), $this->getPathAdditional() . $id . '/');
    }

    /**
     * List status of all replication jobs on this node.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}