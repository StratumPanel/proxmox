<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Config;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class ApiVersion
 * @package Stratum\Proxmox\Api\Cluster\Config
 */
class ApiVersion extends PVEPathClassBase
{

    /**
     * ApiVersion constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'apiversion/');
    }

    /**
     * Return the version of the cluster join API available on this node.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/config/apiversion
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}