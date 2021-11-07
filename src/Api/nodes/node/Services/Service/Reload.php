<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Services\Service;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Reload
 * @package Stratum\Proxmox\Api\Nodes\Node\Services\Service
 */
class Reload extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'reload/');
    }

    /**
     * Reload service. Falls back to restart if service cannot be reloaded.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/services/{service}/reload
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }
}