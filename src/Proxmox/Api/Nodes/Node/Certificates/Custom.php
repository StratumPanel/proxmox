<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Certificates;

use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Custom
 * @package Stratum\Proxmox\Api\Nodes\Node\Certificates
 */
class Custom extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'custom/');
    }

    /**
     * Upload or update custom certificate chain and key.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/certificates/custom
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

    /**
     * Upload or update custom certificate chain and key.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/certificates/custom
     * @return array|null
     */
    public function delete(): ?array
    {
        return $this->getPve()->getApi()->delete($this->getPathAdditional());
    }
}