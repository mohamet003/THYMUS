<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\This;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="float")
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
     * @ORM\Column(type="string", length=255)
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

    public function setDdn(\DateTimeInterface $ddn): self
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

    public function setTnmM(string $tnm_m): self
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
        if ($this->ddn){
            $annee = new \DateTime();
            $annee = $annee->format('Y');
            $anneeNais = $this->ddn->format('Y');
            $this->age = (int)$annee - (int)$anneeNais;
        }

        return $this->age;
    }

    public function getImc(): ?int
    {
        if ($this->taille)
            $this->imc = $this->poids / (($this->taille/100) * ($this->taille/100));
        return $this->imc;
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

}
