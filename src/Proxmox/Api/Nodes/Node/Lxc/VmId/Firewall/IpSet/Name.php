<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId\Firewall\IpSet;

use Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId\Firewall\IpSet\Name\Cidr;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Name
 * @package Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId\Firewall\ipset
 */
class Name extends PVEPathClassBase
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
     * Read IP or Network settings from IPSet.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}/{cidr}
     * @param string $cidr
     * @return \Stratum\Proxmox\Api\Nodes\Node\Lxc\VmId\Firewall\IpSet\Name\Cidr
     */
    public function cidr(string $cidr): Cidr
    {
        return new Cidr($this->getPve(), $this->getPathAdditional() . $cidr . '/');
    }

    /**
     * List IPSet content
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Add IP or Network to IPSet.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

    /**
     * Delete IPSet
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc/{vmid}/firewall/aliases/{name}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }
}