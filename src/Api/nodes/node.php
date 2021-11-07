<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes;

use Stratum\Proxmox\Api\Nodes\Node\Aplinfo;
use Stratum\Proxmox\Api\Nodes\Node\Apt;
use Stratum\Proxmox\Api\Nodes\Node\Capabilities;
use Stratum\Proxmox\Api\Nodes\Node\Ceph;
use Stratum\Proxmox\Api\Nodes\Node\Certificates;
use Stratum\Proxmox\Api\Nodes\Node\Config;
use Stratum\Proxmox\Api\Nodes\Node\Disks;
use Stratum\Proxmox\Api\Nodes\Node\Dns;
use Stratum\Proxmox\Api\Nodes\Node\Execute;
use Stratum\Proxmox\Api\Nodes\Node\Firewall;
use Stratum\Proxmox\Api\Nodes\Node\Hardware;
use Stratum\Proxmox\Api\Nodes\Node\Hosts;
use Stratum\Proxmox\Api\Nodes\Node\Journal;
use Stratum\Proxmox\Api\Nodes\Node\Lxc;
use Stratum\Proxmox\Api\Nodes\Node\Migrateall;
use Stratum\Proxmox\Api\Nodes\Node\Netstat;
use Stratum\Proxmox\Api\Nodes\Node\Network;
use Stratum\Proxmox\Api\Nodes\Node\Qemu;
use Stratum\Proxmox\Api\Nodes\Node\Replication;
use Stratum\Proxmox\Api\Nodes\Node\Report;
use Stratum\Proxmox\Api\Nodes\Node\Rrd;
use Stratum\Proxmox\Api\Nodes\Node\Rrddata;
use Stratum\Proxmox\Api\Nodes\Node\Scan;
use Stratum\Proxmox\Api\Nodes\Node\Sdn;
use Stratum\Proxmox\Api\Nodes\Node\Services;
use Stratum\Proxmox\Api\Nodes\Node\Spiceshell;
use Stratum\Proxmox\Api\Nodes\Node\Startall;
use Stratum\Proxmox\Api\Nodes\Node\Status;
use Stratum\Proxmox\Api\Nodes\Node\Stopall;
use Stratum\Proxmox\Api\Nodes\Node\Storage;
use Stratum\Proxmox\Api\Nodes\Node\Subscription;
use Stratum\Proxmox\Api\Nodes\Node\Syslog;
use Stratum\Proxmox\Api\Nodes\Node\Tasks;
use Stratum\Proxmox\Api\Nodes\Node\Termproxy;
use Stratum\Proxmox\Api\Nodes\Node\Time;
use Stratum\Proxmox\Api\Nodes\Node\Version;
use Stratum\Proxmox\Api\Nodes\Node\Vncshell;
use Stratum\Proxmox\Api\Nodes\Node\Vncwebsocket;
use Stratum\Proxmox\Api\Nodes\Node\Vzdump;
use Stratum\Proxmox\Api\Nodes\Node\Wakeonlan;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Node
 * @package Stratum\Proxmox\Api\Nodes
 */
