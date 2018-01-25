<?php

namespace App\DataFixtures;

use App\Entity\Exhibit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture{

    public function load(ObjectManager $manager){
        for($i=1; $i<11; $i++){
            $exhibit = new Exhibit();

            $exhibit->setTitle("Mostra ".$i);
            $exhibit->setImage("locandina".$i);
            $exhibit->setDescription("Descrizione mostra ".$i);
            $exhibit->setYear(2018);

            $manager->persist($exhibit);
        } 

        $manager->flush();
    }
}
