<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Ceph\Osd\OsdId;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Scrub
 * @package Stratum\Proxmox\Api\Nodes\Node\Ceph\Osd
 */
class Scrub extends PVEPathClassBase
{

    /**
     * @param \Stratum\Proxmox\PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'scrub/');
    }

    /**
     * Instruct the OSD to scrub.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph/osd/{osdid}/scrub
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}