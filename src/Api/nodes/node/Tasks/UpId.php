<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Tasks;

use Stratum\Proxmox\Api\Nodes\Node\Tasks\UpId\Log;
use Stratum\Proxmox\Api\Nodes\Node\Tasks\UpId\Status;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class UpId
 * @package Stratum\Proxmox\Api\Nodes\Node\Tasks
 */
class UpId extends PVEPathClassBase
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
     * Read task log.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/tasks/{upid}/log
     * @return \Stratum\Proxmox\Api\Nodes\Node\Tasks\UpId\Log
     */
    public function log(): Log
    {
        return new Log($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Read task status.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/tasks/{upid}/status
     * @return \Stratum\Proxmox\Api\Nodes\Node\Tasks\UpId\Status
     */
    public function status(): Status
    {
        return new Status($this->getPve(), $this->getPathAdditional());
    }

    /**
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/tasks/{upid}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Stop a task.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/tasks/{upid}
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }
}