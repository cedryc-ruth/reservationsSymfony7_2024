<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Representation;

class RepresentationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            ['show'=>'ayiti', 'schedule'=>'2026-05-28 15:00:00', 'room'=>'Mars' ],
            ['show'=>'ayiti', 'schedule'=>'2026-05-28 20:30:00', 'room'=>'Jupiter' ],
            ['show'=>'ayiti', 'schedule'=>'2026-05-30 20:30:00', 'room'=>'Jupiter' ],
            ['show'=>'cible-mouvante', 'schedule'=>'2026-05-30 20:30:00', 'room'=>'Jupiter' ],
        ];
        
        foreach ($data as $record) {
            $representation = new Representation();
            $representation->setTheShow($this->getReference($record['show']));
            $representation->setSchedule(new \DateTime($record['schedule']));
            $representation->setRoom($this->getReference($record['room']));
            

            $manager->persist($representation);

            $this->addReference($record['show']."-".$record['schedule'], $representation);
        }

        $manager->flush();
    }

    public function getDependencies() {
        return [
            ShowFixtures::class,
            RoomFixtures::class,
        ];
    }
}
