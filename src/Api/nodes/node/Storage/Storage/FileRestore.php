<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Storage\Storage;

use Stratum\Proxmox\Api\Nodes\Node\Storage\Storage\FileRestore\Download;
use Stratum\Proxmox\Api\Nodes\Node\Storage\Storage\FileRestore\Lists;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class FileRestore
 * @package Stratum\Proxmox\Api\Nodes\Node\Storage\Storage
 */
class FileRestore extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'file-restore/');
    }

    /**
     * Extract a file or directory (as zip archive) from a PBS backup.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage/{storage}/file-restore/download
     * @param string $Download
     * @return \Stratum\Proxmox\Api\Nodes\Node\Storage\Storage\FileRestore\Download
     */
    public function download(string $Download): Download
    {
        return new Download($this->getPve(), $this->getPathAdditional() . $Download . '/');
    }

    /**
     * List files and directories for single file restore under the given path.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/storage/{storage}/file-restore/list
     * @param string $List
     * @return \Stratum\Proxmox\Api\Nodes\Node\Storage\Storage\FileRestore\Lists
     */
    public function list(string $List): Lists
    {
        return new Lists($this->getPve(), $this->getPathAdditional() . $List . '/');
    }
}