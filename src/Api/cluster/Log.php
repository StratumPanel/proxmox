<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Log
 * @package Stratum\Proxmox\Api\Cluster
 */
class Log extends PVEPathClassBase
{
    /**
     * Log constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'log/');
    }

    /**
     * Read cluster log
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/log
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}