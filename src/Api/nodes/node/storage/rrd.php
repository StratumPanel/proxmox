<?php
/*
 * @copyright  2020 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\nodes\node\storage;

use GuzzleHttp\Client;
use Stratum\Proxmox\Helper\connection;

/**
 * Class content
 * @package Stratum\Proxmox\api\nodes\node\storage
 */
class rrd
{
    private $httpClient, //The http client for connection to proxmox
        $apiURL, //API url
        $cookie; //Proxmox auth cookie

    /**
     * content constructor.
     * @param $httpClient Client
     * @param $apiURL string
     * @param $cookie mixed
     */
    public function __construct(Client $httpClient, string $apiURL, $cookie)
    {
        $this->httpClient = $httpClient; //Save the http client from GuzzleHttp in class variable
        $this->apiURL = $apiURL; //Save api url in class variable and change this to current api path
        $this->cookie = $cookie; //Save auth cookie in class variable
    }

    /**
     * GET
     */

    /**
     * List storage content
     * @url https://pve.proxmox.com/pve-docs/api-viewer/index.html#/nodes/{node}/storage/{storage}/rrd
     * @param $params array
     * @return mixed|null
     */
    public function get(array $params)
    {
        return connection::processHttpResponse(connection::getAPI($this->httpClient, $this->apiURL, $this->cookie, $params));
    }

}
