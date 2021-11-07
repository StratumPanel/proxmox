<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Ha;

use Stratum\Proxmox\Api\Cluster\Ha\Groups\Group;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Groups
 * @package Stratum\Proxmox\Api\Cluster\Ha
 */
class Groups extends PVEPathClassBase
{
    /**
     * Groups constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'groups/');
    }

    /**
     * Read ha group configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups/{group}
     * @param string $group
     * @return Group
     */
    public function group(string $group): Group
    {
        return new Group($this->getPve(), $this->getPathAdditional() . $group . '/');
    }

    /**
     * Get HA groups.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Create a new HA group.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}