<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Admin controller.
 *
 * @Route("admin")
 */
class AdminController extends Controller{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="admin_page")
     */
    public function adminPageAction(){
        return $this->render('admin/index.html.twig');
    }

}