<?php
// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="app_index")
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig');
    }


    /**
     * @param string $slug The slugger
     * @Route("wild/show/{slug}", requirements={"slug"="[a-z0-9-]+$"}, defaults={"slug" = null}, name="wild_show_slug")
     * @return Response
     */
    public function show(?string $slug): Response
    {
        $slugWithoutDash = str_replace("-", " ", $slug);
        $slugInMag = ucwords($slugWithoutDash);
        return $this->render('wild/show.html.twig', [
            'slug' => $slugInMag

        ]);

    }
}