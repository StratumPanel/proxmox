<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Replication;

use Stratum\Proxmox\Api\Nodes\Node\Replication\Id\Log;
use Stratum\Proxmox\Api\Nodes\Node\Replication\Id\ScheduleNow;
use Stratum\Proxmox\Api\Nodes\Node\Replication\Id\Status;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Id
 * @package Stratum\Proxmox\Api\Nodes\Node\Replication
 */
class Id extends PVEPathClassBase
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
     * Read replication job log.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication/{id}/log
     * @return \Stratum\Proxmox\Api\Nodes\Node\Replication\Id\Log
     */
    public function log(): Log
    {
        return new Log($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Schedule replication job to start as soon as possible.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication/{id}/schedule_now
     * @return \Stratum\Proxmox\Api\Nodes\Node\Replication\Id\ScheduleNow
     */
    public function scheduleNow(): ScheduleNow
    {
        return new ScheduleNow($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get replication job status.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication/{id}/status
     * @return \Stratum\Proxmox\Api\Nodes\Node\Replication\Id\Status
     */
    public function status(): Status
    {
        return new Status($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/replication/{id}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}