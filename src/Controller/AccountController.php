<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountController extends AbstractController
{
    /**
     * @Route("/mon-compte", name="moncompte")
     */
    public function index(UserRepository $user): Response
    {

        $user = $this->getUser();
        //dd($user);
        return $this->render('account/index.html.twig', [
            'user' => $user
        ]);
    }
}
