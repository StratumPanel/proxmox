<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\BackupInfo;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class NotBackedUp
 * @package Stratum\Proxmox\Api\Cluster\Backupinfo
 */
class NotBackedUp extends PVEPathClassBase
{
    /**
     * NotBackedUp constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'not-backed-up/');
    }

    /**
     * Shows all guests which are not covered by any backup job.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/backup-info/not-backed-up
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}