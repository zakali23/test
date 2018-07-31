<?php
/**
 * Created by PhpStorm.
 * User: coralie
 * Date: 24/05/18
 * Time: 10:35
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EntrepriseController extends Controller
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function indexAction(Request $request)
    {
        $activeEntreprise = true;

        // replace this example code with whatever you need
        return $this->render('entreprise/index.html.twig', ['activeEntreprise' => $activeEntreprise]);
    }
}