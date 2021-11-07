<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node;

use Stratum\Proxmox\Api\Nodes\Node\Services\Service;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Services
 * @package Stratum\Proxmox\Api\Nodes\Node
 */
class Services extends PVEPathClassBase
{
    /**
     * Apt constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'services/');
    }

    /**
     * Directory index
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/services/{service}
     * @param string $service
     * @return \Stratum\Proxmox\Api\Nodes\Node\Services\Service
     */
    public function service(string $service): Service
    {
        return new Service($this->getPve(), $this->getPathAdditional() . $service . '/');
    }

    /**
     * Service list.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/services
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}