<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Helper\Interfaces;


use Stratum\Proxmox\PVE;

interface PVEPathClassInterface
{

    /**
     * Domains constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional);

    /**
     * @return string
     */
    public function getPathAdditional(): string;

    /**
     * @param string $pathAdditional
     */
    public function setPathAdditional(string $pathAdditional): void;

    /**
     * @return PVE
     */
    public function getPve(): PVE;

    /**
     * @param PVE $pve
     */
    public function setPve(PVE $pve): void;

}