<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Firewall\Aliases;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Name
 * @package Stratum\Proxmox\Api\Cluster\Firewall\Aliases
 */
class Name extends PVEPathClassBase
{
    /**
     * Name constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Read alias.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/aliases/{name}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Update IP or Network alias.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/aliases/{name}
     * @param $params array
     * @return array|null
     */
    public function put(array $params = []): ?array
    {
        return $this->getPve()->getApi()->put($this->getPathAdditional(), $params);
    }

    /**
     * Remove IP or Network alias.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/aliases/{name}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }

}