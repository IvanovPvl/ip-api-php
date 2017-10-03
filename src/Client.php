<?php

namespace IpApi;

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
            $decoded = $this->getDecodedResponse($ip);

            return IpInfo::buildFromArray($decoded);
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
            return $decoded = $this->getDecodedResponse($ip);
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

    /**
     * @param string $ip
     *
     * @return array
     */
    private function getDecodedResponse(string $ip): array
    {
        $response = $this->httpClient->request('GET', "/json/$ip");

        return json_decode($response->getBody()->getContents(), true);
    }
}