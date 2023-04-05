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
            $audiofile->setTitre("titre ".$i);
            $audiofile->setDescription("Description".$i );
            $audiofile->setMiniature("Miniature".$i);
            $audiofile->setTransferLink("duree".$i);
            $audiofile->setCategorie("Transfer_link".$i);
            $audiofile->setUser("categorie");
            $manager->persist($audiofile);
        }

        $manager->flush();
    }
}
