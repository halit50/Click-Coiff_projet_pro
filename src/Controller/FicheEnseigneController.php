<?php

namespace App\Controller;

use DateTime;
use App\Entity\Creneau;
use App\Entity\Enseigne;
use App\Entity\PrendreRdv;
use App\Form\PrendreRdvType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FicheEnseigneController extends AbstractController
{
    /**
     * @Route("/fiche/enseigne/{id}", name="ficheEnseigne")
     */
    public function index(Enseigne $enseigne, Request $request): Response
    {

       
       
        // Formulaire calendrier
        $rdv = new PrendreRdv();
        $rdv->setUser($this->getUser())->setAdresse($enseigne->getAdresses());

        $form = $this->createForm(PrendreRdvType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($rdv);
            $em->flush();
        }


        return $this->render('fiche_enseigne/index.html.twig',
        [
            'enseigne' => $enseigne,
            'form' => $form->createView()
        ] );
    }


    /**
     * @Route("/fiche/enseigne/{id}/plage-horaire", name="plage_horaire")
     */
    public function plageHoraire(Enseigne $enseigne, Request $request) {
        $daterdv = $request->query->get('daterdv');
         //dd($daterdv);
        
        if (null != $daterdv) {
            $dateconvert = DateTime::createFromFormat('Y-m-d H:i:s', $daterdv.' 00:00:00');
            //dd($dateconvert);
            $prendreRdvRepo = $this->getDoctrine()->getRepository(PrendreRdv::class);
            $rdvpris = $prendreRdvRepo->findBy(['daterdv' => $dateconvert, 'adresse' => $enseigne->getAdresses()]);
            //dd($rdvpris);
        } 
    /***********************Gestion des créneaux**************************/

        $creneaux = $enseigne->getCreneaus();
        if(!$creneaux->isEmpty()){
         //dd($creneaux);
        $creneau = $creneaux[0];
        $heuredebut = $creneau->getHeuredebut()->format('H:i:s');
         //dd($heuredebut);
        $heuredefin = $creneau->getHeurefin()->format('H:i:s');
        $intervalle = $creneau->getPeriodicite();
        $creneauRdv = [];
        $creneauRdv[0] = ['heure' => $heuredebut, 'dispo' => true];
        $creneauTmp = $heuredebut;
        do {
            $creneauTime = strtotime("+$intervalle minutes", strtotime($creneauTmp));
            $creneauTmp = date('H:i:s', $creneauTime);
            $creneauRdv[] = ['heure' => $creneauTmp, 'dispo' => true];
        } while ($creneauTmp != $heuredefin);

        /*************************************************/

        foreach ($creneauRdv as $key => $rdv){
            foreach ($rdvpris as $prendreRdv){
                if ($rdv['heure'] == $prendreRdv->getHeures()){
                    $creneauRdv[$key] = ['heure' => $rdv['heure'], 'dispo' => false];
                }
            }
        }
    }
        //dd($creneauRdv);
        return $this->render('fiche_enseigne/plage_horaire.html.twig', [
            'creneauRdv' => $creneauRdv??[],
        ] );
    }
}
