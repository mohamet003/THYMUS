<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\FormPatientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/", name="formulaire")
     */
    public function index()
    {
        $patient = new Patient();
        $form = $this->createForm(FormPatientType::class, $patient);

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
            'form' => $form->createView()
        ]);
    }
}
