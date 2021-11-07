<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId;

use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Aliases;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\IpSet;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Log;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Options;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Refs;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Rules;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Firewall
 * @package Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId
 */
class Firewall extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'firewall/');
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall/aliases
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Aliases
     */
    public function aliases(): Aliases
    {
        return new Aliases($this->getPve(), $this->getPathAdditional());
    }

    /**
     * List IPSets
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall/ipset
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\IpSet
     */
    public function ipSet(): IpSet
    {
        return new IpSet($this->getPve(), $this->getPathAdditional());
    }

    /**
     * List rules.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall/rules
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Rules
     */
    public function rules(): Rules
    {
        return new Rules($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read firewall log
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall/log
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Log
     */
    public function log(): Log
    {
        return new Log($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get VM firewall options.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall/options
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Options
     */
    public function options(): Options
    {
        return new Options($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read firewall log
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall/log
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Firewall\Refs
     */
    public function refs(): Refs
    {
        return new Refs($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/firewall
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}