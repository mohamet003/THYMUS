<?php

namespace App\Controller;

use App\Entity\CaseCocheeMultiple;
use App\Entity\Patient;
use App\Form\FormPatientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->em = $manager;
    }


    /**
     * @Route("/", name="formulaire")
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $patient = new Patient();
        $form = $this->createForm(FormPatientType::class, $patient);
        $form->handleRequest($request);



       // dd($form);
        if ($form->isSubmitted() && $form->isValid()){


            $patient->setDateCreate(new \DateTime());
            $patient->setDateUpdate(new \DateTime());


            if ($request->get('AVC')){
                $avc = new CaseCocheeMultiple();
                $avc->setNomCase($request->get('Comorbidites'));
                $avc->setTexteCase('AVC');
                $patient->addCasesCocheeMulti($avc);
            }

            if ($request->get('AVC')){
                $avc = new CaseCocheeMultiple();
                $avc->setNomCase($request->get('Comorbidites'));
                $avc->setTexteCase('AVC');
                $patient->addCasesCocheeMulti($avc);
            }



          //  dd($form);
          //  $this->em->persist($patient);
          //  $this->em->flush();
            $this->addFlash(
                'succes',
                "Patient enrégistré avec succes !"
            );
           // return $this->redirectToRoute('formulaire');
        }


        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'form' => $form->createView()
        ]);
    }
}
