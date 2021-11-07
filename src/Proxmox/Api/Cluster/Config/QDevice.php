<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster\Config;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class QDevice
 * @package Stratum\Proxmox\Api\Cluster\Config
 */
class QDevice extends PVEPathClassBase
{

    /**
     * QDevice constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'qdevice/');
    }

    /**
     * Get QDevice status
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/config/qdevice
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}