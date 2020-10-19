<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Search;
use App\Entity\User;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use ExcelMerge\ExcelMerge;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Finder\Finder;


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


// Moulinette d'extraction de données PICIS
/*
        $finder = new Finder();
        $filesystem = new Filesystem();
        $finder->files()->in("C:\Users\makone\Documents\DOCXCSV");
        //$finder->files()->in("//immdom.local\Applications$\PICIS");
        $tab = [];
        $spreadsheet = new Spreadsheet();


        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle("Merged");


        // Creation des collones

$i = 1;
        foreach ($finder as $file) {
            // dumps the absolute path
          //  var_dump);
            if (stristr(strtoupper($file->getRelativePathname()), "CONTROLE_IMP_PDF_PICIS_NON_TROUVES") !== false){

                if (($handle = fopen($file->getRealPath(), "r")) !== FALSE) {


                    while (($data = fgetcsv($handle)) !== FALSE) {

                        $sheet->setCellValue('A'.$i, utf8_encode($data[0]));
                        $sheet->setCellValue('B'.$i, utf8_encode($data[1]));
                        $sheet->setCellValue('C'.$i, utf8_encode($data[2]));
                        $sheet->setCellValue('D'.$i, utf8_encode($data[3]));
                        $sheet->setCellValue('E'.$i, utf8_encode($data[4]));
                        $sheet->setCellValue('F'.$i, utf8_encode($data[5]));
                        $sheet->setCellValue('G'.$i, utf8_encode($data[6]));
                        $sheet->setCellValue('H'.$i, utf8_encode($data[7]));
                        $sheet->setCellValue('I'.$i, utf8_encode($data[8]));
                        $sheet->setCellValue('J'.$i, utf8_encode($data[9]));
                        $sheet->setCellValue('K'.$i, utf8_encode($data[10]));
                        $sheet->setCellValue('L'.$i, utf8_encode($data[11]));
                        $sheet->setCellValue('M'.$i, utf8_encode($data[12]));

                        $i++;


                       // dd($data);
                    }
                }


               // $cmd = 'soffice --convert-to xlsx "'.$file->getRealPath().'" --outdir "C:\Users\makone\Documents\DOCX"' ;
              // $cmd = 'soffice --convert-to csv "'.$file->getRealPath().'" --outdir "C:\Users\makone\Documents\DOCXCSV"' ;
                //shell_exec($cmd);

                /*
                $xls_to_convert = 'xlsx/'.$i.$file->getFilename();

                soffice --convert-to xlsx "C:\Users\makone\Documents\CONTROLE_IMP_PDF_PICIS_NON_TROUVES_01012018_2300.xls" -outdir "C:\Users\makone\Documents"

                //------------------------------------------------------------------------------------

               //$filesystem->copy($file->getRealPath(), 'CONTROLE_IMP_PDF_PICIS_NON_TROUVESXX/CONTROLE_IMP_PDF_PICIS_NON_TROUVES'.$i.'.xlsx');
               //$tab[] = 'CONTROLE_IMP_PDF_PICIS_NON_TROUVES/CONTROLE_IMP_PDF_PICIS_NON_TROUVES'.$i.'.xlsm';
               // $tab[] = $file->getRealPath();
            }

        }

        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);

        // Create a Temporary file in the system
        $fileName = "COMPOLED.xlsx";
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);

        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);


        //  $merged = new ExcelMerge($tab);
      //$merged->download("my-filename.xlsm");

        // or

      //$filename = $merged->save("FUSION_CONTROLE_IMP_PDF_PICIS_NON_TROUVES.xlsx");

*/



                             // $csv = array_map('str_getcsv', file('../public/bdd_tymus.csv'));
                               $row = 1;
                              // $data = "";
                               $tab = [];

                               $tabChir = ['DG','ASG','MG','EB','GB'];
                               $tabAnticor = ['positifs','négatifs','non fait'];
                               $tabmode_obt_his_pre_ope = ['ponction TDM', 'biopsie chirurgicale', 'pre op', 'piece anapath'];
                               $tabHisto = ['thymome A', 'thymome AB', 'thymome B1', 'thymome B2', 'thymome B3', 'thymome rare', 'pièce anapath', 'carcinoïde', 'carcinoide typique', 'carcinoide atypique',
                                   'carcinome épidermoïde','carcinome NE thymique avancé','carcinome thymique','cellules thymiques','contributif négatif','lymphome','lymphome B','lyphome de Hodgkin','non contributive'];
