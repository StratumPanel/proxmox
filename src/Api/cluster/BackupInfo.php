<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster;

use Stratum\Proxmox\Api\Cluster\BackupInfo\NotBackedUp;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class BackupInfo
 * @package Stratum\Proxmox\Api\Cluster
 */
class BackupInfo extends PVEPathClassBase
{
    /**
     * BackupInfo constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'backup-info/');
    }

    /**
     * Shows all guests which are not covered by any backup job.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/backup-info/not-backed-up
     * @return NotBackedUp
     */
    public function notBackedUp(): NotBackedUp
    {
        return new NotBackedUp($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Index for backup info related endpoints
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/backup-info
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}