<?php

namespace IpApi;

use InvalidArgumentException;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\TransferException;

/**
 * Class Client
 * @package IpApi
 */
class Client
{
    private const BASE_URI = 'http://ip-api.com';

    /** @var HttpClient */
    private $httpClient;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient([
            'base_uri' => self::BASE_URI,
        ]);
    }

    /**
     * @param string $ip
     *
     * @return IpInfo
     * @throws IpInfoException
     */
    public function getInfo(string $ip)
    {
        try {
            $response = $this->httpClient->request('GET', "/json/$ip");
            $data     = json_decode($response->getBody()->getContents(), true);

            return IpInfo::buildFromArray($data);
        } catch (TransferException $ex) {
            throw new IpInfoException($ex->getMessage(), $ex->getCode());
        }
    }


    /**
     * @param array $ips
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws IpInfoException
     */
    public function batchInfo(array $ips)
    {
        if (count($ips) > 100) {
            throw new InvalidArgumentException('Too many ips in one request');
        }

        $payload = [];
        foreach ($ips as $ip) {
            $payload[] = ['query' => $ip];
        }

        try {
            $response = $this->httpClient->request('POST', "/batch", ['body' => json_encode($payload)]);
            $data     = json_decode($response->getBody()->getContents(), true);
            $return   = [];
            foreach ($data as $item) {
                $return[] = IpInfo::buildFromArray($item);
            }

            return $return;
        } catch (TransferException $ex) {
            throw new IpInfoException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param string $ip
     *
     * @return array
     * @throws IpInfoException
     */
    public function getAsArray(string $ip): array
    {
        try {
            $response = $this->httpClient->request('GET', "/json/$ip");

            return json_decode($response->getBody()->getContents(), true);
        } catch (TransferException $ex) {
            throw new IpInfoException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param HttpClient $httpClient
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}