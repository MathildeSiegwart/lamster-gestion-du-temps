<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Nelmio\Alice\Loader\NativeLoader;
use Nelmio\Alice\ObjectSet;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $horaire= new NativeLoader();
        /** @var ObjectSet $objectSet */
        $objectSet = $horaire->loadFile(__DIR__.'/fixtures.yml');
//        dump($objectSet);
        dump(get_class($objectSet));
        foreach($objectSet->getObjects() as $value) {
            dump(get_class($value));
            $manager->persist($value);
        }

        $manager->flush();

    }
}
