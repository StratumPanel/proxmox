<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Sdn;

use Stratum\Proxmox\Api\Cluster\Sdn\Ipams\Ipam;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Ipams
 * @package Stratum\Proxmox\Api\Cluster\Sdn
 */
class Ipams extends PVEPathClassBase
{
    /**
     * Ipams constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'ipams/');
    }

    /**
     * Read sdn dns configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/sdn/ipams
     * @param string $ipam
     * @return Ipam
     */
    public function ipam(string $ipam): Ipam
    {
        return new Ipam($this->getPve(), $this->getPathAdditional() . $ipam . '/');
    }

    /**
     * SDN ipams index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/sdn/ipams
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Create a new sdn ipam object.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/sdn/ipams
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}