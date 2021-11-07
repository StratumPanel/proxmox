<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Access;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Permission
 * @package Stratum\Proxmox\Api\Access
 */
class Permission extends PVEPathClassBase
{

    /**
     * Access constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'permission/');
    }

    /**
     * Retrieve effective permissions of given user/token.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/permissions
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}