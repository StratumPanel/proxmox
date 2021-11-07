<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Storage
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Storage extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'storage/');
    }

    /**
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage/{storage}
     * @param string $Storage
     * @return \Stratum\Proxmox\Api\Nodes\Node\Storage\Storage
     */
    public function zone(string $Storage): Storage\Storage
    {
        return new Storage\Storage($this->getPve(), $this->getPathAdditional() . $Storage . '/');
    }

    /**
     * Get status for all datastores.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}