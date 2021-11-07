<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Firewall\Groups\Group;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Pos
 * @package Stratum\Proxmox\Api\Cluster\Firewall\Groups\Group
 */
class Pos extends PVEPathClassBase
{
    /**
     * Pos constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Get single rule data.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/groups/{group}/{pos}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Modify rule data.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/groups/{group}/{pos}
     * @param $params array
     * @return array|null
     */
    public function put(array $params = []): ?array
    {
        return $this->getPve()->getApi()->put($this->getPathAdditional(), $params);
    }

    /**
     * Delete rule.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/groups/{group}/{pos}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }

}