/*
                       if (($handle = fopen("../public/bdd_Thymus_new_utf8.csv", "r")) !== FALSE) {
                           while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
//dd($data);
                               $patient = new Patient();

                            //   for ($i = 0 ; $i < count($data) ; $i++){
                             //      $data[$i] = utf8_encode($data[$i]);
                             ///  }



                                                              $patient->setElios((int)$data[0])
                                                                  ->setNom(utf8_encode($data[1]))
                                                                  ->setPrenom(utf8_encode($data[2]))
                                                                  ->setSexe($data[3])
                                                                  ->setDdn(new \DateTime($data[4]));

                                                              if (in_array($data[6], $tabChir)){
                                                                  $patient->setChirurgienReferent($data[6]);
                                                              }else{
                                                                  $patient->setChirurgienReferent("Autre");
                                                                  $patient->setAutreChirurgienReferent($data[6]);
                                                              }
                                                              if (!$patient->getChirurgienReferent()){
                                                                  $patient->setChirurgienReferent("Autre");
                                                                  $patient->setAutreChirurgienReferent("pas chir ref");
                                                              }
                                                              $patient
                                                                  ->setPoids((float) $data[7])
                                                                  ->setTaille((float) $data[8])
                                                                  ->setPs($data[10])
                                                                  ->setScoreCharlson((int)$data[11])
                                                                  ->setMaladiAutoImmAssoc(trim(utf8_encode($data[13])))
                                                                  ->setSyndromeParaneo(trim(utf8_encode($data[14])))
                                                                  ->setModeDeDecouverte(trim(utf8_encode($data[15])));

                                                              $preop =  trim(utf8_encode($data[16]));
                                                              if ((int)$preop == 1 ){
                                                                  $patient->setConsNeuDepMgPreOp("Oui");
                                                              }else{
                                                                  if ((int)$preop == 0 ){
                                                                      $patient->setConsNeuDepMgPreOp("Non");
                                                                  }
                                                              }



                                                                  $patient->setScoreMyastPreOp((int)$data[17])
                                                                  ->setTraiFondMyasthenie($data[18]);


                                                              $epp = strtolower($data[19]);
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
                                                                      ->setEppAutre($epp);
                                                              }

                                                              $anticr = trim(utf8_encode($data[20]));
                                                              if (in_array($anticr, $tabAnticor)){
                                                                  $patient->setAnticorpsAntiRach($anticr);
                                                              }else{
                                                                  $patient->setAnticorpsAntiRach("Autre")
                                                                      ->setAnticrAutre($anticr);
                                                              }



                                                              $irm = strtolower($data[21]);

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


                                                              $tdm = (int)utf8_encode($data[22]);
                                                              if ($tdm != 0){
                                                                  $patient->setTdm("Oui")
                                                                      ->setAutreTdm($tdm);
                                                              }else{
                                                                  if (strlen($tdm) > 2){
                                                                      $patient->setTdm("Autre")
                                                                          ->setTdmAutre($tdm);
                                                                  }else{
                                                                      $patient->setTdm(null);
                                                                  }
                                                              }

                                                              $tdm = (int)utf8_encode($data[23]);

                                                              if ($tdm != 0){
                                                                  $patient->setPetscan("Oui")
                                                                      ->setAutrePetscan($tdm);
                                                              }else{

                                                                  if (strlen($tdm) > 2){
                                                                      $patient->setPetscan("Autre")
                                                                          ->setPetscanAutre($tdm);
                                                                  }else{
                                                                      $patient->setPetscan(null);
                                                                  }

                                                              }


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

                                                              if (stristr($str, "sternotomie") !== false){
                                                                  $patient->setChirAbord("sternotomie");
                                                              }

                                                              if (stristr($str, "thoracoscopie") !== false){


                                                                  $patient->setChirAbord("thoracoscopie");

                                                                  if (stristr($str, "bilatérale") !== false){
                                                                      $patient->setChirThoracos(trim(utf8_encode("bilatérale")));
                                                                  }

                                                                  if (stristr($str, "thoracoscopie g") !== false){
                                                                      $patient->setChirThoracos(trim(utf8_encode("Unilatérale gauche")));
                                                                  }

                                                                  if (stristr($str, "thoracoscopie d") !== false){
                                                                      $patient->setChirThoracos(utf8_encode("Unilatérale droite"));
                                                                  }

                                                                  if (stristr($str, "sous xyph") !== false){
                                                                      $patient->setChirThoracos("Sous xyph");
                                                                  }

                                                              }


                                                              if (stristr($str, "thoracotomie g") !== false){
                                                                  $patient->setChirAbord("thoracotomie gauche");
                                                              }

                                                              if (stristr($str, "thoracotomie d") !== false){
                                                                  $patient->setChirAbord("thoracotomie droite");
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


                                                                  $patient
                                                                  ->setChirGeste(trim(utf8_encode($data[49])));

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
                                                                   ->setMasaokoKoga($data[67]);

                                                                  $patient->setReaUscPostOp($data[68]);

                                                                  if ((int)$data[69] == 1){
                                                                      $patient->setPostOpSuites("Oui");
                                                                  }else{
                                                                      $patient->setPostOpSuites(null);
                                                                  }

                                                                  $patient->setComplicationPostOp(utf8_encode(trim($data[70])))
                                                                  ->setPostOpDureeDrainage((int)$data[71]);

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
                                                                   if ($data[79] != ""){
                                                                       $patient->setDateRecidive(new \DateTime($data[79]));
                                                                   }
                                                                  $patient
                                                                  ->setLocalisationRecidive(trim(utf8_encode($data[80])))
                                                                  ->setTraitementRechuteRecidive(trim(utf8_encode($data[81])))
                                                                  ->setNumAcp(utf8_encode($data[83]))
                                                                  ->setDateDerNouvelles(new \DateTime($data[85]));
                                                              if ((int)$data[86] == 1){
                                                                  $patient->setDeces("Oui");
                                                              }else{
                                                                  $patient->setDeces(null);
                                                              }
                                                                  $patient->setCauseDeces(utf8_encode($data[87]))
                                                                  ->setSuiviMyasthenie(utf8_encode($data[89]))
                                                                  ->setScoreMyaPostOp((int)$data[90]);

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
}