class Node extends PVEPathClassBase
{
    /**
     * Node constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * Directory index for apt (Advanced Package Tool).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/apt
     * @return Apt
     */
    public function apt(): Apt
    {
        return new Apt($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Node capabilities index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/capabilities
     * @return Capabilities
     */
    public function capabilities(): Capabilities
    {
        return new Capabilities($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/ceph
     * @return Ceph
     */
    public function ceph(): Ceph
    {
        return new Ceph($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Node index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/certificates
     * @return Certificates
     */
    public function certificates(): Certificates
    {
        return new Certificates($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Node index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/disks
     * @return Disks
     */
    public function disks(): Disks
    {
        return new Disks($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/firewall
     * @return \Stratum\Proxmox\Api\Nodes\Node\Firewall
     */
    public function firewall(): Firewall
    {
        return new Firewall($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Index of hardware types
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hardware
     * @return \Stratum\Proxmox\Api\Nodes\Node\Hardware
     */
    public function hardware(): Hardware
    {
        return new Hardware($this->getPve(), $this->getPathAdditional());
    }

    /**
     * LXC container index (per node).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/lxc
     * @return \Stratum\Proxmox\Api\Nodes\Node\Lxc
     */
    public function lxc(): Lxc
    {
        return new Lxc($this->getPve(), $this->getPathAdditional());
    }

    /**
     * List available networks
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/network
     * @return \Stratum\Proxmox\Api\Nodes\Node\Network
     */
    public function network(): Network
    {
        return new Network($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Virtual machine index (per node).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu
     * @return \Stratum\Proxmox\Api\Nodes\Node\Qemu
     */
    public function qemu(): Qemu
    {
        return new Qemu($this->getPve(), $this->getPathAdditional());
    }

    /**
     * List status of all replication jobs on this node.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication
     * @return \Stratum\Proxmox\Api\Nodes\Node\Replication
     */
    public function replication(): Replication
    {
        return new Replication($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Index of available scan methods
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/scan
     * @return \Stratum\Proxmox\Api\Nodes\Node\Scan
     */
    public function scan(): Scan
    {
        return new Scan($this->getPve(), $this->getPathAdditional());
    }

    /**
     * SDN index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/sdn
     * @return \Stratum\Proxmox\Api\Nodes\Node\Sdn
     */
    public function sdn(): Sdn
    {
        return new Sdn($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Service list.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/services
     * @return \Stratum\Proxmox\Api\Nodes\Node\Services
     */
    public function services(): Services
    {
        return new Services($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get status for all datastores.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage
     * @return \Stratum\Proxmox\Api\Nodes\Node\Storage
     */
    public function storage(): Storage
    {
        return new Storage($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read task list for one node (finished tasks).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/tasks
     * @return \Stratum\Proxmox\Api\Nodes\Node\Tasks
     */
    public function tasks(): Tasks
    {
        return new Tasks($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Create backup.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/vzdump
     * @return Vzdump
     */
    public function vzdump(): Vzdump
    {
        return new Vzdump($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get list of appliances.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/aplinfo
     * @return Aplinfo
     */
    public function aplinfo(): Aplinfo
    {
        return new Aplinfo($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get node configuration options.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/config
     * @return Config
     */
    public function config(): Config
    {
        return new Config($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read DNS settings.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/dns
     * @return Dns
     */
    public function dns(): Dns
    {
        return new Dns($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get list of appliances.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/execute
     * @return Execute
     */
    public function execute(): Execute
    {
        return new Execute($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get the content of /etc/hosts.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hosts
     * @return Hosts
     */
    public function hosts(): Hosts
    {
        return new Hosts($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read Journal
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/journal
     * @return Journal
     */
    public function journal(): Journal
    {
        return new Journal($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Migrate all VMs and Containers.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/migrateall
     * @return Migrateall
     */
    public function migrateall(): Migrateall
    {
        return new Migrateall($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read tap/vm network device interface counters
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/netstat
     * @return Netstat
     */
    public function netstat(): Netstat
    {
        return new Netstat($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Gather various systems information about a node
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/report
     * @return Report
     */
    public function report(): Report
    {
        return new Report($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read node RRD statistics (returns PNG)
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/rrd
     * @return Rrd
     */
    public function rrd(): Rrd
    {
        return new Rrd($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read node RRD statistics
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/rrddata
     * @return Rrddata
     */
    public function rrdData(): Rrddata
    {
        return new Rrddata($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Creates a SPICE shell.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/spiceshell
     * @return Spiceshell
     */
    public function spiceShell(): Spiceshell
    {
        return new Spiceshell($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Start all VMs and containers located on this node (by default only those with onboot=1).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/startall
     * @return Startall
     */
    public function startAll(): Startall
    {
        return new Startall($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read node status
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/status
     * @return Status
     */
    public function status(): Status
    {
        return new Status($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Stop all VMs and Containers.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/stopall
     * @return Stopall
     */
    public function stopAll(): Stopall
    {
        return new Stopall($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read subscription info
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/subscription
     * @return Subscription
     */
    public function subscription(): Subscription
    {
        return new Subscription($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read system log
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/syslog
     * @return Syslog
     */
    public function syslog(): Syslog
    {
        return new Syslog($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Creates a VNC Shell proxy.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/termproxy
     * @return Termproxy
     */
    public function termProxy(): Termproxy
    {
        return new Termproxy($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read server time and time zone settings.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/time
     * @return Time
     */
    public function time(): Time
    {
        return new Time($this->getPve(), $this->getPathAdditional());
    }

    /**
     * API version details
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/version
     * @return Version
     */
    public function version(): Version
    {
        return new Version($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Creates a VNC Shell proxy.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/vncshell
     * @return Vncshell
     */
    public function vncShell(): Vncshell
    {
        return new Vncshell($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Opens a websocket for VNC traffic.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/vncwebsocket
     * @return Vncwebsocket
     */
    public function vncWebSocket(): Vncwebsocket
    {
        return new Vncwebsocket($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Download appliance templates.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/wakeonlan
     * @return Wakeonlan
     */
    public function wakeOnLan(): Wakeonlan
    {
        return new Wakeonlan($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Node index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}