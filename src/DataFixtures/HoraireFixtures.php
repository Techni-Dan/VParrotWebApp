<?php

namespace App\DataFixtures;

use App\Entity\Horaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HoraireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
        foreach ($jours as $jour) {
            $horaire = new Horaire();
            $horaire->setJour($jour);
            $horaire->setOuvertureMatin('08:45');
            $horaire->setFermetureMidi('12:00');
            $horaire->setOuvertureApresMidi('14:00');
            $horaire->setFermetureSoir('18:00');
            $manager->persist($horaire);
        }
        $horaire = new Horaire();
        $horaire->setJour('Samedi');
        $horaire->setOuvertureMatin('08:45');
        $horaire->setFermetureMidi('12:00');
        $horaire->setOuvertureApresMidi('Fermé');
        $horaire->setFermetureSoir('Fermé');
        $manager->persist($horaire);

        $horaire = new Horaire();
        $horaire->setJour('Dimanche');
        $horaire->setOuvertureMatin('Fermé');
        $horaire->setFermetureMidi('Fermé');
        $horaire->setOuvertureApresMidi('Fermé');
        $horaire->setFermetureSoir('Fermé');
        $manager->persist($horaire);

        $manager->flush();
    }
}
