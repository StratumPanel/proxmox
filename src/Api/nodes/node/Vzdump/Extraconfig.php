<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Vzdump;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Extraconfig
 * @package Stratum\Proxmox\Api\Nodes\Node\Vzdump
 */
class Extraconfig extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'extraconfig/');
    }

    /**
     * Extract configuration from vzdump backup archive.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/disks/extraconfig
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}