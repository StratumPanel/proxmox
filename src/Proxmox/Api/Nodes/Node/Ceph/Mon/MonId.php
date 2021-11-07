<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Ceph\Mon;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class MonId
 * @package Stratum\Proxmox\Api\Nodes\Node\Ceph\Mon
 */
class MonId extends PVEPathClassBase
{

    /**
     * @param \Stratum\Proxmox\PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Create Ceph Monitor and Manager
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/mon/{monid}
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

    /**
     * Destroy Ceph Monitor and Manager.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/mon/{monid}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }

}