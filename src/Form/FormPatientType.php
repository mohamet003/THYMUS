<?php

namespace App\Form;

use App\Entity\Patient;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormPatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom',TextType::class, [
                'label' => "Prénom",
                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => true
            ])
            ->add('nom',TextType::class, [
                'attr' => [
                    'label' => "Nom",
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => true
            ])
            ->add('ddn',DateType::class, [
                'label' => "Date de naissance",
                'widget' => 'single_text',
                'html5' => true,
                // this is actually the default format for single_text

                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => true
            ])
            ->add('sexe', ChoiceType::class, [
                'attr' => [
                    'class' => "validate"
                ],
                'required' => true,
                'choices' => [
                    'H' => 'H',
                    'F' => 'F'
                ]
            ])
            ->add('poids',NumberType::class, [
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '999',
                    'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'scale' =>2,
                'required' => false
            ])
            ->add('taille',NumberType::class, [
                'attr' => [

                    'class' => 'validate',
                    'min' => '0',
                    'max' => '400',
                    'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'scale' =>3,
                'rounding_mode' => \NumberFormatter::ROUND_HALFDOWN,
                'required' => false
            ])
            ->add('chirurgien_referent',ChoiceType::class, [
                'label' => "Chirurgien référent",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => true,
                'choices' => [
                    'DG' => 'DG',
                    'ASG' => 'ASG',
                    'MG' => 'MG',
                    'EB' => 'EB',
                    'GB' => 'GB'
                ]
            ])
            ->add('age',TextType::class, [
                'label' => "Age",
                'attr' => [
                    'autocomplete' => 'off',
                    'readonly' => true ,
                ],

                'required' => false
            ])
            ->add('imc',IntegerType::class, [
                'label' => "IMC",
                'attr' => [
                    'autocomplete' => 'off',
                    'step' => "0.001",
                    'readonly' => true ,
                ],

                'required' => false,
            ])


            ->add('ps',ChoiceType::class, [
                'label' => "PS",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off'
                ],
                'required' => true,
                'choices' => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6'
                ]
            ])
            ->add('score_charlson',ChoiceType::class, [
                'label' => "Score de Charlson",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off'
                ],
                'required' => true,
                'choices' => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '>6' => '>6'
                ]
            ])
            ->add('mode_de_decouverte',TextType::class, [
                'label' => "Mode de découverte",
                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => true
            ])
            ->add('mode_obt_his_pre_ope',ChoiceType::class, [
                'label' => "Mode d'obtension de l'His pré opératoire",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'modeHistoOnChange(event)'
                ],
                'required' => true,
                'choices' => [
                    'ponction' => 'ponction',
                    'TDM' => 'TDM',
                    'biopsie chirurgicale' => 'biopsie chirurgicale',
                    'pre op' => 'pre op',
                    'piece anapath' => 'pièce anapath',
                    'Autre' => 'Autre',

                ]
            ])

            ->add('autre_mode_obt_his_pre_ope',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('histo_pre_op',ChoiceType::class, [
                'label' => "Histologie pré op",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'histoOnChange(event)'
                ],
                'required' => true,
                'choices' => [
                    'thymome A' => 'thymome A ',
                    'thymome AB' => 'thymome AB',
                    'thymome B1' => 'thymome B1',
                    'thymome B2' => 'thymome B2',
                    'thymome B3' => 'thymome B3',
                    'thymome rare' => 'thymome rare',
                    'pièce anapath' => 'piece anapath',
                    'carcinoïde' => 'carcinoïde',
                    'carcinoide typique' => 'carcinoide typique',
                    'carcinoide atypique' => 'carcinoide atypique',
                    'Autre' => 'Autre',

                ]
            ])
            ->add('autre_histo_pre_op',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('indication',ChoiceType::class, [
                'label' => "Indication",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off'
                ],
                'required' => true,
                'choices' => [
                    'myasthénie' => 'myasthénie',
                    'tumeur médiastinale loge thymique' => 'tumeur médiastinale loge thymique'

                ]
            ])

            ->add('cons_neu_dep_mg_pre_op',ChoiceType::class, [
                'label' => "Consult de neurologie de dépistage MG pré op",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'consNeuOnChange(event)'
                ],
                'required' => true,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                    'Autre' => 'Autre',
                ]
            ])
            ->add('autre_cons_neu_dep_mg_pre_op',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('score_myast_pre_op',NumberType::class, [
                'label' => 'Score myasthénique pré opératoire' ,
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '100',
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'required' => false
            ])
            ->add('trai_fond_myasthenie',ChoiceType::class, [
                'label' => "Traitement de fond myasthénie",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'traiFondOnChange(event)'
                ],
                'required' => true,
                'choices' => [
                    'mestinon' => 'mestinon',
                    'cortisone' => 'cortisone',
                    'mytelase' => 'mytelase',
                    'Autre' => 'Autre',
                ]
            ])
            ->add('autre_trai_fond_myasthenie',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('irm',ChoiceType::class, [
                'label' => "IRM ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off'
                ],
                'required' => true,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('autre_irm',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('tdm',ChoiceType::class, [
                'label' => "TDM ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'tdmOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('autre_tdm',NumberType::class, [
                'label' => 'Taille' ,
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '400',
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'required' => false
            ])
            ->add('petscan',ChoiceType::class, [
                'label' => "PETscan ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'petscanOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('autre_petscan',NumberType::class, [
                'label' => 'SUV m' ,
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'required' => false
            ])
            ->add('chimio_pre_op')
            ->add('reponse_chimio_pre_op')


            ->add('tnm_t',ChoiceType::class, [
                'label' => "T ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'tOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'T1a' => 'T1a',
                    'T1b' => 'T1b',
                    'T2' => 'T2',
                    'T3' => 'T3',
                    'T4' => 'T4',
                    'Autre' => 'Autre'
                ]
            ])

            ->add('tnm_n',ChoiceType::class, [
                'label' => "N ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'nOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'N0' => 'N0',
                    'N1' => 'N1',
                    'N2' => 'N2',
                    'Autre' => 'Autre'
                ]
            ])

            ->add('tnm_m',ChoiceType::class, [
                'label' => "M",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'nOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'M0' => 'M0',
                    'M1a' => 'M1a',
                    'M1b' => 'M1b',
                    'Autre' => 'Autre'
                ]
            ])


            ->add('tnm_stade_ctnm',ChoiceType::class, [
                'label' => "Stade cTNM",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'stadeOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'I' => 'I',
                    'II' => 'II',
                    'IIIA' => 'IIIA',
                    'IIIB' => 'IIIB',
                    'IVA' => 'IVA',
                    'IVB' => 'IVB',
                    'Autre' => 'Autre'
                ]
            ])
            ->add('autre_tnm_t',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
               'required' => false
            ])
            ->add('autre_tnm_n',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('autre_tnm_m',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('autre_stade',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('stade_masaoka_pre_op')
            ->add('maladi_auto_imm_assoc')
            ->add('syndrome_paraneo')



            ->add('epp',ChoiceType::class, [
                'label' => "EPP",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',

                ],
                'required' => false,
                'choices' => [
                    'hypergamma' => 'hypergamma',
                    'hypogamma' => 'hypogamma',
                    'inconnu' => 'inconnu'
                ]
            ])
            ->add('anticorps_anti_rach',ChoiceType::class, [
                'label' => "Anticorps  anti RACh",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',

                ],
                'required' => false,
                'choices' => [
                    'positif' => 'positif',
                    'négatif' => 'négatif',
                    'non réalisé' => 'non réalisé'
                ]
            ])


            ->add('rcp_rythmique')


            ->add('chir_date_ope', DateType::class, [
                    'label' => "Date opératoire ",
                    'widget' => 'single_text',
                    'html5' => true,
                    'attr' => [
                        'class' => 'validate',
                        'autocomplete' => 'off'
                    ],
                    'required' => false
                ])

            ->add('chir_abord',ChoiceType::class, [
                'label' => "Abord",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'abordOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'sternotomie' => 'sternotomie',
                    'thoracoscopie' => 'thoracoscopie',
                    'thoracotomie droite' => 'thoracotomie droite',
                    'thoracotomie gauche' => 'thoracotomie gauche'
                ]
            ])

            ->add('chir_thoracos',ChoiceType::class, [
                'label' => "Thoracoscopie",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    'bilatérale' => 'bilatérale',
                    'Unilatérale droite' => 'Unilatérale droite',
                    'Unilatérale gauche' => 'Unilatérale gauche',
                    'Sous xyph' => 'Sous xyph'
                ]
            ])

            ->add('chir_robo_assist',ChoiceType::class, [
                'label' => "Robot assistée",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])

            ->add('chir_geste',ChoiceType::class, [
                'label' => "Geste ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'gesteOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'hymectomie radicale' => 'hymectomie radicale',
                    'thymectomie partielle' => 'thymectomie partielle',
                    'thymomectomie' => 'thymomectomie',
                    'Autre' => 'Autre',
                ]
            ])

            ->add('autre_chir_geste',TextType::class, [
                'label' => 'Autres...',
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('commentaire',TextareaType::class, [
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'materialize-textarea'
                ],
                'required' => false
            ])


            ->add('insufflation_co2',ChoiceType::class, [
                'label' => "Insufflation CO2",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('conversion',TextType::class, [
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('chir_duree',NumberType::class, [
                'label' => 'Durée' ,
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'required' => false
            ])


            ->add('chir_sang',NumberType::class, [
                'label' => 'Sang',
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '100000',
                    'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                'scale' =>2,
                'required' => false
            ])
            ->add('mortalite_par_ope',ChoiceType::class, [
                'label' => "Mortalité pre opératoire",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('complication_pre_ope',TextType::class, [
                'label' => "Complication pre opératoire",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('chir_drainage',ChoiceType::class, [
                'label' => "Drainage",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    '1 drain' => '1 drain',
                    '2 drains' => '2 drains',
                    '3 drains' => '3 drains',
                    '4 drains' => '4 drains'
                ]
            ])
            ->add('chir_interv_interac',ChoiceType::class, [
                'label' => "Intervention itérative",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])

            ->add('qualite_resection',ChoiceType::class, [
                'label' => "Intervention itérative",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                ],
                'required' => false,
                'choices' => [
                    'R0' => 'R0',
                    'R1' => 'R1',
                    'R2' => 'R2',
                    'inconnu' => 'inconnu',
                ]
            ])


            ->add('anapath_post_op')
            ->add('pre_op_x_tnm')
            ->add('post_tnm_t')
            ->add('post_tnm_n')
            ->add('post_tnm_m')
            ->add('post_tnm_stade_ctnm')
            ->add('rea_usc_post_op')
            ->add('post_op_suites')
            ->add('post_op_duree_drainage')
            ->add('pre_op_duree_rea')
            ->add('post_op_date_sortie')
            ->add('chimio_post_op')
            ->add('radiotherapie_post_op')
            ->add('date_der_nouvelles')
            ->add('suivi_myasthenie')
            ->add('score_mya_post_op')
            ->add('recidive')
            ->add('date_recidive')
            ->add('localisation_recidive')
            ->add('traitement_rechute_recidive')
            ->add('num_acp')
            ->add('deces')
            ->add('cause_deces')
            ->add('elios')
            ->add('date_diag_acp')
            ->add('id_acp')
            ->add('tissu_congele')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
