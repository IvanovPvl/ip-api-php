<?php

namespace Tests;

use Faker\Factory as FakerFactory;

/**
 * Class Factory
 */
class Factory
{
    /**
     * @param int $count
     *
     * @return array
     */
    public static function getSuccessData(int $count): array
    {
        $result = [];
        $faker  = FakerFactory::create();
        for ($i = 0; $i < $count; $i++) {
            $result[] = [
                'as'          => $faker->company,
                'zip'         => $faker->postcode,
                'isp'         => $faker->company,
                'lat'         => $faker->latitude,
                'lon'         => $faker->longitude,
                'org'         => $faker->company,
                'city'        => $faker->city,
                'query'       => $faker->ipv4,
                'region'      => $faker->stateAbbr,
                'status'      => 'success',
                'country'     => $faker->country,
                'timezone'    => $faker->timezone,
                'regionName'  => $faker->state,
                'countryCode' => $faker->stateAbbr,
            ];
        }

        return $result;
    }
}