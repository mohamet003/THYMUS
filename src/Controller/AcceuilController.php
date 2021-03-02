<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Search;
use App\Entity\User;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;


class AcceuilController extends AbstractController
{

    private $serializer;
    private $em;
    private $recherche;

    /**
     * AccueilController constructor.
     * @param EntityManagerInterface $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $encoder = new JsonEncoder();
        $dateCallback = function ($innerObject, $outerObject, string $attributeName, string $format = null, array $context = []) {
            return $innerObject instanceof \DateTime ? $innerObject->format("Y-m-d") : '';
        };

        $defaultContext = [
            AbstractNormalizer::CALLBACKS => [
                'ddn' => $dateCallback,
            ],
        ];
        $normalizer = new GetSetMethodNormalizer(null, null, null, null, null, $defaultContext);

        $this->serializer = new Serializer([$normalizer], [$encoder]);
        $this->em = $manager;
    }


    /**
     * @Route("/", name="acceuil")
     * @param Request $request
     * @param Session $session
     * @param Security $security
     * @return Response
     * @throws \Exception
     */
    public function index(Request $request, Session $session, Security $security)
    {

        $user = null;
        $us = new User();
         if ($security->getUser()){
             $user = $security->getUser()->getExtraFields();
             if ($user){
                 $us->setName($user['name'])
                     ->setMail($user['mail'])
                     ->setRoles([$user['title']])
                     ->setPassword("vide")
                     ->setDateCon(new \DateTime());
             }


             if (!$session->get('user')){

                 $this->em->persist($us);
                 $this->em->flush();
                 $session->set('user',$us->getName());
             }
         }
/*
                               $row = 1;
                               // $data = "";
                               $tab = [];

                               $tabChir = ['DG','ASG','MG','EB','GB'];
                               $tabAnticor = ['positifs','négatifs','non fait'];
                               $tabTTTFondMyas = ['mestinon','cortison','mythelase'];
                               $tabGeste = ['thymectomie radicale','thymectomie partielle','thymomectomie','biopsie'];
                               $tabmode_obt_his_pre_ope = ['ponction TDM', 'biopsie chirurgicale', 'pre op', 'piece anapath'];
                               $tabHisto = ['thymome A', 'thymome AB', 'thymome B1', 'thymome B2', 'thymome B3', 'thymome rare', 'pièce anapath', 'carcinoïde', 'carcinoide typique', 'carcinoide atypique',
                                   'carcinome épidermoïde','carcinome NE thymique avancé','carcinome thymique','cellules thymiques','contributif négatif','lymphome','lymphome B','lyphome de Hodgkin','non contributive'];

                       if (($handle = fopen("../public/bd_thymus_final.csv", "r")) !== FALSE) {
                           while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                               try {

                               $patient = new Patient();
                                $str = utf8_encode($data[2]);
                                                              $patient->setElios((int)$data[0])
                                                                  ->setNom(utf8_encode($data[1]))
                                                                  ->setPrenom($str)
                                                                  ->setSexe($data[3])
                                                                  ->setDdn(new \DateTime($data[4]));

                                                              if (in_array($data[6], $tabChir)){
                                                                  $patient->setChirurgienReferent($data[6]);
                                                              }else{
                                                                  $patient->setChirurgienReferent("Autre");
                                                                  $patient->setAutreChirurgienReferent( utf8_encode($data[6]));
                                                              }
                                                              if (!$patient->getChirurgienReferent()){
                                                                  $patient->setChirurgienReferent("Autre");
                                                                  $patient->setAutreChirurgienReferent("pas chir ref");
                                                              }
                                                              $patient
                                                                  ->setPoids((float) $data[7])
                                                                  ->setTaille((float) $data[8])
                                                                  ->setPs($data[10])
                                                                  ->setScoreCharlson($data[11]);
                                                              if (trim(utf8_encode($data[13])) == "0" or trim(utf8_encode($data[13])) == ""){
                                                                  $patient->setMaladiAutoImmAssoc(null);
                                                              }else{
                                                                  $patient->setMaladiAutoImmAssoc(trim(utf8_encode($data[13])));
                                                              }

                                                               if (trim(utf8_encode($data[14])) == "1" or trim(utf8_encode($data[14])) == 1){
                                                                   $patient->setSyndromeParaneo(trim(utf8_encode($data[14])));

                                                               }else{
                                                                   $patient->setSyndromeParaneo(null);
                                                               }

                                                               $patient->setModeDeDecouverte(trim(utf8_encode($data[15])));

                                                              $preop =  trim(utf8_encode($data[16]));
                                                              if ((int)$preop == 1 ){
                                                                  $patient->setConsNeuDepMgPreOp("Oui");
                                                              }else{
                                                                  if ((int)$preop == 0 ){
                                                                      $patient->setConsNeuDepMgPreOp("Non");
                                                                  }
                                                              }


                                                              if ((int)$data[17]){
                                                                  $patient->setScoreMyastPreOp((int)$data[17]);
                                                              }
                                                                   $tttf = trim(strtolower($data[18]));
                                                               if (in_array($tttf, $tabTTTFondMyas)){
                                                                   $patient->setTraiFondMyasthenie($tttf);
                                                               }else{
                                                                   $patient->setTraiFondMyasthenie("Autre")
                                                                       ->setAutreTraiFondMyasthenie($tttf);
                                                               }

                                                              $epp = trim(strtolower($data[19]));
                                                              $isin = false;
                                                              if (stristr($epp, "hypogamma") !== false){
                                                                  $patient->setEpp("hypogamma");
                                                                  $isin = true;
                                                              }
                                                              if (stristr($epp, "hypergamma") !== false){
                                                                  $patient->setEpp("hypergamma");
                                                                  $isin = true;
                                                              }
                                                              if (stristr($epp, "normal") !== false){
                                                                  $patient->setEpp("normal");
                                                                  $isin = true;
                                                              }

                                                              if (!$isin){
                                                                  $patient->setEpp("Autre")
                                                                      ->setEppAutre(utf8_encode($epp));
                                                              }

                                                              $anticr = trim(strtolower(utf8_encode($data[20])));
                                                              if (in_array($anticr, $tabAnticor)){
                                                                  $patient->setAnticorpsAntiRach($anticr);
                                                              }else{
                                                                  $patient->setAnticorpsAntiRach("Autre")
                                                                      ->setAnticrAutre(utf8_encode($anticr));
                                                              }

                                                              $irm = trim(strtolower($data[21]));

                                                              if ($irm != "non fait" and $irm != "" and $irm != "nc"){
                                                                  $patient->setIrm("Oui");
                                                              }else{
                                                                  $patient->setIrm("Non");
                                                              }

                                                              $tab = explode('/', $irm);
                                                              $restirm = "";

                                                              for ($i=0 ; $i < count($tab) ; $i++){
                                                                  $notin = true;
                                                                  $irm = $tab[$i];

                                                                  if (stristr($irm, "tissula") !== false){
                                                                      $patient->setTissulaire(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "homogène") !== false){
                                                                      $patient->setHomogene(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "limit") !== false){
                                                                      $patient->setLimiter(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "non kystique") !== false){
                                                                      $patient->setNonKystique(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "kystique") !== false){
                                                                      $patient->setKystique(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "solide") !== false){
                                                                      $patient->setSolide(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "mixte") !== false){
                                                                      $patient->setMixte(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($irm, "reguli") !== false){
                                                                      $patient->setRegulier(true);
                                                                      $notin = false;
                                                                  }
                                                                  if (stristr($irm, "non fait") !== false){
                                                                      $patient->setNonrealise(true);
                                                                      $notin = false;
                                                                  }


                                                                  if ($notin == true){
                                                                      $restirm = $restirm.$irm."/" ;
                                                                  }

                                                              }
                                                              if ($restirm != ""){
                                                                  $patient->setAutreIrm(trim(utf8_encode($restirm)));
                                                              }


                                                            //  $tdm = utf8_encode($data[22]);
                                                            //  if ($tdm != ""){
                                                         //         $patient->setTdm("Autre")
                                                         //             ->setTdmAutre($tdm);
                                                         //     }
//
//                                                              $petSca = utf8_encode($data[23]);
//
//                                                              if ($petSca != 0){
//                                                                  $patient->setPetscan("Autre")
//                                                                      ->setPetscanAutre($petSca);
//                                                              }


                                                              if (in_array($data[24], $tabmode_obt_his_pre_ope)){
                                                                  $patient->setModeObtHisPreOpe(trim(utf8_encode($data[24])));
                                                              }else{
                                                                  $patient->setModeObtHisPreOpe('Autre')
                                                                      ->setAutreModeObtHisPreOpe(trim(utf8_encode($data[24])));
                                                              }

                                                              if (in_array($data[25], $tabHisto)){
                                                                  $patient->setHistoPreOp(trim(utf8_encode($data[25])));
                                                              }else{
                                                                  $patient->setHistoPreOp('Autre')
                                                                      ->setAutreHistoPreOp(trim(utf8_encode($data[25])));
                                                              }

                                                                  $patient->setPreOpXTnm($data[26])
                                                                  ->setTnmT(trim(utf8_encode($data[27])))
                                                                  ->setTnmN(trim(utf8_encode($data[28])))
                                                                  ->setTnmM(trim(utf8_encode($data[29])))
                                                                  ->setTnmStadeCtnm(trim(utf8_encode($data[30])))
                                                                  ->setStadeMasaokaPreOp(trim($data[31]));
                                                              if (strtoupper($data[33]) == "OK"){
                                                                  $patient->setTissuCongele("OUI");
                                                              }else{
                                                                  $patient->setTissuCongele(null);
                                                              }

                                                              if ($data[34] != ""){
                                                                  $patient->setDateDiagAcp(new \DateTime($data[34]));
                                                              }

                                                              $patient->setIdAcp($data[35])
                                                                  ->setDiagACPThymone(utf8_encode($data[36]))
                                                              ->setRcpRythmique(trim(utf8_encode($data[37])))
                                                              ->setTttPreOp(trim(utf8_encode($data[38])))
                                                              //->setSyndromeParaneo($data[39]);
                                                              ->setChimioPreOp(trim(utf8_encode($data[40])))
                                                              ->setAutrePreop(trim(utf8_encode($data[42])))
                                                              ->setReponseChimioPreOp(trim(utf8_encode($data[43])))
                                                              ->setIndication(trim(utf8_encode($data[44])))
                                                              ->setChirDateOpe(new \DateTime($data[45]));

                                                              $str = trim(strtolower($data[46]));
                                                                $notin = true;
                                                                  if ($str == "sternotomie"){
                                                                      $patient->setChirAbord("sternotomie");
                                                                      $notin = false;
                                                                  }

                                                               if ($str == "manubriotomie"){
                                                                   $patient->setChirAbord("manubriotomie");
                                                                   $notin = false;
                                                               }
                                                               if ($str == "thoracoscopie sous xyph"){
                                                                   $patient->setChirAbord("thoracoscopie sous xyph");
                                                                   $notin = false;
                                                               }

                                                                   if ($str == "thoracoscopie g"){
                                                                       $patient->setChirAbord(trim(utf8_encode("thoracoscopie gauche")));
                                                                       $notin = false;
                                                                   }

                                                                   if ($str == "thoracoscopie d"){
                                                                       $patient->setChirAbord(utf8_encode("thoracoscopie droite"));
                                                                       $notin = false;
                                                                   }

                                                                   if ($str == "thoracoscopie bilatérale"){
                                                                       $patient->setChirAbord(utf8_encode("thoracoscopie bilatérale"));
                                                                       $notin = false;
                                                                   }

                                                                   if ($str == "thoracotomie g"){
                                                                      $patient->setChirAbord("thoracotomie gauche");
                                                                       $notin = false;
                                                                  }
                                                                  if ($str == "thoracotomie d"){
                                                                      $patient->setChirAbord("thoracotomie droite");
                                                                      $notin = false;
                                                                  }


                                                                   if ($notin){
                                                                       $patient->setChirAbord("Autre")
                                                                           ->setAutreChirAbord(utf8_encode($str));
                                                                   }


                                                              if ((int)$data[47] == 1){
                                                                  $patient->setChirRoboAssist("Oui");
                                                              }else{
                                                                  $patient->setChirRoboAssist("Non");
                                                              }


                                                              if ((int)$data[48] == 1){
                                                                  $patient->setInsufflationCo2("Oui");
                                                              }else{
                                                                  $patient->setInsufflationCo2("Non");
                                                              }
                                                              $gest = strtolower(trim($data[49]));
                                                                if (in_array($gest, $tabGeste)){
                                                                    $patient->setChirGeste(trim(utf8_encode($gest)));
                                                                }else{
                                                                    $patient->setChirGeste('Autre')
                                                                        ->setAutreChirGeste(trim(utf8_encode($gest)));
                                                                }

                                                              $resection = trim($data[50]);
                                                              $resection = explode('/',$resection);

                                                              $restRes = "";

                                                              for ($i = 0; $i < count($resection) ; $i++ ){
                                                                  $notin = true;
                                                                  $str = trim(strtolower($resection[$i]));

                                                                  if (stristr($str, "péricarde") !== false){
                                                                      $patient->setPericard(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "wedge") !== false){
                                                                      $patient->setWedge(true)
                                                                          ->setWedgeTxt(utf8_encode($str));
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "tvi") !== false){
                                                                      $patient->setTvi(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "vcs") !== false){
                                                                      $patient->setVcs(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "phrénique d") !== false){
                                                                      $patient->setPhreniqued(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "phrénique g") !== false){
                                                                      $patient->setPhreniqueg(true);
                                                                      $notin = false;
                                                                  }


                                                                  if ($notin == true){
                                                                      $restRes = $restRes.$str."/" ;
                                                                  }
                                                              }

                                                              if ($restRes != ""){
                                                                  $patient->setChirTxtLibre(trim(utf8_encode($restRes)));
                                                              }


                                                              $patient->setCommentaire(trim(utf8_encode($data[51])))
                                                                  ->setConversion(trim(utf8_encode($data[52])))
                                                                  ->setChirDuree((int)$data[53]);
                                                              $patient->setChirSang((int)$data[54]);

                                                              if ((int)$data[55] == 1){
                                                                  $patient->setMortaliteParOpe("Oui");
                                                              }else{
                                                                  $patient->setMortaliteParOpe("Non");
                                                              }


                                                              if ((int)$data[56] == 1){
                                                                  $patient->setChirDrainage("1 drain");
                                                              }
                                                              if ((int)$data[56] == 2){
                                                                  $patient->setChirDrainage("2 drains");
                                                              }
                                                              if ((int)$data[56] == 3){
                                                                  $patient->setChirDrainage("3 drains");
                                                              }
                                                              if ((int)$data[56] == 4){
                                                                  $patient->setChirDrainage("4 drains");
                                                              }


                                                              if ((int)$data[57] == 1){
                                                                  $patient->setChirIntervInterac("Oui");
                                                              }else{
                                                                  $patient->setChirIntervInterac("Non");
                                                              }


                                                              $patient
                                                                  ->setQualiteResection(trim(utf8_encode($data[58])));

                                                                  if (in_array($data[59], $tabHisto)){
                                                                      $patient->setAnapathPostOp(trim(utf8_encode($data[59])));
                                                                  }else{
                                                                      $patient->setAnapathPostOp('Autre')
                                                                          ->setAutreAnapathPostOp(trim(utf8_encode($data[59])));
                                                                  }

                                                                   $patient->setXTnm($data[60])
                                                                  ->setPostTnmT($data[61])
                                                                  ->setPostTnmN($data[62])
                                                                  ->setPostTnmM($data[63])
                                                                  ->setPostTnmStadeCtnm($data[64]);

                                                                   $patient->setMasaokaPostOp($data[65])
                                                                  // ->setMasaokoKoga($data[67]);
                                                                    ->setReaUscPostOp($data[68]);

                                                                  if ((int)$data[69] == 1){
                                                                      $patient->setPostOpSuites("Oui");
                                                                  }else{
                                                                      $patient->setPostOpSuites(null);
                                                                  }


                               $Compli = trim($data[70]);
                               $Compli = explode('/',$Compli);

                               $restCompli = "";

                               for ($i = 0; $i < count($Compli) ; $i++ ){
                                   $notin = true;
                                   $str = trim(strtolower($Compli[$i]));

                                   if (stristr($str, "décès") !== false){
                                       $patient->setDecesChe(true);
                                       $notin = false;
                                   }

                                   if (stristr($str, "poussée") !== false){
                                       $patient->setPousse(true);
                                       $notin = false;
                                   }

                                   if (stristr($str, "paralysie") !== false and stristr($str, "phrénique") !== false){
                                       $patient->setParalysie(true);
                                       $notin = false;
                                   }

                                   if (stristr($str, "infection") !== false){
                                       $patient->setInfection(true);
                                       $notin = false;
                                   }

                                   if ($notin == true){
                                       $restCompli = $restCompli.$str."/" ;
                                   }

                               }

                               if ($restCompli != ""){
                                   $patient->setAutrePostOpSuites(utf8_encode($restCompli));
                               }


                            //   $patient->setComplicationPostOp(utf8_encode());



                                                                  $patient->setPostOpDureeDrainage((int)$data[71]);

                                                              $patient->setPostOpDateSortie(new \DateTime($data[72]))

                                                                  ->setTttPostOp(trim(utf8_encode($data[74])));

                                                                  if (utf8_encode($data[76]) != "" and utf8_encode($data[76]) != "0" and strtolower(utf8_encode($data[76])) != "nc" ){
                                                                      $patient->setChimioPostOp(trim(utf8_encode($data[76])));
                                                                  }

                                                                  if (utf8_encode($data[77]) != "" and utf8_encode($data[77]) != "0" and strtolower(utf8_encode($data[77])) != "nc" ){
                                                                      $patient->setRadiotherapiePostOp(trim(utf8_encode($data[77])));
                                                                  }


                                                                  if ((int)$data[78] == 1){
                                                                      $patient->setRecidive("Oui");
                                                                  }else{
                                                                      $patient->setRecidive(null);
                                                                  }



                                                                   if ($data[81] != ""){
                                                                       $patient->setDateRecidive(new \DateTime($data[81]));
                                                                   }
                                                                  $patient
                                                                  ->setLocalisationRecidive(trim(utf8_encode($data[82])))
                                                                  ->setTraitementRechuteRecidive(trim(utf8_encode($data[83])))
                                                                  ->setNumAcp(utf8_encode($data[85]));
                                                                   if ($data[87] != ""){
                                                                       $patient->setDateDerNouvelles(new \DateTime($data[87]));
                                                                   }

                                                              if ((int)$data[88] == 1){
                                                                  $patient->setDeces("Oui");
                                                              }else{
                                                                  $patient->setDeces(null);
                                                              }
                                                                  $patient->setCauseDeces(utf8_encode($data[89]))
                                                                  ->setSuiviMyasthenie(utf8_encode($data[91]))
                                                                  ->setScoreMyaPostOp((int)$data[92])
                                                                      ->setCommentaireLast(utf8_encode($data[94]));
                                $ipp = utf8_encode($data[95]);
                                if ($ipp == ""){
                                    $patient->setIpp("NONIPP".$row);
                                }else{
                                    $patient->setIpp($ipp);
                                }

                               $tdmTaille = (int) utf8_encode($data[96]);
                               if ($tdmTaille != 0){
                                   $patient->setTdm("Oui")
                                       ->setAutreTdm($tdmTaille);
                               }

                               $tdmCom = trim(utf8_encode($data[97]));
                               if ($tdmCom == "non fait" or $tdmCom == "nc"){
                                   $patient->setTdm("Non")
                                       ->setTdmAutre($tdmCom);
                               }else{
                                   $patient->setTdmAutre($tdmCom);
                               }



                               $petscanTaille = (int) utf8_encode($data[98]);
                               if ($petscanTaille != 0){
                                   $patient->setPetscan("Oui")
                                       ->setAutrePetscan($petscanTaille);
                               }

                                if (isset($data[99])){
                                    $petscanCom = trim(utf8_encode($data[99]));
                                    if ($petscanCom == "non fait" or $petscanCom == "nc" or $petscanCom == "?"){
                                        $patient->setPetscan("Non")
                                            ->setPetscanAutre($petscanCom);
                                    }else{
                                        $patient->setPetscanAutre($petscanCom);
                                    }
                                }




                                                              $comorbidite = $data[12];
                                                              $comorbidite = explode('/',$comorbidite);

                                                              $restCormo = "";

                                                              for ($i = 0; $i < count($comorbidite) ; $i++ ){
                                                                  $notin = true;
                                                                  $str = trim(strtolower($comorbidite[$i]));

                                                                  if (stristr($str, "hta") !== false){
                                                                      $patient->setHta(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "avc") !== false){
                                                                      $patient->setAvc(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "obésité") !== false){
                                                                      $patient->setObesite(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "dyslip") !== false){
                                                                      $patient->setDyslipide(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "diabète") !== false){
                                                                      $patient->setDiabete(true)
                                                                          ->setCoDiabeteTxt(utf8_encode($str));
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "chir") !== false){
                                                                      $patient->setCoChirurgie(true)
                                                                          ->setChirTxtLibre(utf8_encode($str));
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "respiratoire") !== false){
                                                                      $patient->setCoRespiratoire(true)
                                                                          ->setCoRespiratoireTxt(utf8_encode($str));
                                                                      $notin = false;
                                                                  }


                                                                  if (stristr($str, "insuffisance rénale chronique") !== false){
                                                                      $patient->setInsRenChr(true);
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "cancer") !== false){
                                                                      $patient->setCancer(true)
                                                                          ->setCancerTxt(utf8_encode($str));
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "cardiopathie") !== false){
                                                                      $patient->setCardiopathie(true)
                                                                          ->setCardiopathieTxt(utf8_encode($str));
                                                                      $notin = false;
                                                                  }

                                                                  if (stristr($str, "tabac") !== false){
                                                                      $patient->setTabagisme(true)
                                                                          ->setTabagismeTxt(utf8_encode($str));
                                                                      $notin = false;
                                                                  }


                                                                  if ($notin == true){
                                                                      $restCormo = $restCormo.$str."/" ;
                                                                  }
                                                              }

                                                              if ($restCormo != ""){
                                                                  $patient->setResteRiques(trim(utf8_encode($restCormo)));
                                                              }
                                                              $patient->setDateCreate(new \DateTime());

                                                              $this->em->persist($patient);

                                                              $row++;

                               }catch(\Exception $ex){
                                    dump($data,$ex);
                               }
                                                          }
                                                          fclose($handle);

                                                      }



                                                   $this->em->flush();

*/
        $session->set("searchUrl",$request->getRequestUri());
        $repository = new PatientRepository($this->getDoctrine());
        $patients = [];
        $inSearch = true;
        $this->recherche = new Search();

        if ($request->query->has('rechercher')){

            if ($request->query->has('nom') && $request->get('nom') ){
                $inSearch = true;
                $this->recherche->setNom($request->get('nom'));
            }


            if ($request->query->has('datechirdeb') && $request->get('datechirdeb') ){
                $inSearch = true;
                $this->recherche->setDateChirDeb(new \DateTime($request->get('datechirdeb')));
            }

            if ($request->query->has('datechirfin') && $request->get('datechirfin') ){
                $inSearch = true;
                $this->recherche->setDateChirFin(new \DateTime($request->get('datechirfin')));
            }

            if ($request->query->has('prenom') && $request->get('prenom') ){
                $inSearch = true;
                $this->recherche->setPrenom($request->get('prenom'));
            }

            if ($request->query->has('referent') && $request->get('referent') ){
                $inSearch = true;
                $this->recherche->setReferent($request->get('referent'));
            }

            if ($request->query->has('ipp') && $request->get('ipp') ){
                $inSearch = true;
                $this->recherche->setIpp($request->get('ipp'));
            }

            if ($request->query->has('episode') && $request->get('episode') ){
                $inSearch = true;
                $this->recherche->setEpisode($request->get('episode'));
            }

            if ($request->query->has('datenaissance') && $request->get('datenaissance') ){
                $inSearch = true;
                $this->recherche->setDateNaissance(new \DateTime($request->get('datenaissance')));
            }
            if ($inSearch)
                $patients = $repository->SearchPatient($this->recherche);
        }


        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
            'patients' => $patients,
            'recherche' => $this->recherche
        ]);
    }


    /**
     * @Route("/liste", name="liste")
     * @param Request $request
     * @param Session $session
     * @param Security $security
     * @return Response
     * @throws \Exception
     */
    public function liste(Request $request, Session $session, Security $security)
    {
        $repository = new PatientRepository($this->getDoctrine());
        $patients = [];
        $patients = $request->get('patients');
        if ($request->get('patients')){

            $patients = $repository->getlistOfPatient($patients);
        }


        return $this->render('acceuil/liste.html.twig', [
            'controller_name' => 'AcceuilController',
            'patients' => $patients,
        ]);
    }

    public function Utf8_ansi($valor) {

        $utf8_ansi2 = array(
            "\u00c0" =>"À",
            "\u00c1" =>"Á",
            "\u00c2" =>"Â",
            "\u00c3" =>"Ã",
            "\u00c4" =>"Ä",
            "\u00c5" =>"Å",
            "\u00c6" =>"Æ",
            "\u00c7" =>"Ç",
            "\u00c8" =>"È",
            "\u00c9" =>"É",
            "\u00ca" =>"Ê",
            "\u00cb" =>"Ë",
            "\u00cc" =>"Ì",
            "\u00cd" =>"Í",
            "\u00ce" =>"Î",
            "\u00cf" =>"Ï",
            "\u00d1" =>"Ñ",
            "\u00d2" =>"Ò",
            "\u00d3" =>"Ó",
            "\u00d4" =>"Ô",
            "\u00d5" =>"Õ",
            "\u00d6" =>"Ö",
            "\u00d8" =>"Ø",
            "\u00d9" =>"Ù",
            "\u00da" =>"Ú",
            "\u00db" =>"Û",
            "\u00dc" =>"Ü",
            "\u00dd" =>"Ý",
            "\u00df" =>"ß",
            "\u00e0" =>"à",
            "\u00e1" =>"á",
            "\u00e2" =>"â",
            "\u00e3" =>"ã",
            "\u00e4" =>"ä",
            "\u00e5" =>"å",
            "\u00e6" =>"æ",
            "\u00e7" =>"ç",
            "\u00e8" =>"è",
            "\u00e9" =>"é",
            "\u00ea" =>"ê",
            "\u00eb" =>"ë",
            "\u00ec" =>"ì",
            "\u00ed" =>"í",
            "\u00ee" =>"î",
            "\u00ef" =>"ï",
            "\u00f0" =>"ð",
            "\u00f1" =>"ñ",
            "\u00f2" =>"ò",
            "\u00f3" =>"ó",
            "\u00f4" =>"ô",
            "\u00f5" =>"õ",
            "\u00f6" =>"ö",
            "\u00f8" =>"ø",
            "\u00f9" =>"ù",
            "\u00fa" =>"ú",
            "\u00fb" =>"û",
            "\u00fc" =>"ü",
            "\u00fd" =>"ý",
            "\u00ff" =>"ÿ");

        foreach ($utf8_ansi2 as $key => $value){
            $valor = str_replace($value,$key,$valor);
        }
        return $valor;

    }

    /**
     * @Route("/liste/exdop", name="liste.exdop")
     * @param Request $request
     * @param Session $session
     * @param Security $security
     * @return Response
     * @throws \Exception
     */
    public function exdop(Request $request, Session $session, Security $security)
    {
        $login = $request->get('login');
        $pwd = $request->get('pwd');
        $cmd = 'CWSRun.exe /USERNAME='.$login.' /PASSWORD='.$pwd.' /UAC=XXXX /IPP=000564635' ;
       // dd(shell_exec($cmd));
        return $this->redirectToRoute('acceuil');

    }
}
