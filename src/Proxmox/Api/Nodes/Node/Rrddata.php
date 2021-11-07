<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Rrddata
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Rrddata extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'rrddata/');
    }

    /**
     * Read node RRD statistics
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/rrddata
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}