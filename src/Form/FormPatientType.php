<?php

namespace App\Form;

use App\Entity\Patient;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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

            ->add('elios',NumberType::class, [
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    //'max' => '999',
                 //   'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
              //  'scale' =>2,
                'required' => false
            ])
            ->add('date_diag_acp', DateType::class, [
                'label' => "Date de diagnostic ACP",
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('id_acp',TextType::class, [
                'label' => "ID ACP",
                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
           // ->add('tissu_congele')


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
                    'onchange' => 'chirOnChange(event)',
                    'autocomplete' => 'off'
                ],
                'required' => true,
                'choices' => [
                    'DG' => 'DG',
                    'ASG' => 'ASG',
                    'MG' => 'MG',
                    'EB' => 'EB',
                    'GB' => 'GB',
                    'Autre' => 'Autre'
                ]
            ])

            ->add('autre_chirurgien_referent',TextType::class, [
                'label' => "Autre",
                'attr' => [
                    'autocomplete' => 'off',
                ],
                'required' => false
            ])

            ->add('age',IntegerType::class, [
                'label' => "Age",
                'attr' => [
                    'autocomplete' => 'off',
                    'min' => '0',
                    'readonly' => true ,
                ],

                'required' => false
            ])
            ->add('imc',TextType::class, [
                'label' => "IMC",
                'attr' => [
                    'autocomplete' => 'off',
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
                'required' => false,
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
                'required' => false,
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
                'required' => false
            ])
            ->add('mode_obt_his_pre_ope',ChoiceType::class, [
                'label' => "Mode d'obtension de l'His pré opératoire",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'modeHistoOnChange(event)'
                ],
                'required' => false,
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
                'required' => false,
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
                'required' => false,
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
                'required' => false,
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
                'required' => false,
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
                'required' => false,
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


            ->add('chimio_pre_op',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('reponse_chimio_pre_op',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


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
                    'onchange' => 'mOnChange(event)'
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


            ->add('stade_masaoka_pre_op',ChoiceType::class, [
                'label' => "Stade Masaoka pre op",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',

                ],
                'required' => false,
                'choices' => [
                    'I' => 'I',
                    'II' => 'II',
                    'IIIa' => 'IIIa',
                    'IIIb' => 'IIIb',
                    'IVa' => 'IVa',
                    'IVb' => 'IVb',
                ]
            ])


            ->add('maladi_auto_imm_assoc',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('syndrome_paraneo',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])



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


            ->add('rcp_rythmique',TextType::class, [
                'label' => 'RCP rythmique',
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


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

            ->add('reste_riques',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('chir_txt_libre',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('vcs',CheckboxType::class, [
                'label' => "VCS",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('avc',CheckboxType::class, [
                'label' => "AVC",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('hta',CheckboxType::class, [
                'label' => "HTA",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])



            ->add('tvi',CheckboxType::class, [
                'label' => "TVI",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('od',CheckboxType::class, [
                'label' => "OD",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('og',CheckboxType::class, [
                'label' => "OG",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'mapped' => true,
                'required' => false
            ])


            ->add('aorte',CheckboxType::class, [
                'label' => "Aorte",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('ap',CheckboxType::class, [
                'label' => "AP",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('pericard',CheckboxType::class, [
                'label' => "péricarde",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('phreniqued',CheckboxType::class, [
                'label' => "Phrénique droit",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('phreniqueg',CheckboxType::class, [
                'label' => "Phrénique gauche",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('wedge',CheckboxType::class, [
                'label' => "Wedge",
                'mapped' => true,
                'required' => false
            ])


            ->add('lobectomie',CheckboxType::class, [
                'label' => "Lobectomie",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('pneug',CheckboxType::class, [
                'label' => "Pneumonectomie gauche",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('pneud',CheckboxType::class, [
                'label' => "Pneumonectomie droit",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('pneud',CheckboxType::class, [
                'label' => "Pneumonectomie droit",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('insRenChr',CheckboxType::class, [
                'label' => "Insuffisance rénale chronique",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('maladieThroVein',CheckboxType::class, [
                'label' => "Maladie thrombo-embolique veineuse",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('dyslipide',CheckboxType::class, [
                'label' => "Dyslipidémie",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('diabete',CheckboxType::class, [
                'label' => "Diabète",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('cancer',CheckboxType::class, [
                'label' => "Cancer",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('cardiopathie',CheckboxType::class, [
                'label' => "Cardiopathie",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('obesite',CheckboxType::class, [
                'label' => "Obésité",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('tabagisme',CheckboxType::class, [
                'label' => "Tabagisme",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('kystique',CheckboxType::class, [
                'label' => "Kystique",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('nonKystique',CheckboxType::class, [
                'label' => "Non kystique",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])


            ->add('solide',CheckboxType::class, [
                'label' => "Solide",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('mixte',CheckboxType::class, [
                'label' => "Mixte",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('nonrealise',CheckboxType::class, [
                'label' => "Non réalisé",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('donneeinconnue',CheckboxType::class, [
                'label' => "Donnée inconnue",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('decesChe',CheckboxType::class, [
                'label' => "Décès",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('pousse',CheckboxType::class, [
                'label' => "Poussée myasthéniquet",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('paralysie',CheckboxType::class, [
                'label' => "Paralysie phrénique",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('paralysieCur',CheckboxType::class, [
                'label' => "Paralysie concurrentielle",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('pneumopatie',CheckboxType::class, [
                'label' => "Pneumopathie",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('bullage',CheckboxType::class, [
                'label' => "Bullage > 5 jours",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('decollement',CheckboxType::class, [
                'label' => "Décollement",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('saignement',CheckboxType::class, [
                'label' => "Saignement",
                'mapped' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('infection',CheckboxType::class, [
                'label' => "Infection",
                'mapped' => true,
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

            ->add('anapath_post_op',ChoiceType::class, [
                'label' => "Anapath post op",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'histopOnChange(event)'
                ],
                'required' => false,
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

            ->add('autre_anapath_post_op',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('post_tnm_t',ChoiceType::class, [
        'label' => "T ",
        'attr' => [
            'class' => "validate",
            'autocomplete' => 'off',
            'onchange' => 'tpOnChange(event)'
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

            ->add('autre_post_tnm_t',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('post_tnm_n',ChoiceType::class, [
                'label' => "N ",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'npOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'N0' => 'N0',
                    'N1' => 'N1',
                    'N2' => 'N2',
                    'Autre' => 'Autre'
                ]
            ])

            ->add('autre_post_tnm_n',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('post_tnm_m',ChoiceType::class, [
                'label' => "M",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'mpOnChange(event)'
                ],
                'required' => false,
                'choices' => [
                    'M0' => 'M0',
                    'M1a' => 'M1a',
                    'M1b' => 'M1b',
                    'Autre' => 'Autre'
                ]
            ])

            ->add('autre_post_tnm_m',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('post_tnm_stade_ctnm',ChoiceType::class, [
                'label' => "Stade cTNM",
                'attr' => [
                    'class' => "validate",
                    'autocomplete' => 'off',
                    'onchange' => 'stadepOnChange(event)'
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

            ->add('autre_post_tnm_stade_ctnm',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('rea_usc_post_op',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('duree_rean',NumberType::class, [
                'label' => 'Durée de réanimation',
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '360',
                  //  'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
             //   'scale' =>2,
                'required' => false
            ])

            ->add('autre_post_op_suites',TextType::class, [
                'label' => "Autre...",
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('post_op_duree_drainage',NumberType::class, [
                'label' => 'Durée de drainage',
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '360',
                    //  'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                //   'scale' =>2,
                'required' => false
            ])

           // ->add('pre_op_duree_rea')
            ->add('post_op_date_sortie', DateType::class, [
               'label' => "Date de sortie",
               'widget' => 'single_text',
               'html5' => true,
               'attr' => [
                   'class' => 'validate',
                   'autocomplete' => 'off',
               ],
               'required' => false
           ])

            ->add('chimio_post_op',TextareaType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "254"
                ],
                'required' => false
            ])

            ->add('radiotherapie_post_op',TextareaType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "254"
                ],
                'required' => false
            ])

            ->add('date_der_nouvelles', DateType::class, [
                'label' => "Date de dernières nouvelles",
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('suivi_myasthenie',TextareaType::class, [
                'label' => 'Suivi myasthénie ',
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "1000"
                ],
                'required' => false
            ])

            ->add('score_mya_post_op',NumberType::class, [
                'label' => 'Score myasthénique post opératoire',
                'attr' => [
                    'class' => 'validate',
                    'min' => '0',
                    'max' => '360',
                    //  'step' => "0.01",
                    'autocomplete' => 'off'
                ],
                'html5' => true,
                //   'scale' =>2,
                'required' => false
            ])

            ->add('lobectomie_txt',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            ->add('wedge_txt',TextType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])

            //->add('recidive')
            ->add('date_recidive', DateType::class, [
                'label' => "Date ",
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'validate',
                    'autocomplete' => 'off'
                ],
                'required' => false
            ])
            ->add('localisation_recidive',TextareaType::class, [
                'label' => 'Localisation',
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "255"
                ],
                'required' => false
            ])
            ->add('traitement_rechute_recidive',TextareaType::class, [
                'label' => 'Traitement de la rechute',
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "1000"
                ],
                'required' => false
            ])


            ->add('num_acp',TextType::class, [
                'label' => 'N°ACP ',
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "100"
                ],
                'required' => false
            ])

            //->add('deces')
            ->add('cause_deces',TextareaType::class, [
                'label' => 'Cause du décès ',
                'attr' => [
                    'autocomplete' => 'off',
                    'data-length' => "1000"
                ],
                'required' => false
            ])
/*
            ->add('file_anapath_post_op',FileType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'btn',
                ],
                'required' => false
            ])

*/
          /*  ->add('file_chirurgie',FileType::class, [
                'label' => 'Cause du décès ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'materialize-textarea',
                    'data-length' => "1000"
                ],
                'required' => false
            ])*/

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class
        ]);
    }
}
