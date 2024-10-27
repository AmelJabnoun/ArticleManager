<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'controller_name' => 'FirstController',
        ]);
    }


    #[Route('/amel', name: 'app_amel')]
    public function index0(): Response
    {
        return $this->render('first/message.html.twig');
    }

    #[Route('/amel1', name: 'app_amel1')]
    public function index1(): Response
    {
        return new Response ("amel1");
    } 
    #[Route('/amel2', name: 'app_amel2')]
    public function index2(): Response 
    {
        return $this->render('first/amel2.html.twig',[
            'name'=>'JABNOUN',
            'age'=>32,
            'skills'=>["html","anglais","symfony"]
        ]);
    }
    #[Route("/deviner", name: "")]
    public function deviner(): Response
    {
        $aleatoire = rand(0, 10);
        if ($aleatoire % 2 == 0) {
            //return $this->redirectToRoute("app_first");
            return $this->forward("App\Controller\FirstController::index");


        } else {
            return new Response("Desolé, vous etes qui? , le numero aléatoire est :" . $aleatoire);
        }
    }
    #[Route('/amel/{age}', name: 'app_amel3')]
    public function index3($age): Response
    {
        return $this->render('first/message3.html.twig',[
            'age'=>$age
        


        ]);
    }
}
