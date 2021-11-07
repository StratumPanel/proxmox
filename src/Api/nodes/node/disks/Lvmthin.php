<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Disks;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Lvmthin
 * @package Stratum\Proxmox\Api\Nodes\Node\Disks
 */
class Lvmthin extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'lvmthin/');
    }

    /**
     * List LVM thinpools
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/disks/lvmthin
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Create an LVM thinpool
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/disks/lvmthin
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}