<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Resources
 * @package Stratum\Proxmox\Api\Cluster
 */
class Resources extends PVEPathClassBase
{
    /**
     * Resources constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'resources/');
    }

    /**
     * Resources index (cluster wide).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/resources
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}