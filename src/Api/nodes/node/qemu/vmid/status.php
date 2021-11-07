<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 */
namespace Stratum\Proxmox\Api\nodes\node\qemu\vmid;

use GuzzleHttp\Client;
use Stratum\Proxmox\Helper\connection;

/**
 * Class status
 * @package Stratum\Proxmox\api\nodes\node\qemu\vmid
 */
class status
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * status constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $cookie mixed
     */
    public function __construct($httpClient,$apiURL,$cookie){
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable
    }

    /**
     * GET
     */

    /**
     * Directory index
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status
     * @return mixed|null
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie));
    }

    /**
     * Get virtual machine status.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/current
     * @return mixed|null
     */
    public function getCurrent(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL.'current/',$this->cookie));
    }

    /**
     * POST
     */

    /**
     * Reboot the VM by shutting it down, and starting it again. Applies pending changes.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/reboot
     * @param $params array
     * @return mixed|null
     */
    public function postReboot($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'reboot/',$this->cookie,$params));
    }

    /**
     * Reset virtual machine.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/reset
     * @param $params array
     * @return mixed|null
     */
    public function postReset($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'reset/',$this->cookie,$params));
    }

    /**
     * Resume virtual machine.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/resume
     * @param $params array
     * @return mixed|null
     */
    public function postResume($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'resume/',$this->cookie,$params));
    }

    /**
     * Shutdown virtual machine. This is similar to pressing the power button on a physical machine.This will send an ACPI event for the guest OS, which should then proceed to a clean shutdown.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/shutdown
     * @param $params array
     * @return mixed|null
     */
    public function postShutdown($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'shutdown/',$this->cookie,$params));
    }

    /**
     * Start virtual machine.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/start
     * @param $params array
     * @return mixed|null
     */
    public function postStart($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'start/',$this->cookie,$params));
    }

    /**
     * Stop virtual machine. The qemu process will exit immediately. Thisis akin to pulling the power plug of a running computer and may damage the VM data
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/stop
     * @param $params array
     * @return mixed|null
     */
    public function postStop($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'stop/',$this->cookie,$params));
    }

    /**
     * Suspend virtual machine.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/status/suspend
     * @param $params array
     * @return mixed|null
     */
    public function postSuspend($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.'suspend/',$this->cookie,$params));
    }
}