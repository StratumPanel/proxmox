<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Sdn\Zones;

use Stratum\Proxmox\Api\Nodes\Node\Sdn\Zones\Zone\Content;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Zone
 * @package Stratum\Proxmox\Api\Nodes\Node\Sdn\Zones
 */
class Zone extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * List zone content.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/sdn/zones/{zone}/content
     * @return \Stratum\Proxmox\Api\Nodes\Node\Sdn\Zones\Zone\Content
     */
    public function content(): Content
    {
        return new Content($this->getPve(), $this->getPathAdditional());
    }

    /**
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/sdn/zones/{zone}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}