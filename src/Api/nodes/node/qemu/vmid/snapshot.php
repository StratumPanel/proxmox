<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 */
namespace Stratum\Proxmox\Api\nodes\node\qemu\vmid;

use GuzzleHttp\Client;
use Stratum\Proxmox\Api\nodes\qemu\snapshot\snapname;
use Stratum\Proxmox\Helper\connection;

/**
 * Class snapshot
 * @package Stratum\Proxmox\api\nodes\qemu\vmid
 */
class snapshot
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * snapshot constructor.
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
     * -
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}
     * @param $snapName string
     * @return snapname
     */
    public function snapname($snapName){
        return new snapname($this->httpClient,$this->apiURL.$snapName.'/',$this->cookie);
    }

    /**
     * GET
     */

    /**
     * List all snapshots.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/snapshot
     * @return mixed|null
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie));
    }

    /**
     * POST
     */

    /**
     * Snapshot a VM.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/snapshot
     * @param $params array
     * @return mixed|null
     */
    public function post($params){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL,$this->cookie,$params));
    }

        /**
     * POST
     */

    /**
     * Rollback VM state to specified snapshot.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}/rollback
     * @return mixed|null
     */
    public function postRollback($name){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL.$name.'/rollback/',$this->cookie));
    }

    /**
     * DELETE
     */

    /**
     * Delete a VM snapshot.
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/qemu/{vmid}/snapshot/{snapname}
     * @param $params array
     * @return mixed|null
     */
    public function delete($name){
        return connection::processHttpResponse(connection::deleteAPI($this->httpClient,$this->apiURL.$name,$this->cookie));
    }
}
