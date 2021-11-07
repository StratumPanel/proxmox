<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Api\Nodes\Node\Vzdump\Defaults;
use Stratum\Proxmox\Api\Nodes\Node\Vzdump\Extraconfig;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Vzdump
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Vzdump extends PVEPathClassBase
{
    /**
     * Apt constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'vzdump/');
    }

    /**
     * Get the currently configured vzdump defaults.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/disks/defaults
     * @return \Stratum\Proxmox\Api\Nodes\Node\Vzdump\Defaults
     */
    public function defaults(): Defaults
    {
        return new Defaults($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Extract configuration from vzdump backup archive.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/disks/extraconfig
     * @return \Stratum\Proxmox\Api\Nodes\Node\Vzdump\Extraconfig
     */
    public function extraconfig(): Extraconfig
    {
        return new Extraconfig($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Create backup.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/vzdump
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}