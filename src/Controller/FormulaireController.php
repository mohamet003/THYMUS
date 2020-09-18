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
     * @Route("/formulaire", name="formulaire")
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

            if ($request->get('tissus')){
                $patient->setTissuCongele($request->get('tissus'));
            }

            if ($request->get('suite')){
                $patient->setPostOpSuites($request->get('suite'));
        }

            if ($request->get('group1')){
                $patient->setXTnm($request->get('group1'));
            }

            if ($request->get('group2')){
                $patient->setPreOpXTnm($request->get('group2'));
            }


            /*
                        if ($request->get('chimiopreop')){
                            $patient->setChimioPreOp($request->get('chimiopreop'));
                        }

                        if ($request->get('reponse')){
                            $patient->setReponseChimioPreOp($request->get('reponse'));
                        }

                        if ($request->get('immune')){
                            $patient->setMaladiAutoImmAssoc($request->get('immune'));
                        }

                        if ($request->get('paraneo')){
                            $patient->setSyndromeParaneo($request->get('paraneo'));
                        }


                        if ($request->get('rcp_ryth')){
                            $patient->setRcpRythmique($request->get('rcp_ryth'));
                        }

                        if ($request->get('conversion')){
                            $patient->setConversion($request->get('conversion'));
                        }

            if ($request->get('usc')){
                $patient->setReaUscPostOp($request->get('usc'));
            }

                        if ($request->get('chimio_post_op')){
                            $patient->setChimioPostOp($request->get('chimio_post_op'));
                        }

                        if ($request->get('radio_post_op')){
                            $patient->setRadiotherapiePostOp($request->get('radio_post_op'));
                        }
  */

            if ($request->get('recidive')){
                $patient->setRecidive($request->get('recidive'));
            }

            if ($request->get('deces')){
                $patient->setDeces($request->get('deces'));
            }


            $patient->setDateCreate(new \DateTime());
            $patient->setDateUpdate(new \DateTime());

            $this->em->persist($patient);
            $this->em->flush();
            $this->addFlash(
                'succes',
                "Patient enrégistré avec succes !"
            );
            return $this->redirectToRoute('acceuil');
        }


        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'form' => $form->createView(),
            'patient' => $patient,
            'button' => 'ENREGISTRER'
        ]);
    }


    /**
     * @Route("/formulaire/{id}", name="formulaire.edit")
     * @param Patient $patient
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function edit(Patient $patient, Request $request)
    {

        $form = $this->createForm(FormPatientType::class, $patient);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            if ($request->get('tissus')){
                $patient->setTissuCongele($request->get('tissus'));
            }else{
                $patient->setTissuCongele(null);
            }

            if ($request->get('suite')){
                $patient->setPostOpSuites($request->get('suite'));
            }else{
                $patient->setPostOpSuites(null);
            }

            if ($request->get('group1')){
                $patient->setXTnm($request->get('group1'));
            }else{
                $patient->setXTnm(null);
            }

            if ($request->get('group2')){
                $patient->setPreOpXTnm($request->get('group2'));
            }else{
                $patient->setPreOpXTnm(null);
            }

            if ($request->get('recidive')){
                $patient->setRecidive($request->get('recidive'));
            }else{
                $patient->setRecidive(null);
            }


            if ($request->get('deces')){
                $patient->setDeces($request->get('deces'));
            }else{
                $patient->setDeces(null);
            }




            $patient->setDateUpdate(new \DateTime());
            $this->em->flush();
            $this->addFlash(
                'succes',
                "Patient modifié avec succes !"
            );
            return $this->redirectToRoute('acceuil');
        }

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'form' => $form->createView(),
            'patient' => $patient,
            'button' => 'MODIFIER'
        ]);
    }


    /**
     * @Route("/formulaire/{id}", name="formulaire.delete")
     * @param Patient $patient
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function delete(Patient $patient, Request $request)
    {
            $this->em->remove($patient);
            $this->em->flush();
            $this->addFlash(
                'succes',
                "Patient supprimé avec succes !"
            );

        return $this->json("");
}
}
