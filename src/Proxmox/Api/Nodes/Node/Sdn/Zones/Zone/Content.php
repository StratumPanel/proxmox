<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Sdn\Zones\Zone;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Content
 * @package Stratum\Proxmox\Api\Nodes\Node\Sdn\Zones\Zone
 */
class Content extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'content/');
    }

    /**
     * List zone content.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/sdn/zones/{zone}/content
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}