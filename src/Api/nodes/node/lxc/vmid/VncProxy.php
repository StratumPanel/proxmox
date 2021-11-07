<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class VncProxy
 * @package Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId
 */
class VncProxy extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'vncproxy/');
    }

    /**
     * Creates a TCP VNC proxy connections.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/vncproxy
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}