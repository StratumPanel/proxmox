<?php
/**
 * @copyright 2019 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api;

use Stratum\Proxmox\Api\Access\Acl;
use Stratum\Proxmox\Api\Access\Domains;
use Stratum\Proxmox\Api\Access\Groups;
use Stratum\Proxmox\Api\Access\OpenId;
use Stratum\Proxmox\Api\Access\Password;
use Stratum\Proxmox\Api\Access\Permission;
use Stratum\Proxmox\Api\Access\Roles;
use Stratum\Proxmox\Api\Access\Tfa;
use Stratum\Proxmox\Api\Access\Ticket;
use Stratum\Proxmox\Api\Access\Users;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class access
 * @package Stratum\Proxmox\api
 */
class Access extends PVEPathClassBase
{

    /**
     * Access constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'access/');
    }

    /**
     * Authentication domain index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/domains
     * @return Domains
     */
    public function domains(): Domains
    {
        return new Domains($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/openid
     * @return OpenId
     */
    public function openId(): OpenId
    {
        return new OpenId($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Group index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/groups
     * @return Groups
     */
    public function groups(): Groups
    {
        return new Groups($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Role index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/roles
     * @return Roles
     */
    public function roles(): Roles
    {
        return new Roles($this->getPve(), $this->getPathAdditional());
    }

    /**
     * User index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/users
     * @return Users
     */
    public function users(): Users
    {
        return new Users($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Get Access Control List (ACLs).
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/acl
     * @return Acl
     */
    public function acl(): Acl
    {
        return new Acl($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Change user password.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/password
     * @return Password
     */
    public function password(): Password
    {
        return new Password($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Retrieve effective permissions of given user/token.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/permissions
     * @return Permission
     */
    public function permission(): Permission
    {
        return new Permission($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Change user u2f authentication.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/tfa
     * @return Tfa
     */
    public function tfa(): Tfa
    {
        return new Tfa($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Dummy. Useful for formatters which want to provide a login page.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access/ticket
     * @return Ticket
     */
    public function ticket(): Ticket
    {
        return new Ticket($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/access
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}