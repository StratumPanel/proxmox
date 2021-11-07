<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Storage\Storage;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Prunebackups
 * @package Stratum\Proxmox\Api\Nodes\Node\Storage\Storage
 */
class Prunebackups extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'prunebackups/');
    }

    /**
     * Get prune information for backups. NOTE: this is only a preview and might not be what a subsequent prune call does if backups are removed/added in the meantime.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage/{storage}/prunebackups
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());

    }

    /**
     * Prune backups. Only those using the standard naming scheme are considered.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage/{storage}/prunebackups
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }
}