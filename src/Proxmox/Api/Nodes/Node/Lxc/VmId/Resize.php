<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Resize
 * @package Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId
 */
class Resize extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'resize/');
    }

    /**
     * Resize a container mount point.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/resize
     * @param $params array
     * @return array|null
     */
    public function put(array $params = []): ?array
    {
        return $this->getPve()->getApi()->put($this->getPathAdditional(), $params);
    }
}