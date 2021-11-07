<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Ha\Resources\Sid;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Relocate
 * @package Stratum\Proxmox\Api\Cluster\Ha\Resources\Sid
 */
class Relocate extends PVEPathClassBase
{
    /**
     * Relocate constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'relocate/');
    }

    /**
     * Request resource relocatzion to another node. This stops the service on the old node, and restarts it on the target node.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/resources/{sid}/relocate
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}