<?php

namespace App\Controller;

use App\Entity\Search;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
     * @return Response
     * @throws \Exception
     */
    public function index(Request $request)
    {

        /*
               // $csv = array_map('str_getcsv', file('../public/bdd_tymus.csv'));
                $row = 1;
               // $data = "";
                $tab = [];
                if (($handle = fopen("../public/bdd_tymus.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        dump($data);
                        $num = count($data);
                        $row++;
                        for ($c=0; $c < $num; $c++) {
                            $tab[] = $data[$c];
                        }
                    }
                    fclose($handle);
                }

                foreach ($tab as $item) {
                    $ligne = explode(';', $item);
                    dump($ligne);
                }


        if (($handle = fopen('../public/bdd_tymus.csv', 'r')) !== FALSE) { // Check the resource is valid
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!

                for ($i = 0; $i < count($data); $i++) { // Loop over the data using $i as index pointer
                    dump($data[$i]);
                }
            }
            fclose($handle);
        }
   */
        $repository = new PatientRepository($this->getDoctrine());
        $patients = [];
        $inSearch = false;
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
            'recherche' => $this->recherche,
        ]);
    }
}
