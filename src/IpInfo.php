<?php

namespace IpApi;

/**
 * Class IpInfo
 * @package IpApi
 */
class IpInfo
{
    /** @var string */
    private $status;

    /** @var string */
    private $country;

    /** @var string */
    private $countryCode;

    /** @var string */
    private $region;

    /** @var string */
    private $regionName;

    /** @var string */
    private $city;

    /** @var string */
    private $zip;

    /** @var float */
    private $lat;

    /** @var float */
    private $lon;

    /** @var string */
    private $timezone;

    /** @var string */
    private $isp;

    /** @var string */
    private $org;

    /** @var string */
    private $as;

    /** @var string|null */
    private $reverse;

    /** @var bool|null */
    private $mobile;

    /** @var bool|null */
    private $proxy;

    /** @var string */
    private $query;

    /** @var string */
    private $message;

    public static function buildFromArray(array $data): IpInfo
    {
        $info              = new static();
        $info->as          = array_get($data, 'as', '');
        $info->zip         = array_get($data, 'zip', '');
        $info->lat         = array_get($data, 'lat', 0);
        $info->lon         = array_get($data, 'lon', 0);
        $info->isp         = array_get($data, 'isp', '');
        $info->org         = array_get($data, 'org', '');
        $info->city        = array_get($data, 'city', '');
        $info->proxy       = array_get($data, 'proxy');
        $info->query       = array_get($data, 'query', '');
        $info->status      = array_get($data, 'status', '');
        $info->region      = array_get($data, 'region', '');
        $info->mobile      = array_get($data, 'mobile');
        $info->country     = array_get($data, 'country', '');
        $info->reverse     = array_get($data, 'reverse');
        $info->message     = array_get($data, 'message', '');
        $info->timezone    = array_get($data, 'timezone', '');
        $info->regionName  = array_get($data, 'regionName', '');
        $info->countryCode = array_get($data, 'countryCode', '');

        return $info;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getRegionName(): string
    {
        return $this->regionName;
    }

    /**
     * @param string $regionName
     */
    public function setRegionName(string $regionName)
    {
        $this->regionName = $regionName;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat(float $lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     */
    public function setLon(float $lon)
    {
        $this->lon = $lon;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getIsp(): string
    {
        return $this->isp;
    }

    /**
     * @param string $isp
     */
    public function setIsp(string $isp)
    {
        $this->isp = $isp;
    }

    /**
     * @return string
     */
    public function getOrg(): string
    {
        return $this->org;
    }

    /**
     * @param string $org
     */
    public function setOrg(string $org)
    {
        $this->org = $org;
    }

    /**
     * @return string
     */
    public function getAs(): string
    {
        return $this->as;
    }

    /**
     * @param string $as
     */
    public function setAs(string $as)
    {
        $this->as = $as;
    }

    /**
     * @return string|null
     */
    public function getReverse(): ?string
    {
        return $this->reverse;
    }

    /**
     * @param string $reverse
     */
    public function setReverse(string $reverse)
    {
        $this->reverse = $reverse;
    }

    /**
     * @return bool|null
     */
    public function isMobile(): ?bool
    {
        return $this->mobile;
    }

    /**
     * @param bool $mobile
     */
    public function setMobile(bool $mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return bool|null
     */
    public function isProxy(): ?bool
    {
        return $this->proxy;
    }

    /**
     * @param bool $proxy
     */
    public function setProxy(bool $proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query)
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}