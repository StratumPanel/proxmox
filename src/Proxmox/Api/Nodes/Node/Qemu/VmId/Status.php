<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId;

use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Current;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Reboot;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Resume;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Shutdown;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Start;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Stop;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Suspend;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Status
 * @package Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId
 */
class Status extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'status/');
    }

    /**
     * Get virtual machine status.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/current
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Current
     */
    public function current(): Current
    {
        return new Current($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Reboot the container by shutting it down, and starting it again. Applies pending changes.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/reboot
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Reboot
     */
    public function reboot(): Reboot
    {
        return new Reboot($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Resume the container.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/resume
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Resume
     */
    public function resume(): Resume
    {
        return new Resume($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Shutdown the container. This will trigger a clean shutdown of the container, see lxc-stop(1) for details.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/shutdown
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Shutdown
     */
    public function shutdown(): Shutdown
    {
        return new Shutdown($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Start the container.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/start
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Start
     */
    public function start(): Start
    {
        return new Start($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Stop the container. This will abruptly stop all processes running in the container.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/stop
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Stop
     */
    public function stop(): Stop
    {
        return new Stop($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Suspend the container.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status/suspend
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Status\Suspend
     */
    public function suspend(): Suspend
    {
        return new Suspend($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/status
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}