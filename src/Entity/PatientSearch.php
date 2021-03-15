<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="thymus_form_patient")
 * @UniqueEntity(fields={"ipp","chir_date_ope"})
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class PatientSearch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;


    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $ageMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $ageMax;

    /**
     * @var string
     */
    private $imc;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ddn;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sexe;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    private $poids;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chirurgien_referent;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $ps;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mode_de_decouverte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mode_obt_his_pre_ope;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $histo_pre_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indication;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cons_neu_dep_mg_pre_op;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score_myast_pre_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $irm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tdm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $petscan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chimio_pre_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reponse_chimio_pre_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $x_tnm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tnm_t;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tnm_n;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $tnm_m;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tnm_stade_ctnm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stade_masaoka_pre_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maladi_auto_imm_assoc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $syndrome_paraneo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $epp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anticorps_anti_rach;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rcp_rythmique;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $chir_date_ope;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $chir_date_ope_min;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $chir_date_ope_max;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chir_abord;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chir_thoracos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chir_robo_assist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chir_geste;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $insufflation_co2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $conversion;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $chir_duree;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $chir_sang;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mortalite_par_ope;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $complication_pre_ope;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $chir_drainage;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $chir_interv_interac;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qualite_resection;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anapath_post_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pre_op_x_tnm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post_tnm_t;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post_tnm_n;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post_tnm_m;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post_tnm_stade_ctnm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rea_usc_post_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $post_op_suites;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $post_op_duree_drainage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pre_op_duree_rea;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $post_op_date_sortie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chimio_post_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $radiotherapie_post_op;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_der_nouvelles;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $suivi_myasthenie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score_mya_post_op;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $recidive;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_recidive;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $localisation_recidive;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $traitement_rechute_recidive;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $num_acp;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $deces;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cause_deces;

    /**
     * @ORM\OneToMany(targetEntity=CaseCocheeMultiple::class, mappedBy="patient")
     */
    private $cases_cochee_multi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $elios;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_diag_acp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $id_acp;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $tissu_congele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $score_charlson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_histo_pre_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_mode_obt_his_pre_ope;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_cons_neu_dep_mg_pre_op;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $trai_fond_myasthenie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_trai_fond_myasthenie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_irm;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $autre_tdm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_petscan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_tnm_t;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_tnm_n;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_tnm_m;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_stade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_chir_geste;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_anapath_post_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_post_tnm_t;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_post_tnm_n;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_post_tnm_m;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_post_tnm_stade_ctnm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_rea_usc_post_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $duree_rean;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_post_op_suites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autre_chirurgien_referent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file_anapath_post_op;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file_chirurgie;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_create;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_update;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_create;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_update;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reste_riques;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chir_txt_libre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vcs;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hta;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tvi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $od;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $og;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aorte;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pericard;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $phreniqued;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $phreniqueg;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $wedge;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lobectomie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pneug;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pneud;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $avc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ap;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $obesite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dyslipide;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $diabete;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $insRenChr;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $maladieThroVein;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cancer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cardiopathie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tabagisme;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $kystique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nonKystique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $solide;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mixte;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nonrealise;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $donneeinconnue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $decesChe;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pousse;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $paralysie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $paralysieCur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pneumopatie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bullage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $decollement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $saignement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $infection;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $lobectomie_txt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $wedge_txt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cancer_txt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cardiopathie_txt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tabagisme_txt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tissulaire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $homogene;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $regulier;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $limiter;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $diag_ACP_thymone;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $masaoka_post_op;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $masaoko_koga;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $ttt_pre_op;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $autre_preop;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $complication_post_op;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ttt_post_op;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $co_chirurgie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $co_diabete;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $co_chirurgie_txt;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $co_diabete_txt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $co_respiratoire;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $co_respiratoire_txt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $epp_autre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $anticr_autre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tdm_autre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $petscan_autre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ipp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire_last;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $rcp_rythmique_date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isValide_ipp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serviceAdresseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maladie_auto_immune_liste;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serviceAdresseur_autre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInConflict;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $autre_chir_abord;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dossier_pre_preop;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $interv_convfor_rcp;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dossier_pre_post;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $decision_con_rcp;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $patient_in_protocole;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comm_inter_conf_rcp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comm_deci_con_rcp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comm_pat_in_protocole;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $immuno_preop;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $decomp_post;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comm_decom_post;

    public function __construct()
    {
        $this->cases_cochee_multi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDdn(): ?\DateTimeInterface
    {
        return $this->ddn;
    }

    public function setDdn(?\DateTimeInterface $ddn): self
    {
        $this->ddn = $ddn;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getChirurgienReferent(): ?string
    {
        return $this->chirurgien_referent;
    }

    public function setChirurgienReferent(string $chirurgien_referent): self
    {
        $this->chirurgien_referent = $chirurgien_referent;

        return $this;
    }

    public function getPs(): ?string
    {
        return $this->ps;
    }

    public function setPs(?string $ps): self
    {
        $this->ps = $ps;

        return $this;
    }

    public function getModeDeDecouverte(): ?string
    {
        return $this->mode_de_decouverte;
    }

    public function setModeDeDecouverte(?string $mode_de_decouverte): self
    {
        $this->mode_de_decouverte = $mode_de_decouverte;

        return $this;
    }

    public function getModeObtHisPreOpe(): ?string
    {
        return $this->mode_obt_his_pre_ope;
    }

    public function setModeObtHisPreOpe(?string $mode_obt_his_pre_ope): self
    {
        $this->mode_obt_his_pre_ope = $mode_obt_his_pre_ope;

        return $this;
    }

    public function getHistoPreOp(): ?string
    {
        return $this->histo_pre_op;
    }

    public function setHistoPreOp(?string $histo_pre_op): self
    {
        $this->histo_pre_op = $histo_pre_op;

        return $this;
    }

    public function getIndication(): ?string
    {
        return $this->indication;
    }

    public function setIndication(?string $indication): self
    {
        $this->indication = $indication;

        return $this;
    }

    public function getConsNeuDepMgPreOp(): ?string
    {
        return $this->cons_neu_dep_mg_pre_op;
    }

    public function setConsNeuDepMgPreOp(?string $cons_neu_dep_mg_pre_op): self
    {
        $this->cons_neu_dep_mg_pre_op = $cons_neu_dep_mg_pre_op;

        return $this;
    }

    public function getScoreMyastPreOp(): ?int
    {
        return $this->score_myast_pre_op;
    }

    public function setScoreMyastPreOp(?int $score_myast_pre_op): self
    {
        $this->score_myast_pre_op = $score_myast_pre_op;

        return $this;
    }

    public function getIrm(): ?string
    {
        return $this->irm;
    }

    public function setIrm(?string $irm): self
    {
        $this->irm = $irm;

        return $this;
    }

    public function getTdm(): ?string
    {
        return $this->tdm;
    }

    public function setTdm(?string $tdm): self
    {
        $this->tdm = $tdm;

        return $this;
    }

    public function getPetscan(): ?string
    {
        return $this->petscan;
    }

    public function setPetscan(?string $petscan): self
    {
        $this->petscan = $petscan;

        return $this;
    }

    public function getChimioPreOp(): ?string
    {
        return $this->chimio_pre_op;
    }

    public function setChimioPreOp(?string $chimio_pre_op): self
    {
        $this->chimio_pre_op = $chimio_pre_op;

        return $this;
    }

    public function getReponseChimioPreOp(): ?string
    {
        return $this->reponse_chimio_pre_op;
    }

    public function setReponseChimioPreOp(?string $reponse_chimio_pre_op): self
    {
        $this->reponse_chimio_pre_op = $reponse_chimio_pre_op;

        return $this;
    }

    public function getXTnm(): ?string
    {
        return $this->x_tnm;
    }

    public function setXTnm(?string $x_tnm): self
    {
        $this->x_tnm = $x_tnm;

        return $this;
    }

    public function getTnmT(): ?string
    {
        return $this->tnm_t;
    }

    public function setTnmT(?string $tnm_t): self
    {
        $this->tnm_t = $tnm_t;

        return $this;
    }

    public function getTnmN(): ?string
    {
        return $this->tnm_n;
    }

    public function setTnmN(?string $tnm_n): self
    {
        $this->tnm_n = $tnm_n;

        return $this;
    }

    public function getTnmM(): ?string
    {
        return $this->tnm_m;
    }

    public function setTnmM(?string $tnm_m): self
    {
        $this->tnm_m = $tnm_m;

        return $this;
    }

    public function getTnmStadeCtnm(): ?string
    {
        return $this->tnm_stade_ctnm;
    }

    public function setTnmStadeCtnm(?string $tnm_stade_ctnm): self
    {
        $this->tnm_stade_ctnm = $tnm_stade_ctnm;

        return $this;
    }

    public function getStadeMasaokaPreOp(): ?string
    {
        return $this->stade_masaoka_pre_op;
    }

    public function setStadeMasaokaPreOp(?string $stade_masaoka_pre_op): self
    {
        $this->stade_masaoka_pre_op = $stade_masaoka_pre_op;

        return $this;
    }

    public function getMaladiAutoImmAssoc(): ?string
    {
        return $this->maladi_auto_imm_assoc;
    }

    public function setMaladiAutoImmAssoc(?string $maladi_auto_imm_assoc): self
    {
        $this->maladi_auto_imm_assoc = $maladi_auto_imm_assoc;

        return $this;
    }

    public function getSyndromeParaneo(): ?string
    {
        return $this->syndrome_paraneo;
    }

    public function setSyndromeParaneo(?string $syndrome_paraneo): self
    {
        $this->syndrome_paraneo = $syndrome_paraneo;

        return $this;
    }

    public function getEpp(): ?string
    {
        return $this->epp;
    }

    public function setEpp(?string $epp): self
    {
        $this->epp = $epp;

        return $this;
    }

    public function getAnticorpsAntiRach(): ?string
    {
        return $this->anticorps_anti_rach;
    }

    public function setAnticorpsAntiRach(?string $anticorps_anti_rach): self
    {
        $this->anticorps_anti_rach = $anticorps_anti_rach;

        return $this;
    }

    public function getRcpRythmique(): ?string
    {
        return $this->rcp_rythmique;
    }

    public function setRcpRythmique(?string $rcp_rythmique): self
    {
        $this->rcp_rythmique = $rcp_rythmique;

        return $this;
    }

    public function getChirDateOpe(): ?\DateTimeInterface
    {
        return $this->chir_date_ope;
    }

    public function setChirDateOpe(?\DateTimeInterface $chir_date_ope): self
    {
        $this->chir_date_ope = $chir_date_ope;

        return $this;
    }

    public function getChirAbord(): ?string
    {
        return $this->chir_abord;
    }

    public function setChirAbord(?string $chir_abord): self
    {
        $this->chir_abord = $chir_abord;

        return $this;
    }

    public function getChirThoracos(): ?string
    {
        return $this->chir_thoracos;
    }

    public function setChirThoracos(?string $chir_thoracos): self
    {
        $this->chir_thoracos = $chir_thoracos;

        return $this;
    }

    public function getChirRoboAssist(): ?string
    {
        return $this->chir_robo_assist;
    }

    public function setChirRoboAssist(?string $chir_robo_assist): self
    {
        $this->chir_robo_assist = $chir_robo_assist;

        return $this;
    }

    public function getChirGeste(): ?string
    {
        return $this->chir_geste;
    }

    public function setChirGeste(?string $chir_geste): self
    {
        $this->chir_geste = $chir_geste;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getInsufflationCo2(): ?string
    {
        return $this->insufflation_co2;
    }

    public function setInsufflationCo2(?string $insufflation_co2): self
    {
        $this->insufflation_co2 = $insufflation_co2;

        return $this;
    }

    public function getConversion(): ?string
    {
        return $this->conversion;
    }

    public function setConversion(?string $conversion): self
    {
        $this->conversion = $conversion;

        return $this;
    }

    public function getChirDuree(): ?string
    {
        return $this->chir_duree;
    }

    public function setChirDuree(?string $chir_duree): self
    {
        $this->chir_duree = $chir_duree;

        return $this;
    }

    public function getChirSang(): ?string
    {
        return $this->chir_sang;
    }

    public function setChirSang(?string $chir_sang): self
    {
        $this->chir_sang = $chir_sang;

        return $this;
    }

    public function getMortaliteParOpe(): ?string
    {
        return $this->mortalite_par_ope;
    }

    public function setMortaliteParOpe(?string $mortalite_par_ope): self
    {
        $this->mortalite_par_ope = $mortalite_par_ope;

        return $this;
    }

    public function getComplicationPreOpe(): ?string
    {
        return $this->complication_pre_ope;
    }

    public function setComplicationPreOpe(?string $complication_pre_ope): self
    {
        $this->complication_pre_ope = $complication_pre_ope;

        return $this;
    }

    public function getChirDrainage(): ?string
    {
        return $this->chir_drainage;
    }

    public function setChirDrainage(?string $chir_drainage): self
    {
        $this->chir_drainage = $chir_drainage;

        return $this;
    }

    public function getChirIntervInterac(): ?string
    {
        return $this->chir_interv_interac;
    }

    public function setChirIntervInterac(?string $chir_interv_interac): self
    {
        $this->chir_interv_interac = $chir_interv_interac;

        return $this;
    }

    public function getQualiteResection(): ?string
    {
        return $this->qualite_resection;
    }

    public function setQualiteResection(?string $qualite_resection): self
    {
        $this->qualite_resection = $qualite_resection;

        return $this;
    }

    public function getAnapathPostOp(): ?string
    {
        return $this->anapath_post_op;
    }

    public function setAnapathPostOp(?string $anapath_post_op): self
    {
        $this->anapath_post_op = $anapath_post_op;

        return $this;
    }

    public function getPreOpXTnm(): ?string
    {
        return $this->pre_op_x_tnm;
    }

    public function setPreOpXTnm(?string $pre_op_x_tnm): self
    {
        $this->pre_op_x_tnm = $pre_op_x_tnm;

        return $this;
    }

    public function getPostTnmT(): ?string
    {
        return $this->post_tnm_t;
    }

    public function setPostTnmT(?string $post_tnm_t): self
    {
        $this->post_tnm_t = $post_tnm_t;

        return $this;
    }

    public function getPostTnmN(): ?string
    {
        return $this->post_tnm_n;
    }

    public function setPostTnmN(?string $post_tnm_n): self
    {
        $this->post_tnm_n = $post_tnm_n;

        return $this;
    }

    public function getPostTnmM(): ?string
    {
        return $this->post_tnm_m;
    }

    public function setPostTnmM(?string $post_tnm_m): self
    {
        $this->post_tnm_m = $post_tnm_m;

        return $this;
    }

    public function getPostTnmStadeCtnm(): ?string
    {
        return $this->post_tnm_stade_ctnm;
    }

    public function setPostTnmStadeCtnm(?string $post_tnm_stade_ctnm): self
    {
        $this->post_tnm_stade_ctnm = $post_tnm_stade_ctnm;

        return $this;
    }

    public function getReaUscPostOp(): ?string
    {
        return $this->rea_usc_post_op;
    }

    public function setReaUscPostOp(?string $rea_usc_post_op): self
    {
        $this->rea_usc_post_op = $rea_usc_post_op;

        return $this;
    }

    public function getPostOpSuites(): ?string
    {
        return $this->post_op_suites;
    }

    public function setPostOpSuites(?string $post_op_suites): self
    {
        $this->post_op_suites = $post_op_suites;

        return $this;
    }

    public function getPostOpDureeDrainage(): ?int
    {
        return $this->post_op_duree_drainage;
    }

    public function setPostOpDureeDrainage(?int $post_op_duree_drainage): self
    {
        $this->post_op_duree_drainage = $post_op_duree_drainage;

        return $this;
    }

    public function getPreOpDureeRea(): ?int
    {
        return $this->pre_op_duree_rea;
    }

    public function setPreOpDureeRea(?int $pre_op_duree_rea): self
    {
        $this->pre_op_duree_rea = $pre_op_duree_rea;

        return $this;
    }

    public function getPostOpDateSortie(): ?\DateTimeInterface
    {
        return $this->post_op_date_sortie;
    }

    public function setPostOpDateSortie(?\DateTimeInterface $post_op_date_sortie): self
    {
        $this->post_op_date_sortie = $post_op_date_sortie;

        return $this;
    }

    public function getChimioPostOp(): ?string
    {
        return $this->chimio_post_op;
    }

    public function setChimioPostOp(?string $chimio_post_op): self
    {
        $this->chimio_post_op = $chimio_post_op;

        return $this;
    }

    public function getRadiotherapiePostOp(): ?string
    {
        return $this->radiotherapie_post_op;
    }

    public function setRadiotherapiePostOp(?string $radiotherapie_post_op): self
    {
        $this->radiotherapie_post_op = $radiotherapie_post_op;

        return $this;
    }

    public function getDateDerNouvelles(): ?\DateTimeInterface
    {
        return $this->date_der_nouvelles;
    }

    public function setDateDerNouvelles(?\DateTimeInterface $date_der_nouvelles): self
    {
        $this->date_der_nouvelles = $date_der_nouvelles;

        return $this;
    }

    public function getSuiviMyasthenie(): ?string
    {
        return $this->suivi_myasthenie;
    }

    public function setSuiviMyasthenie(?string $suivi_myasthenie): self
    {
        $this->suivi_myasthenie = $suivi_myasthenie;

        return $this;
    }

    public function getScoreMyaPostOp(): ?int
    {
        return $this->score_mya_post_op;
    }

    public function setScoreMyaPostOp(?int $score_mya_post_op): self
    {
        $this->score_mya_post_op = $score_mya_post_op;

        return $this;
    }

    public function getRecidive(): ?string
    {
        return $this->recidive;
    }

    public function setRecidive(?string $recidive): self
    {
        $this->recidive = $recidive;

        return $this;
    }

    public function getDateRecidive(): ?\DateTimeInterface
    {
        return $this->date_recidive;
    }

    public function setDateRecidive(?\DateTimeInterface $date_recidive): self
    {
        $this->date_recidive = $date_recidive;

        return $this;
    }

    public function getLocalisationRecidive(): ?string
    {
        return $this->localisation_recidive;
    }

    public function setLocalisationRecidive(?string $localisation_recidive): self
    {
        $this->localisation_recidive = $localisation_recidive;

        return $this;
    }

    public function getTraitementRechuteRecidive(): ?string
    {
        return $this->traitement_rechute_recidive;
    }

    public function setTraitementRechuteRecidive(?string $traitement_rechute_recidive): self
    {
        $this->traitement_rechute_recidive = $traitement_rechute_recidive;

        return $this;
    }

    public function getNumAcp(): ?string
    {
        return $this->num_acp;
    }

    public function setNumAcp(?string $num_acp): self
    {
        $this->num_acp = $num_acp;

        return $this;
    }

    public function getDeces(): ?string
    {
        return $this->deces;
    }

    public function setDeces(?string $deces): self
    {
        $this->deces = $deces;

        return $this;
    }

    public function getCauseDeces(): ?string
    {
        return $this->cause_deces;
    }

    public function setCauseDeces(?string $cause_deces): self
    {
        $this->cause_deces = $cause_deces;

        return $this;
    }

    /**
     * @return Collection|CaseCocheeMultiple[]
     */
    public function getCasesCocheeMulti(): Collection
    {
        return $this->cases_cochee_multi;
    }

    public function addCasesCocheeMulti(CaseCocheeMultiple $casesCocheeMulti): self
    {
        if (!$this->cases_cochee_multi->contains($casesCocheeMulti)) {
            $this->cases_cochee_multi[] = $casesCocheeMulti;
            $casesCocheeMulti->setPatient($this);
        }

        return $this;
    }

    public function removeCasesCocheeMulti(CaseCocheeMultiple $casesCocheeMulti): self
    {
        if ($this->cases_cochee_multi->contains($casesCocheeMulti)) {
            $this->cases_cochee_multi->removeElement($casesCocheeMulti);
            // set the owning side to null (unless already changed)
            if ($casesCocheeMulti->getPatient() === $this) {
                $casesCocheeMulti->setPatient(null);
            }
        }

        return $this;
    }

    public function getElios(): ?int
    {
        return $this->elios;
    }

    public function setElios(?int $elios): self
    {
        $this->elios = $elios;

        return $this;
    }

    public function getDateDiagAcp(): ?\DateTimeInterface
    {
        return $this->date_diag_acp;
    }

    public function setDateDiagAcp(?\DateTimeInterface $date_diag_acp): self
    {
        $this->date_diag_acp = $date_diag_acp;

        return $this;
    }

    public function getIdAcp(): ?string
    {
        return $this->id_acp;
    }

    public function setIdAcp(?string $id_acp): self
    {
        $this->id_acp = $id_acp;

        return $this;
    }

    public function getTissuCongele(): ?string
    {
        return $this->tissu_congele;
    }

    public function setTissuCongele(?string $tissu_congele): self
    {
        $this->tissu_congele = $tissu_congele;

        return $this;
    }

    public function getAge(): ?int
    {
        $date = new \DateTime();
        if ($this->ddn){
            $this->age = $date->diff($this->ddn);
        }else{
            return 0;
        }

        return $this->age->y;
    }

    function ageN($date) {
        $age = date('Y') - $date;
        if (date('md') < date('md', strtotime($date))) {
            return $age - 1;
        }
        return $age;
    }

    public function getDureeHosp(): ?string
    {
        $duree = 0;
        if ($this->chir_date_ope and $this->post_op_date_sortie){
            //$duree = $this->post_op_date_sortie - $this->chir_date_ope ;
            $duree = date_diff($this->chir_date_ope,$this->post_op_date_sortie);
            return $duree->format("%R%a jours");
        }
        return "0";
        //return round($duree / (60 * 60 * 24));
    }

    public function getDureeSuivi(): ?string
    {

        $duree = 0;
        if ($this->chir_date_ope and $this->date_der_nouvelles){
            //$duree = $this->post_op_date_sortie - $this->chir_date_ope ;
            $duree = date_diff($this->chir_date_ope,$this->date_der_nouvelles);
            return $duree->format("%R%a jours");
        }
     return "0";
        //return round($duree / (60 * 60 * 24));
    }

    public function getImc(): ?string
    {
        if ($this->taille)
            $this->imc = round($this->poids / (($this->taille/100) * ($this->taille/100)), 1);
        return (string)$this->imc;
    }

    public function setImc(?string $val): self
    {
        $this->imc = $val;
        return $this;
    }


    public function getScoreCharlson(): ?string
    {
        return $this->score_charlson;
    }

    public function setScoreCharlson(?string $score_charlson): self
    {
        $this->score_charlson = $score_charlson;

        return $this;
    }

    public function getAutreHistoPreOp(): ?string
    {
        return $this->autre_histo_pre_op;
    }

    public function setAutreHistoPreOp(?string $autre_histo_pre_op): self
    {
        $this->autre_histo_pre_op = $autre_histo_pre_op;

        return $this;
    }

    public function getAutreModeObtHisPreOpe(): ?string
    {
        return $this->autre_mode_obt_his_pre_ope;
    }

    public function setAutreModeObtHisPreOpe(?string $autre_mode_obt_his_pre_ope): self
    {
        $this->autre_mode_obt_his_pre_ope = $autre_mode_obt_his_pre_ope;

        return $this;
    }

    public function getAutreConsNeuDepMgPreOp(): ?string
    {
        return $this->autre_cons_neu_dep_mg_pre_op;
    }

    public function setAutreConsNeuDepMgPreOp(?string $autre_cons_neu_dep_mg_pre_op): self
    {
        $this->autre_cons_neu_dep_mg_pre_op = $autre_cons_neu_dep_mg_pre_op;

        return $this;
    }

    public function getTraiFondMyasthenie(): ?string
    {
        return $this->trai_fond_myasthenie;
    }

    public function setTraiFondMyasthenie(?string $trai_fond_myasthenie): self
    {
        $this->trai_fond_myasthenie = $trai_fond_myasthenie;

        return $this;
    }

    public function getAutreTraiFondMyasthenie(): ?string
    {
        return $this->autre_trai_fond_myasthenie;
    }

    public function setAutreTraiFondMyasthenie(?string $autre_trai_fond_myasthenie): self
    {
        $this->autre_trai_fond_myasthenie = $autre_trai_fond_myasthenie;

        return $this;
    }

    public function getAutreIrm(): ?string
    {
        return $this->autre_irm;
    }

    public function setAutreIrm(?string $autre_irm): self
    {
        $this->autre_irm = $autre_irm;

        return $this;
    }

    public function getAutreTdm(): ?string
    {
        return $this->autre_tdm;
    }

    public function setAutreTdm(?string $autre_tdm): self
    {
        $this->autre_tdm = $autre_tdm;

        return $this;
    }

    public function getAutrePetscan(): ?string
    {
        return $this->autre_petscan;
    }

    public function setAutrePetscan(?string $autre_petscan): self
    {
        $this->autre_petscan = $autre_petscan;

        return $this;
    }

    public function getAutreTnmT(): ?string
    {
        return $this->autre_tnm_t;
    }

    public function setAutreTnmT(?string $autre_tnm_t): self
    {
        $this->autre_tnm_t = $autre_tnm_t;

        return $this;
    }

    public function getAutreTnmN(): ?string
    {
        return $this->autre_tnm_n;
    }

    public function setAutreTnmN(?string $autre_tnm_n): self
    {
        $this->autre_tnm_n = $autre_tnm_n;

        return $this;
    }

    public function getAutreTnmM(): ?string
    {
        return $this->autre_tnm_m;
    }

    public function setAutreTnmM(?string $autre_tnm_m): self
    {
        $this->autre_tnm_m = $autre_tnm_m;

        return $this;
    }

    public function getAutreStade(): ?string
    {
        return $this->autre_stade;
    }

    public function setAutreStade(?string $autre_stade): self
    {
        $this->autre_stade = $autre_stade;

        return $this;
    }

    public function getAutreChirGeste(): ?string
    {
        return $this->autre_chir_geste;
    }

    public function setAutreChirGeste(?string $autre_chir_geste): self
    {
        $this->autre_chir_geste = $autre_chir_geste;

        return $this;
    }

    public function getAutreAnapathPostOp(): ?string
    {
        return $this->autre_anapath_post_op;
    }

    public function setAutreAnapathPostOp(?string $autre_anapath_post_op): self
    {
        $this->autre_anapath_post_op = $autre_anapath_post_op;

        return $this;
    }

    public function getAutrePostTnmT(): ?string
    {
        return $this->autre_post_tnm_t;
    }

    public function setAutrePostTnmT(?string $autre_post_tnm_t): self
    {
        $this->autre_post_tnm_t = $autre_post_tnm_t;

        return $this;
    }

    public function getAutrePostTnmN(): ?string
    {
        return $this->autre_post_tnm_n;
    }

    public function setAutrePostTnmN(?string $autre_post_tnm_n): self
    {
        $this->autre_post_tnm_n = $autre_post_tnm_n;

        return $this;
    }

    public function getAutrePostTnmM(): ?string
    {
        return $this->autre_post_tnm_m;
    }

    public function setAutrePostTnmM(?string $autre_post_tnm_m): self
    {
        $this->autre_post_tnm_m = $autre_post_tnm_m;

        return $this;
    }

    public function getAutrePostTnmStadeCtnm(): ?string
    {
        return $this->autre_post_tnm_stade_ctnm;
    }

    public function setAutrePostTnmStadeCtnm(?string $autre_post_tnm_stade_ctnm): self
    {
        $this->autre_post_tnm_stade_ctnm = $autre_post_tnm_stade_ctnm;

        return $this;
    }

    public function getAutreReaUscPostOp(): ?string
    {
        return $this->autre_rea_usc_post_op;
    }

    public function setAutreReaUscPostOp(?string $autre_rea_usc_post_op): self
    {
        $this->autre_rea_usc_post_op = $autre_rea_usc_post_op;

        return $this;
    }

    public function getDureeRean(): ?string
    {
        return $this->duree_rean;
    }

    public function setDureeRean(?string $duree_rean): self
    {
        $this->duree_rean = $duree_rean;

        return $this;
    }

    public function getAutrePostOpSuites(): ?string
    {
        return $this->autre_post_op_suites;
    }

    public function setAutrePostOpSuites(?string $autre_post_op_suites): self
    {
        $this->autre_post_op_suites = $autre_post_op_suites;

        return $this;
    }

    public function getAutreChirurgienReferent(): ?string
    {
        return $this->autre_chirurgien_referent;
    }

    public function setAutreChirurgienReferent(?string $autre_chirurgien_referent): self
    {
        $this->autre_chirurgien_referent = $autre_chirurgien_referent;

        return $this;
    }

    public function getFileAnapathPostOp(): ?string
    {
        return $this->file_anapath_post_op;
    }

    public function setFileAnapathPostOp(?string $file_anapath_post_op): self
    {
        $this->file_anapath_post_op = $file_anapath_post_op;

        return $this;
    }

    public function getFileChirurgie(): ?string
    {
        return $this->file_chirurgie;
    }

    public function setFileChirurgie(?string $file_chirurgie): self
    {
        $this->file_chirurgie = $file_chirurgie;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(?\DateTimeInterface $date_update): self
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getUserCreate(): ?string
    {
        return $this->user_create;
    }

    public function setUserCreate(?string $user_create): self
    {
        $this->user_create = $user_create;

        return $this;
    }

    public function getUserUpdate(): ?string
    {
        return $this->user_update;
    }

    public function setUserUpdate(?string $user_update): self
    {
        $this->user_update = $user_update;

        return $this;
    }

    public function getResteRiques(): ?string
    {
        return $this->reste_riques;
    }

    public function setResteRiques(?string $reste_riques): self
    {
        $this->reste_riques = $reste_riques;

        return $this;
    }

    public function getChirTxtLibre(): ?string
    {
        return $this->chir_txt_libre;
    }

    public function setChirTxtLibre(?string $chir_txt_libre): self
    {
        $this->chir_txt_libre = $chir_txt_libre;

        return $this;
    }

    public function getVcs(): ?bool
    {
        return $this->vcs;
    }

    public function setVcs(?bool $vcs): self
    {
        $this->vcs = $vcs;

        return $this;
    }

    public function getHta(): ?bool
    {
        return $this->hta;
    }

    public function setHta(?bool $hta): self
    {
        $this->hta = $hta;

        return $this;
    }

    public function getTvi(): ?bool
    {
        return $this->tvi;
    }

    public function setTvi(?bool $tvi): self
    {
        $this->tvi = $tvi;

        return $this;
    }

    public function getOd(): ?bool
    {
        return $this->od;
    }

    public function setOd(?bool $od): self
    {
        $this->od = $od;

        return $this;
    }

    public function getOg(): ?bool
    {
        return $this->og;
    }

    public function setOg(?bool $og): self
    {
        $this->og = $og;

        return $this;
    }

    public function getAorte(): ?bool
    {
        return $this->aorte;
    }

    public function setAorte(?bool $aorte): self
    {
        $this->aorte = $aorte;

        return $this;
    }

    public function getPericard(): ?bool
    {
        return $this->pericard;
    }

    public function setPericard(?bool $pericard): self
    {
        $this->pericard = $pericard;

        return $this;
    }

    public function getPhreniqued(): ?bool
    {
        return $this->phreniqued;
    }

    public function setPhreniqued(?bool $phreniqued): self
    {
        $this->phreniqued = $phreniqued;

        return $this;
    }

    public function getPhreniqueg(): ?bool
    {
        return $this->phreniqueg;
    }

    public function setPhreniqueg(?bool $phreniqueg): self
    {
        $this->phreniqueg = $phreniqueg;

        return $this;
    }

    public function getWedge(): ?bool
    {
        return $this->wedge;
    }

    public function setWedge(?bool $wedge): self
    {
        $this->wedge = $wedge;

        return $this;
    }

    public function getLobectomie(): ?bool
    {
        return $this->lobectomie;
    }

    public function setLobectomie(?bool $lobectomie): self
    {
        $this->lobectomie = $lobectomie;

        return $this;
    }

    public function getPneug(): ?bool
    {
        return $this->pneug;
    }

    public function setPneug(?bool $pneug): self
    {
        $this->pneug = $pneug;

        return $this;
    }

    public function getPneud(): ?bool
    {
        return $this->pneud;
    }

    public function setPneud(?bool $pneud): self
    {
        $this->pneud = $pneud;

        return $this;
    }

    public function getAvc(): ?bool
    {
        return $this->avc;
    }

    public function setAvc(bool $avc): self
    {
        $this->avc = $avc;

        return $this;
    }

    public function getAp(): ?bool
    {
        return $this->ap;
    }

    public function setAp(?bool $ap): self
    {
        $this->ap = $ap;

        return $this;
    }

    public function getObesite(): ?bool
    {
        return $this->obesite;
    }

    public function setObesite(?bool $obesite): self
    {
        $this->obesite = $obesite;

        return $this;
    }

    public function getDyslipide(): ?bool
    {
        return $this->dyslipide;
    }

    public function setDyslipide(?bool $dyslipide): self
    {
        $this->dyslipide = $dyslipide;

        return $this;
    }

    public function getDiabete(): ?bool
    {
        return $this->diabete;
    }

    public function setDiabete(?bool $diabete): self
    {
        $this->diabete = $diabete;

        return $this;
    }

    public function getInsRenChr(): ?bool
    {
        return $this->insRenChr;
    }

    public function setInsRenChr(?bool $insRenChr): self
    {
        $this->insRenChr = $insRenChr;

        return $this;
    }

    public function getMaladieThroVein(): ?bool
    {
        return $this->maladieThroVein;
    }

    public function setMaladieThroVein(?bool $maladieThroVein): self
    {
        $this->maladieThroVein = $maladieThroVein;

        return $this;
    }

    public function getCancer(): ?bool
    {
        return $this->cancer;
    }

    public function setCancer(?bool $cancer): self
    {
        $this->cancer = $cancer;

        return $this;
    }

    public function getCardiopathie(): ?bool
    {
        return $this->cardiopathie;
    }

    public function setCardiopathie(?bool $cardiopathie): self
    {
        $this->cardiopathie = $cardiopathie;

        return $this;
    }

    public function getTabagisme(): ?bool
    {
        return $this->tabagisme;
    }

    public function setTabagisme(?bool $tabagisme): self
    {
        $this->tabagisme = $tabagisme;

        return $this;
    }

    public function getKystique(): ?bool
    {
        return $this->kystique;
    }

    public function setKystique(?bool $kystique): self
    {
        $this->kystique = $kystique;

        return $this;
    }

    public function getNonKystique(): ?bool
    {
        return $this->nonKystique;
    }

    public function setNonKystique(?bool $nonKystique): self
    {
        $this->nonKystique = $nonKystique;

        return $this;
    }

    public function getSolide(): ?bool
    {
        return $this->solide;
    }

    public function setSolide(?bool $solide): self
    {
        $this->solide = $solide;

        return $this;
    }

    public function getMixte(): ?bool
    {
        return $this->mixte;
    }

    public function setMixte(?bool $mixte): self
    {
        $this->mixte = $mixte;

        return $this;
    }

    public function getNonrealise(): ?bool
    {
        return $this->nonrealise;
    }

    public function setNonrealise(?bool $nonrealise): self
    {
        $this->nonrealise = $nonrealise;

        return $this;
    }

    public function getDonneeinconnue(): ?bool
    {
        return $this->donneeinconnue;
    }

    public function setDonneeinconnue(?bool $donneeinconnue): self
    {
        $this->donneeinconnue = $donneeinconnue;

        return $this;
    }

    public function getDecesChe(): ?bool
    {
        return $this->decesChe;
    }

    public function setDecesChe(?bool $decesChe): self
    {
        $this->decesChe = $decesChe;

        return $this;
    }

    public function getPousse(): ?bool
    {
        return $this->pousse;
    }

    public function setPousse(?bool $pousse): self
    {
        $this->pousse = $pousse;

        return $this;
    }

    public function getParalysie(): ?bool
    {
        return $this->paralysie;
    }

    public function setParalysie(?bool $paralysie): self
    {
        $this->paralysie = $paralysie;

        return $this;
    }

    public function getParalysieCur(): ?bool
    {
        return $this->paralysieCur;
    }

    public function setParalysieCur(?bool $paralysieCur): self
    {
        $this->paralysieCur = $paralysieCur;

        return $this;
    }

    public function getPneumopatie(): ?bool
    {
        return $this->pneumopatie;
    }

    public function setPneumopatie(?bool $pneumopatie): self
    {
        $this->pneumopatie = $pneumopatie;

        return $this;
    }

    public function getBullage(): ?bool
    {
        return $this->bullage;
    }

    public function setBullage(?bool $bullage): self
    {
        $this->bullage = $bullage;

        return $this;
    }

    public function getDecollement(): ?bool
    {
        return $this->decollement;
    }

    public function setDecollement(?bool $decollement): self
    {
        $this->decollement = $decollement;

        return $this;
    }

    public function getSaignement(): ?bool
    {
        return $this->saignement;
    }

    public function setSaignement(?bool $saignement): self
    {
        $this->saignement = $saignement;

        return $this;
    }

    public function getInfection(): ?bool
    {
        return $this->infection;
    }

    public function setInfection(?bool $infection): self
    {
        $this->infection = $infection;

        return $this;
    }

    public function getLobectomieTxt(): ?string
    {
        return $this->lobectomie_txt;
    }

    public function setLobectomieTxt(?string $lobectomie_txt): self
    {
        $this->lobectomie_txt = $lobectomie_txt;

        return $this;
    }

    public function getWedgeTxt(): ?string
    {
        return $this->wedge_txt;
    }

    public function setWedgeTxt(?string $wedge_txt): self
    {
        $this->wedge_txt = $wedge_txt;

        return $this;
    }

    public function getCancerTxt(): ?string
    {
        return $this->cancer_txt;
    }

    public function setCancerTxt(?string $cancer_txt): self
    {
        $this->cancer_txt = $cancer_txt;

        return $this;
    }

    public function getCardiopathieTxt(): ?string
    {
        return $this->cardiopathie_txt;
    }

    public function setCardiopathieTxt(?string $cardiopathie_txt): self
    {
        $this->cardiopathie_txt = $cardiopathie_txt;

        return $this;
    }

    public function getTabagismeTxt(): ?string
    {
        return $this->tabagisme_txt;
    }

    public function setTabagismeTxt(?string $tabagisme_txt): self
    {
        $this->tabagisme_txt = $tabagisme_txt;

        return $this;
    }

    public function getTissulaire(): ?bool
    {
        return $this->tissulaire;
    }

    public function setTissulaire(?bool $tissulaire): self
    {
        $this->tissulaire = $tissulaire;

        return $this;
    }

    public function getHomogene(): ?bool
    {
        return $this->homogene;
    }

    public function setHomogene(?bool $homogene): self
    {
        $this->homogene = $homogene;

        return $this;
    }

    public function getRegulier(): ?bool
    {
        return $this->regulier;
    }

    public function setRegulier(?bool $regulier): self
    {
        $this->regulier = $regulier;

        return $this;
    }

    public function getLimiter(): ?bool
    {
        return $this->limiter;
    }

    public function setLimiter(?bool $limiter): self
    {
        $this->limiter = $limiter;

        return $this;
    }

    public function getDiagACPThymone(): ?string
    {
        return $this->diag_ACP_thymone;
    }

    public function setDiagACPThymone(?string $diag_ACP_thymone): self
    {
        $this->diag_ACP_thymone = $diag_ACP_thymone;

        return $this;
    }

    public function getMasaokaPostOp(): ?string
    {
        return $this->masaoka_post_op;
    }

    public function setMasaokaPostOp(?string $masaoka_post_op): self
    {
        $this->masaoka_post_op = $masaoka_post_op;

        return $this;
    }

    public function getMasaokoKoga(): ?string
    {
        return $this->masaoko_koga;
    }

    public function setMasaokoKoga(?string $masaoko_koga): self
    {
        $this->masaoko_koga = $masaoko_koga;

        return $this;
    }

    public function getTttPreOp(): ?string
    {
        return $this->ttt_pre_op;
    }

    public function setTttPreOp(?string $ttt_pre_op): self
    {
        $this->ttt_pre_op = $ttt_pre_op;

        return $this;
    }

    public function getAutrePreop(): ?string
    {
        return $this->autre_preop;
    }

    public function setAutrePreop(?string $autre_preop): self
    {
        $this->autre_preop = $autre_preop;

        return $this;
    }

    public function getComplicationPostOp(): ?string
    {
        return $this->complication_post_op;
    }

    public function setComplicationPostOp(?string $complication_post_op): self
    {
        $this->complication_post_op = $complication_post_op;

        return $this;
    }

    public function getTttPostOp(): ?string
    {
        return $this->ttt_post_op;
    }

    public function setTttPostOp(?string $ttt_post_op): self
    {
        $this->ttt_post_op = $ttt_post_op;

        return $this;
    }

    public function getCoChirurgie(): ?bool
    {
        return $this->co_chirurgie;
    }

    public function setCoChirurgie(?bool $co_chirurgie): self
    {
        $this->co_chirurgie = $co_chirurgie;

        return $this;
    }

    public function getCoDiabete(): ?bool
    {
        return $this->co_diabete;
    }

    public function setCoDiabete(?bool $co_diabete): self
    {
        $this->co_diabete = $co_diabete;

        return $this;
    }

    public function getCoChirurgieTxt(): ?string
    {
        return $this->co_chirurgie_txt;
    }

    public function setCoChirurgieTxt(?string $co_chirurgie_txt): self
    {
        $this->co_chirurgie_txt = $co_chirurgie_txt;

        return $this;
    }

    public function getCoDiabeteTxt(): ?string
    {
        return $this->co_diabete_txt;
    }

    public function setCoDiabeteTxt(?string $co_diabete_txt): self
    {
        $this->co_diabete_txt = $co_diabete_txt;

        return $this;
    }

    public function getCoRespiratoire(): ?bool
    {
        return $this->co_respiratoire;
    }

    public function setCoRespiratoire(?bool $co_respiratoire): self
    {
        $this->co_respiratoire = $co_respiratoire;

        return $this;
    }

    public function getCoRespiratoireTxt(): ?string
    {
        return $this->co_respiratoire_txt;
    }

    public function setCoRespiratoireTxt(?string $co_respiratoire_txt): self
    {
        $this->co_respiratoire_txt = $co_respiratoire_txt;

        return $this;
    }

    public function getEppAutre(): ?string
    {
        return $this->epp_autre;
    }

    public function setEppAutre(?string $epp_autre): self
    {
        $this->epp_autre = $epp_autre;

        return $this;
    }

    public function getAnticrAutre(): ?string
    {
        return $this->anticr_autre;
    }

    public function setAnticrAutre(?string $anticr_autre): self
    {
        $this->anticr_autre = $anticr_autre;

        return $this;
    }

    public function getTdmAutre(): ?string
    {
        return $this->tdm_autre;
    }

    public function setTdmAutre(?string $tdm_autre): self
    {
        $this->tdm_autre = $tdm_autre;

        return $this;
    }

    public function getPetscanAutre(): ?string
    {
        return $this->petscan_autre;
    }

    public function setPetscanAutre(?string $petscan_autre): self
    {
        $this->petscan_autre = $petscan_autre;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIpp(): ?string
    {
        return $this->ipp;
    }

    public function setIpp(string $ipp): self
    {
        $this->ipp = $ipp;

        return $this;
    }

    public function getCommentaireLast(): ?string
    {
        return $this->commentaire_last;
    }

    public function setCommentaireLast(?string $commentaire_last): self
    {
        $this->commentaire_last = $commentaire_last;

        return $this;
    }

    public function getRcpRythmiqueDate(): ?\DateTimeInterface
    {
        return $this->rcp_rythmique_date;
    }

    public function setRcpRythmiqueDate(?\DateTimeInterface $rcp_rythmique_date): self
    {
        $this->rcp_rythmique_date = $rcp_rythmique_date;

        return $this;
    }

    public function getIsValideIpp(): ?bool
    {
        return $this->isValide_ipp;
    }

    public function setIsValideIpp(?bool $isValide_ipp): self
    {
        $this->isValide_ipp = $isValide_ipp;

        return $this;
    }

    public function getServiceAdresseur(): ?string
    {
        return $this->serviceAdresseur;
    }

    public function setServiceAdresseur(?string $serviceAdresseur): self
    {
        $this->serviceAdresseur = $serviceAdresseur;

        return $this;
    }

    public function getMaladieAutoImmuneListe(): ?string
    {
        return $this->maladie_auto_immune_liste;
    }

    public function setMaladieAutoImmuneListe(?string $maladie_auto_immune_liste): self
    {
        $this->maladie_auto_immune_liste = $maladie_auto_immune_liste;

        return $this;
    }

    public function getServiceAdresseurAutre(): ?string
    {
        return $this->serviceAdresseur_autre;
    }

    public function setServiceAdresseurAutre(?string $serviceAdresseur_autre): self
    {
        $this->serviceAdresseur_autre = $serviceAdresseur_autre;

        return $this;
    }

    public function getIsInConflict(): ?bool
    {
        return $this->isInConflict;
    }

    public function setIsInConflict(?bool $isInConflict): self
    {
        $this->isInConflict = $isInConflict;

        return $this;
    }

    public function getAutreChirAbord(): ?string
    {
        return $this->autre_chir_abord;
    }

    public function setAutreChirAbord(?string $autre_chir_abord): self
    {
        $this->autre_chir_abord = $autre_chir_abord;

        return $this;
    }

    public function getDossierPrePreop(): ?string
    {
        return $this->dossier_pre_preop;
    }

    public function setDossierPrePreop(?string $dossier_pre_preop): self
    {
        $this->dossier_pre_preop = $dossier_pre_preop;

        return $this;
    }

    public function getIntervConvforRcp(): ?string
    {
        return $this->interv_convfor_rcp;
    }

    public function setIntervConvforRcp(?string $interv_convfor_rcp): self
    {
        $this->interv_convfor_rcp = $interv_convfor_rcp;

        return $this;
    }

    public function getDossierPrePost(): ?string
    {
        return $this->dossier_pre_post;
    }

    public function setDossierPrePost(?string $dossier_pre_post): self
    {
        $this->dossier_pre_post = $dossier_pre_post;

        return $this;
    }

    public function getDecisionConRcp(): ?string
    {
        return $this->decision_con_rcp;
    }

    public function setDecisionConRcp(?string $decision_con_rcp): self
    {
        $this->decision_con_rcp = $decision_con_rcp;

        return $this;
    }

    public function getPatientInProtocole(): ?string
    {
        return $this->patient_in_protocole;
    }

    public function setPatientInProtocole(?string $patient_in_protocole): self
    {
        $this->patient_in_protocole = $patient_in_protocole;

        return $this;
    }

    public function getCommInterConfRcp(): ?string
    {
        return $this->comm_inter_conf_rcp;
    }

    public function setCommInterConfRcp(?string $comm_inter_conf_rcp): self
    {
        $this->comm_inter_conf_rcp = $comm_inter_conf_rcp;

        return $this;
    }

    public function getCommDeciConRcp(): ?string
    {
        return $this->comm_deci_con_rcp;
    }

    public function setCommDeciConRcp(?string $comm_deci_con_rcp): self
    {
        $this->comm_deci_con_rcp = $comm_deci_con_rcp;

        return $this;
    }

    public function getCommPatInProtocole(): ?string
    {
        return $this->comm_pat_in_protocole;
    }

    public function setCommPatInProtocole(?string $comm_pat_in_protocole): self
    {
        $this->comm_pat_in_protocole = $comm_pat_in_protocole;

        return $this;
    }

    public function getImmunoPreop(): ?string
    {
        return $this->immuno_preop;
    }

    public function setImmunoPreop(?string $immuno_preop): self
    {
        $this->immuno_preop = $immuno_preop;

        return $this;
    }

    public function getDecompPost(): ?bool
    {
        return $this->decomp_post;
    }

    public function setDecompPost(?bool $decomp_post): self
    {
        $this->decomp_post = $decomp_post;

        return $this;
    }

    public function getCommDecomPost(): ?string
    {
        return $this->comm_decom_post;
    }

    public function setCommDecomPost(?string $comm_decom_post): self
    {
        $this->comm_decom_post = $comm_decom_post;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * @param mixed $ageMin
     */
    public function setAgeMin($ageMin): void
    {
        $this->ageMin = $ageMin;
    }

    /**
     * @return mixed
     */
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * @param mixed $ageMax
     */
    public function setAgeMax($ageMax): void
    {
        $this->ageMax = $ageMax;
    }

    /**
     * @return mixed
     */
    public function getChirDateOpeMin()
    {
        return $this->chir_date_ope_min;
    }

    /**
     * @param mixed $chir_date_ope_min
     * @return PatientSearch
     */
    public function setChirDateOpeMin(?\DateTimeInterface$chir_date_ope_min)
    {
        $this->chir_date_ope_min = $chir_date_ope_min;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChirDateOpeMax()
    {
        return $this->chir_date_ope_max;
    }

    /**
     * @param mixed $chir_date_ope_max
     * @return PatientSearch
     */
    public function setChirDateOpeMax(?\DateTimeInterface $chir_date_ope_max)
    {
        $this->chir_date_ope_max = $chir_date_ope_max;
        return $this;
    }



}
