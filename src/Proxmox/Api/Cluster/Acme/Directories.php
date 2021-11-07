<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Acme;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Directories
 * @package Stratum\Proxmox\Api\Cluster
 */
class Directories extends PVEPathClassBase
{
    /**
     * Directories constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'directories/');
    }

    /**
     * Get named known ACME directory endpoints.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/acme/directories
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}