<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Config;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Totem
 * @package Stratum\Proxmox\Api\Cluster\Config
 */
class Totem extends PVEPathClassBase
{

    /**
     * Totem constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'totem/');
    }

    /**
     * Get corosync totem protocol settings.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/config/totem
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}