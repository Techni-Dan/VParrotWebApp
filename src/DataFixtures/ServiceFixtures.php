<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            $service = new Service();
            $service->setTitre('Réparation de la carrosserie et de mécanique');
            $service->setDescription1('Bienvenue sur notre site dédié à la réparation de carrosserie et de mécanique automobile ! Chez nous, nous sommes fiers d\'offrir une gamme complète de services de réparation pour votre véhicule, qu\'il s\'agisse de redonner à votre carrosserie son éclat d\'origine ou de résoudre des problèmes mécaniques complexes.');
            $service->setDescription2('Notre équipe de professionnels expérimentés est spécialisée dans la réparation de carrosserie. Que votre voiture ait subi des dommages mineurs ou nécessite une réparation plus importante suite à une collision, nous sommes là pour restaurer son apparence et sa structure avec précision. Nous utilisons des techniques avancées et des matériaux de haute qualité pour garantir des résultats durables et esthétiquement impeccables.');
            $service->setDescription3('Contactez-nous dès aujourd\'hui pour prendre rendez-vous ou pour obtenir plus d\'informations sur nos services de réparation de carrosserie et de mécanique. Notre équipe amicale est là pour répondre à toutes vos questions et pour vous fournir des solutions adaptées à vos besoins. Faites confiance à notre expertise et redonnez à votre véhicule son état optimal !');
            $service->setImageName('carrepair-1-65660625469be295654203.jpg');
            $service->setImageSize('1087991');
            $service->setUpdatedAt(new \DateTimeImmutable());
            $service->setListeitem1('Réparation et remplacement de pièces de carrosserie');
            $service->setListeitem2('Débosselage, ponçage');
            $service->setListeitem3('Réparation moteur et boîte vitesses');
            $service->setListeitem4('Recherche de pannes mécaniques');
            $service->setListeitem5('Diagnostic embarqué toutes marques');
            $manager->persist($service);
              
            $service = new Service();
            $service->setTitre('Entretien régulier');
            $service->setDescription1('Chez nous, nous comprenons que votre voiture est un investissement précieux, et c\'est pourquoi nous proposons une gamme complète de services d\'entretien professionnel pour garantir son bon fonctionnement.');
            $service->setDescription2('Notre équipe qualifiée de techniciens automobiles expérimentés est là pour prendre soin de votre véhicule, qu\'il s\'agisse d\'une petite citadine, d\'un SUV familial ou d\'une voiture de sport. Nous nous engageons à fournir des services d\'entretien de qualité supérieure pour prolonger la durée de vie de votre voiture, améliorer sa performance et maintenir votre sécurité sur la route.');
            $service->setDescription3('N\'hésitez pas à nous contacter pour planifier un rendez-vous d\'entretien ou pour obtenir des informations supplémentaires sur nos services. Nous sommes là pour vous aider à prendre soin de votre véhicule et à garantir qu\'il fonctionne de manière optimale pour les années à venir. Faites confiance à notre expertise et laissez-nous prendre soin de votre voiture avec le plus grand soin.');
            $service->setImageName('carmaintenance1-65660735a6953931418017.jpg');
            $service->setImageSize('1139896');
            $service->setUpdatedAt(new \DateTimeImmutable());
            $service->setListeitem1('Entretien, révision, vidange');
            $service->setListeitem2('Climatisation (recharge, installation, détection de fuite)');
            $service->setListeitem3('Pré-contrôle technique');
            $service->setListeitem4('Diagnostic suspension-amortisseurs');
            $service->setListeitem5('Freins (plaquettes, disques, étriers)');
            $manager->persist($service);

        $manager->flush();
    }
}
