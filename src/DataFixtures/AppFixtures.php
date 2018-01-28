<?php

namespace App\DataFixtures;

use App\Entity\Exhibit;
use App\Entity\News;
use App\Entity\Performance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture{

    public function load(ObjectManager $manager){
        for($i=11; $i<21; $i++){
            $exhibit = new Exhibit();

            $exhibit->setTitle("Mostra ".$i);
            $exhibit->setImage("news".rand(1,3).".jpg");
            $exhibit->setDescription("Descrizione mostra ".$i);
            $exhibit->setYear(2017);

            $manager->persist($exhibit);
            $manager->flush();

            $news = new News();

            $news->setSourceId($exhibit->getId());
            $news->setSource('Exhibit');

            $manager->persist($news);
            $manager->flush();
        } 

        for($i=1; $i<11; $i++){
            $exhibit = new Exhibit();

            $exhibit->setTitle("Mostra ".$i);
            $exhibit->setImage("news".rand(1,3).".jpg");
            $exhibit->setDescription("Descrizione mostra ".$i);
            $exhibit->setYear(2018);

            $manager->persist($exhibit);
            $manager->flush();

            $news = new News();

            $news->setSourceId($exhibit->getId());
            $news->setSource('Exhibit');

            $manager->persist($news);
            $manager->flush();
        } 

        for($i=11; $i<21; $i++){
            $performance = new Performance();

            $performance->setTitle("Performance ".$i);
            $performance->setImage("performance".rand(1,3).".jpg");
            $performance->setDescription("Descrizione performance ".$i);
            $performance->setWhendate(new \DateTime('2017-8-19'));

            $manager->persist($performance);
            $manager->flush();

            $news = new News();

            $news->setSourceId($performance->getId());
            $news->setSource('Performance');

            $manager->persist($news);
            $manager->flush();
        } 

        for($i=1; $i<11; $i++){
            $performance = new Performance();

            $performance->setTitle("Performance ".$i);
            $performance->setImage("performance".rand(1,3).".jpg");
            $performance->setDescription("Descrizione performance ".$i);
            $performance->setWhendate(new \DateTime('2018-08-20'));

            $manager->persist($performance);
            $manager->flush();

            $news = new News();

            $news->setSourceId($performance->getId());
            $news->setSource('Performance');

            $manager->persist($news);
            $manager->flush();
        } 

    }
}
