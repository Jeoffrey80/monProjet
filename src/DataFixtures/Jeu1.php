<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;
use App\Entity\Disc;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $artist1 = new Artist();
        $artist1->setArtistName("Queens Of The Stone Age");
        $artist1->setArtistUrl("https://qotsa.com/");
        $manager->persist($artist1);
        
        $artist2 = new Artist();
        $artist2->setArtistName("MM");
        $artist2->setArtistUrl("https://qotsa.com/");
        $manager->persist($artist2);

        $artist3 = new Artist();
        $artist3->setArtistName("U2");
        $artist3->setArtistUrl("https://qotsa.com/");
        $manager->persist($artist3);

        $disc1 = new Disc();
        $disc1->setDiscTitle("Songs for the Deaf");
        $disc1->setDiscPicture("https://en.wikipedia.org");
        $disc1->setDiscLabel("Interscope Records");
        $disc1->setDiscYear("1994");
        $manager->persist($disc1);
        $disc1->setArtist($artist1);// Pour associer vos entités


        $disc2 = new Disc();
        $disc2->setDiscTitle("Antichrist Superstar");
        $disc2->setDiscPicture("https://en.wikipedia.org");
        $disc2->setDiscLabel("Award");
        $disc2->setDiscYear("1994");
        $manager->persist($disc2);
        $disc2->setArtist($artist2);

        $disc3 = new Disc();
        $disc3->setDiscTitle("With or without you");
        $disc3->setDiscPicture("https://en.wikipedia.org");
        $disc3->setDiscLabel("Interscope Records");
        $disc3->setDiscYear("1994");
        $manager->persist($disc3);
        $disc3->setArtist($artist3);
        
        $manager->flush();
    }
}
