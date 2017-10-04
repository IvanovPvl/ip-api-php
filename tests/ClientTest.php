<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use GuzzleHttp\{
    HandlerStack,
    Psr7\Response,
    Handler\MockHandler,
    Client as HttpClient
};

use IpApi\{
    Client,
    IpInfo
};

/**
 * Class ClientTest
 */
class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function success(): void
    {
        $mockedData = Factory::getSuccessData(1);
        $client = $this->setupClient($mockedData[0]);
        $info   = $client->getInfo('8.8.8.8');

        $this->assertEquals($mockedData[0]['as'], $info->getAs());
        $this->assertEquals($mockedData[0]['city'], $info->getCity());
        $this->assertEquals($mockedData[0]['country'], $info->getCountry());
        $this->assertEquals($mockedData[0]['countryCode'], $info->getCountryCode());
        $this->assertEquals($mockedData[0]['isp'], $info->getIsp());
        $this->assertEquals($mockedData[0]['lat'], $info->getLat());
        $this->assertEquals($mockedData[0]['lon'], $info->getLon());
        $this->assertEquals($mockedData[0]['org'], $info->getOrg());
        $this->assertEquals($mockedData[0]['query'], $info->getQuery());
        $this->assertEquals($mockedData[0]['region'], $info->getRegion());
        $this->assertEquals($mockedData[0]['regionName'], $info->getRegionName());
        $this->assertEquals($mockedData[0]['status'], $info->getStatus());
        $this->assertEquals($mockedData[0]['timezone'], $info->getTimezone());
        $this->assertEquals($mockedData[0]['zip'], $info->getZip());
    }

    /**
     * @test
     */
    public function batch(): void
    {
        $mockedData = Factory::getSuccessData(1);
        $client = $this->setupClient($mockedData);

        /** @var IpInfo[] $result */
        $result   = $client->batchInfo(['8.8.8.8', '8.8.8.9']);
        foreach ($result as $i => $info) {
            $this->assertEquals($mockedData[$i]['as'], $info->getAs());
            $this->assertEquals($mockedData[$i]['city'], $info->getCity());
            $this->assertEquals($mockedData[$i]['country'], $info->getCountry());
            $this->assertEquals($mockedData[$i]['countryCode'], $info->getCountryCode());
            $this->assertEquals($mockedData[$i]['isp'], $info->getIsp());
            $this->assertEquals($mockedData[$i]['lat'], $info->getLat());
            $this->assertEquals($mockedData[$i]['lon'], $info->getLon());
            $this->assertEquals($mockedData[$i]['org'], $info->getOrg());
            $this->assertEquals($mockedData[$i]['query'], $info->getQuery());
            $this->assertEquals($mockedData[$i]['region'], $info->getRegion());
            $this->assertEquals($mockedData[$i]['regionName'], $info->getRegionName());
            $this->assertEquals($mockedData[$i]['status'], $info->getStatus());
            $this->assertEquals($mockedData[$i]['timezone'], $info->getTimezone());
            $this->assertEquals($mockedData[$i]['zip'], $info->getZip());
        }
    }

    private function setupClient(array $mockedData): Client
    {
        $mockClient = new MockHandler([
            new Response(200, [], json_encode($mockedData))
        ]);
        $handler    = HandlerStack::create($mockClient);
        $httpClient = new HttpClient(['handler' => $handler]);

        $client = new Client();
        $client->setHttpClient($httpClient);

        return $client;
    }
}