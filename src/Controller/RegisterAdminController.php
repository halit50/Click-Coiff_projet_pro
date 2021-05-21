<?php

namespace App\Controller;

use App\Entity\Adresses;
use App\Entity\Enseigne;
use App\Form\EnseigneType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterAdminController extends AbstractController
{
    /**
     * @Route("/inscription-pro", name="register-pro")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $enseigne = new Enseigne();
        //$user = new User();
        $form = $this->createForm(EnseigneType::class, $enseigne);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $enseigne->getUser();
            $password = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles(['ROLE_ADMIN']);
            $em = $this->getDoctrine()->getManager();
            $em->persist($enseigne);
            $em->flush();

            return $this->redirectToRoute('admin');
        }
        return $this->render('register/registerPro.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
