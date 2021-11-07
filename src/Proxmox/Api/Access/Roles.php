<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Access;

use Stratum\Proxmox\Api\Access\Roles\RoleId;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class roles
 * @package Stratum\Proxmox\api\access
 */
class Roles extends PVEPathClassBase
{
    /**
     * Roles constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'roles/');
    }

    /**
     * Get role configuration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/roles/{roleid}
     * @param string $roleId
     * @return RoleId
     */
    public function roleId(string $roleId): RoleId
    {
        return new RoleId($this->getPve(), $this->getPathAdditional() . $roleId . '/');
    }

    /**
     * Role index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/roles
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Create new role.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/roles
     * @param array $params
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}