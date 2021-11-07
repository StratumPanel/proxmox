<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Ha\Groups;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Group
 * @package Stratum\Proxmox\Api\Cluster\Ha\Groups
 */
class Group extends PVEPathClassBase
{
    /**
     * Group constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Read ha group configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups/{group}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Update ha group configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups/{group}
     * @param $params array
     * @return array|null
     */
    public function put(array $params = []): ?array
    {
        return $this->getPve()->getApi()->put($this->getPathAdditional(), $params);
    }

    /**
     * Delete ha group configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups/{group}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }

}