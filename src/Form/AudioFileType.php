<?php

namespace App\Form;

use App\Entity\AudioFile;
use App\Entity\Categorie;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AudioFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('miniature')
            ->add('duree')
            ->add('Transfer_link')
            //parametrage de mon select pour faire reference à ma db
            ->add('categorie', EntityType::class, [ 'class' => Categorie::class, 'choice_label' => 'titrecategorie' ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'required' => true,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AudioFile::class,
        ]);
    }
}
