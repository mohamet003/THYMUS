<?php


namespace App\Form;

use App\Entity\Service;
use App\Entity\Specialite;
use App\Entity\User;
use App\Repository\ServiceRepository;
use App\Repository\SpecialiteRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('login', TextType::class, [
                'attr' => [
                    'label' => "Identifiant ",
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'label' => "Prénom ",
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'label' => "Nom ",
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('matricule', TextType::class, [
                'attr' => [
                    'label' => "Matricule ",
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('rights', ChoiceType::class, [
                'label' => "Droits d'accès",
                'attr' => [
                    'class' => "validate"
                ],

                'choices' => [
                    'Consultation seule' => 'consultation',
                    'Standard' => 'standard',
                    'Référent de service' => 'referent',
                    'Administrateur' => 'administrateur',
                ]
            ])
            ->add('initiales', TextType::class, ['label' => "Initiales"])
            ->add('tel1', TextType::class, ['label' => "Téléphone IMM", 'required' => false])
            ->add('tel2', TextType::class, ['label' => "Téléphone Portable Personnel", 'required' => false])
            ->add('tel3', TextType::class, ['label' => "Téléphone Domicile", 'required' => false])
            ->add('tel4', TextType::class, ['label' => "Téléphone Autre", 'required' => false])
            /*
                        ->add('service', CollectionType::class, [
                        // each entry in the array will be an "email" field

                        'entry_type' => Service::class,
                          'allow_add' => true,
                          'allow_delete' => true,
                        // these options are passed to each "email" type

                          'entry_options' => [
                            'attr' => [
                              'class' => "validate select2-size-sm browser-default",
                              'id' => "small-select-multi"
                            ],
                            'choice_label' => 'nom',
                            'query_builder' => function (ServiceRepository $er) {
                              return $er->getQueryBuilder();
                            },
                            'multiple' => true,
                          ],
                          'label' => "Service ou département ",
                      ])
            */

            /*
              ->add('service', EntityType::class, [
                'multiple' => true,
                'attr' => [
                  'class' => "validate select2-size-sm browser-default",
                  'id' => "small-select-multi"
                ],
                'class'=> Service::class,
                'label' => "Service ou département ",
                'query_builder' => function (ServiceRepository $er) {
                  return $er->getQueryBuilder();
                },
                'choice_label' => 'nom',
              ])
            */
            ->add('userServices', EntityType::class, [
                'multiple' => true,
                'attr' => [
                    'class' => "validate"
                ],
                'class' => Service::class,
                'label' => "Service ou département ",
                'query_builder' => function (ServiceRepository $er) {
                    return $er->getQueryBuilder()->orderBy('s.nom', 'ASC');;
                },
                'choice_label' => 'nom',
            ])
            ->add('specialite', EntityType::class, [
                'attr' => [
                    'class' => "validate"
                ],
                'class' => Specialite::class,
                'label' => "Spécialité ou métier ",
                'query_builder' => function (SpecialiteRepository $er) {
                    return $er->getQueryBuilder()->orderBy('s.nom', 'ASC');
                },
                'choice_label' => 'nom',
            ])
            //->add('isActive',Choice,['label'=>"Activer"])
            //->add('dateCreated')
            //->add('dateModif')
            //->add('service')
            //->add('specialite')
            ->add('tel5', TextType::class, ['label' => "BIP", 'required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
