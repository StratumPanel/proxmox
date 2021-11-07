<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId;

use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Exec;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\ExecStatus;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FileRead;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FileWrite;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FsfreezeFreeze;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FsfreezeStatus;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FsfreezeThaw;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Fsstrim;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetFsinfo;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetHostName;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetMemoryBlockInfo;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetMemoryBlocks;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetOsinfo;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetTime;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetTimezone;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetUsers;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetVcpus;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Info;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\NetworkGetInterfaces;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Ping;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SetUserPassword;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Shutdown;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SuspendDisk;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SuspendHybrid;
use Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SuspendRam;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Agent
 * @package Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId
 */
class Agent extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'agent/');
    }

    /**
     * Executes the given command in the vm via the guest-agent and returns an object with the pid
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/exec
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Exec
     */
    public function exec(): Exec
    {
        return new Exec($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Gets the status of the given pid started by the guest-agent
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/exec-status
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\ExecStatus
     */
    public function execStatus(): ExecStatus
    {
        return new ExecStatus($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Reads the given file via guest agent. Is limited to 16777216 bytes.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/file-read
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FileRead
     */
    public function fileRead(): FileRead
    {
        return new FileRead($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Writes the given file via guest agent.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/file-write
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FileWrite
     */
    public function fileWrite(): FileWrite
    {
        return new FileWrite($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute fsfreeze-freeze.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/fsfreeze-freeze
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FsfreezeFreeze
     */
    public function fsfreezeFreeze(): FsfreezeFreeze
    {
        return new FsfreezeFreeze($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute fsfreeze-status.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/fsfreeze-status
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FsfreezeStatus
     */
    public function fsfreezeStatus(): FsfreezeStatus
    {
        return new FsfreezeStatus($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute fsfreeze-thaw.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/fsfreeze-thaw
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\FsfreezeThaw
     */
    public function fsfreezeThaw(): FsfreezeThaw
    {
        return new FsfreezeThaw($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute fstrim.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/fstrim
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Fsstrim
     */
    public function fsstrim(): Fsstrim
    {
        return new Fsstrim($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-fsinfo.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-fsinfo
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetFsinfo
     */
    public function getFsinfo(): GetFsinfo
    {
        return new GetFsinfo($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-host-name.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-host-name
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetHostName
     */
    public function getHostName(): GetHostName
    {
        return new GetHostName($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-memory-block-info.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-memory-block-info
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetMemoryBlockInfo
     */
    public function getMemoryBlockInfo(): GetMemoryBlockInfo
    {
        return new GetMemoryBlockInfo($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-memory-blocks.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-memory-blocks
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetMemoryBlocks
     */
    public function getMemoryBlocks(): GetMemoryBlocks
    {
        return new GetMemoryBlocks($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-osinfo.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-osinfo
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetOsinfo
     */
    public function getOsinfo(): GetOsinfo
    {
        return new GetOsinfo($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-time.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-time
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetTime
     */
    public function getTime(): GetTime
    {
        return new GetTime($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-timezone.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-timezone
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetTimezone
     */
    public function getTimezone(): GetTimezone
    {
        return new GetTimezone($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-users.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-users
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetUsers
     */
    public function getUsers(): GetUsers
    {
        return new GetUsers($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute get-vcpus.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-vcpus
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\GetVcpus
     */
    public function getVcpus(): GetVcpus
    {
        return new GetVcpus($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute info.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/exec
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Info
     */
    public function info(): Info
    {
        return new Info($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute network-get-interfaces.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/network-get-interfaces
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\NetworkGetInterfaces
     */
    public function networkGetInterfaces(): NetworkGetInterfaces
    {
        return new NetworkGetInterfaces($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute ping.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/ping
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Ping
     */
    public function ping(): Ping
    {
        return new Ping($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Sets the password for the given user to the given password
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/set-user-password
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SetUserPassword
     */
    public function SetUserPassword(): SetUserPassword
    {
        return new SetUserPassword($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute shutdown.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/shutdown
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\Shutdown
     */
    public function shutdown(): Shutdown
    {
        return new Shutdown($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute suspend-disk.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/suspend-disk
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SuspendDisk
     */
    public function suspendDisk(): SuspendDisk
    {
        return new SuspendDisk($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute suspend-hybrid.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/suspend-hybrid
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SuspendHybrid
     */
    public function suspendHybrid(): SuspendHybrid
    {
        return new SuspendHybrid($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Execute suspend-ram.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/suspend-ram
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu\VmId\Agent\SuspendRam
     */
    public function suspendRam(): SuspendRam
    {
        return new SuspendRam($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Qemu Agent command index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Execute Qemu Guest Agent commands.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}