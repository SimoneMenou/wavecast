<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\AudioFile;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $audiofile = new AudioFile();
            // si on a un hydrate, pas besoin de sets...
            $audiofile->setTitre("Episode ".$i);
            $audiofile->setDescription("Description".$i );
            $audiofile->setMiniature("Miniature".$i);
            $audiofile->setTransferLink("TransferLink");
            $audiofile->setCategorie($i + 20);
            $audiofile->setUser($i + 20);
            $manager->persist($audiofile);
        }

        $manager->flush();
    }
}
