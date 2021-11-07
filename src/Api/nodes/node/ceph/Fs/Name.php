<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Ceph\Fs;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Name
 * @package Stratum\Proxmox\Api\Nodes\Node\Ceph\Fs
 */
class Name extends PVEPathClassBase
{

    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Create a Ceph filesystem
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/fs/{name}
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}