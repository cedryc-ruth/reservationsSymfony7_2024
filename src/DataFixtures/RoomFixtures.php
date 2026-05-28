<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Room;

class RoomFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            ['name'=>'Mars', 'seats'=>200, 'location'=>'espace-delvaux-la-venerie' ],
            ['name'=>'Jupiter', 'seats'=>200, 'location'=>'dexia-art-center' ],
            ['name'=>'Vénus', 'seats'=>200, 'location'=>'dexia-art-center' ],
            ['name'=>'Neptune', 'seats'=>200, 'location'=>'la-samaritaine' ],
        ];
        
        foreach ($data as $record) {
            $room = new Room();
            $room->setName($record['name']);
            $room->setSeats($record['seats']);
            $room->setLocation($this->getReference($record['location']));

            $manager->persist($room);

            $this->addReference($record['name'], $room);
        }

        $manager->flush();
    }

    public function getDependencies() {
        return [
            LocationFixtures::class,
        ];
    }
}
