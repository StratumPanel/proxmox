<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Firewall;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Macros
 * @package Stratum\Proxmox\Api\Cluster\Firewall
 */
class Macros extends PVEPathClassBase
{

    /**
     * Macros constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'macros/');
    }

    /**
     * List available macros
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/macros
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}