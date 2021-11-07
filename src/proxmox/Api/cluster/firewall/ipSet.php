<?php
/**
 * @copyright 2020 Daniel Engelschalk <hello@mrkampf.com>
 */
namespace Stratum\Proxmox\Api\cluster\firewall;

use GuzzleHttp\Client;
use Stratum\Proxmox\Api\cluster\firewall\ipset\name;
use Stratum\Proxmox\Helper\connection;

/**
 * Class ipset
 * @package Stratum\Proxmox\api\cluster\firewall
 */
class ipSet
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * ipSet constructor.
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
     * List IPSet content
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/firewall/ipset/{name}
     * @param $name string
     * @return name
     */
    public function name($name){
        return new name($this->httpClient,$this->apiURL.$name.'/',$this->cookie);
    }

    /**
     * GET
     */

    /**
     * List IPSets
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/firewall/ipset
     * @return mixed|null
     */
    public function get(){
        return connection::processHttpResponse(connection::getAPI($this->httpClient,$this->apiURL,$this->cookie));
    }

    /**
     * POST
     */

    /**
     * Create new IPSet
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/cluster/firewall/ipset
     * @param $param array
     * @return mixed|null
     */
    public function post($param){
        return connection::processHttpResponse(connection::postAPI($this->httpClient,$this->apiURL,$this->cookie,$param));
    }
}