<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $country = new Country();
        $country->setName('United States');
        $country->setIsoCode('us');
        $country->setCreatedAt(new \DateTime());
        $country->setUpdatedAt(new \DateTime());
        $manager->persist($country);

        $city = new City();
        $city->setName('Orlando');
        $city->setCode('orlando');
        $city->setCountry($country);
        $city->setLatitude(28.4159);
        $city->setLongitude(-81.2988);
        $city->setCreatedAt(new \DateTime());
        $city->setUpdatedAt(new \DateTime());
        $manager->persist($city);

        $city = new City();
        $city->setName('New York');
        $city->setCode('nyc');
        $city->setCountry($country);
        $city->setLatitude(40.6643);
        $city->setLongitude(-73.9385);
        $city->setCreatedAt(new \DateTime());
        $city->setUpdatedAt(new \DateTime());
        $manager->persist($city);

        $city = new City();
        $city->setName('Miami');
        $city->setCode('miami');
        $city->setLatitude(25.7751);
        $city->setLongitude(-80.2105);
        $city->setCountry($country);
        $city->setCreatedAt(new \DateTime());
        $city->setUpdatedAt(new \DateTime());
        $manager->persist($city);
        $manager->flush();
    }
}
