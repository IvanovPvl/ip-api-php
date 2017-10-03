<?php

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Client as HttpClient;

use IpApi\Client;

/**
 * Class ClientTest
 */
class ClientTest extends TestCase
{
    public function testSuccess(): void
    {
        $client = $this->setupClient();
        $info   = $client->getInfo('8.8.8.8');

        $mockedData = $this->getMockSuccessData();
        $this->assertEquals($mockedData['as'], $info->getAs());
        $this->assertEquals($mockedData['city'], $info->getCity());
        $this->assertEquals($mockedData['country'], $info->getCountry());
        $this->assertEquals($mockedData['countryCode'], $info->getCountryCode());
        $this->assertEquals($mockedData['isp'], $info->getIsp());
        $this->assertEquals($mockedData['lat'], $info->getLat());
        $this->assertEquals($mockedData['lon'], $info->getLon());
        $this->assertEquals($mockedData['org'], $info->getOrg());
        $this->assertEquals($mockedData['query'], $info->getQuery());
        $this->assertEquals($mockedData['region'], $info->getRegion());
        $this->assertEquals($mockedData['regionName'], $info->getRegionName());
        $this->assertEquals($mockedData['status'], $info->getStatus());
        $this->assertEquals($mockedData['timezone'], $info->getTimezone());
        $this->assertEquals($mockedData['zip'], $info->getZip());
    }

    private function getMockSuccessData(): array
    {
        return [
            'as'          => 'AS15169 Google Inc.',
            'zip'         => '',
            'isp'         => 'Google',
            'lat'         => '37.4229',
            'lon'         => '-122.085',
            'org'         => 'Google',
            'city'        => 'Mountain View',
            'query'       => '8.8.8.8',
            'region'      => 'CA',
            'status'      => 'success',
            'country'     => 'United Sates',
            'timezone'    => 'America/Los_Angeles',
            'regionName'  => 'California',
            'countryCode' => 'US',
        ];
    }

    private function setupClient(): Client
    {
        $mockClient = new MockHandler([
            new Response(200, [], json_encode($this->getMockSuccessData()))
        ]);
        $handler    = HandlerStack::create($mockClient);
        $httpClient = new HttpClient(['handler' => $handler]);

        $client = new Client();
        $client->setHttpClient($httpClient);

        return $client;
    }
}