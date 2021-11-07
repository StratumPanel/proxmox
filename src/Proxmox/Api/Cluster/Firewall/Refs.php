<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Firewall;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Refs
 * @package Stratum\Proxmox\Api\Cluster\Firewall
 */
class Refs extends PVEPathClassBase
{

    /**
     * Refs constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'refs/');
    }

    /**
     * Lists possible IPSet/Alias reference which are allowed in source/dest properties.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/refs
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}