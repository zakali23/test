<?php
/**
 * Created by PhpStorm.
 * User: coralie
 * Date: 09/06/18
 * Time: 09:13
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ConnexionController extends Controller{

    /**
     * @Route("/", name="homepage")
     */

    public function indexAction(Request $request){

        return $this->render('accueil/index.html.twig');
    }



    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user_info", name="user_info")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */

    public function showUserAction()
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('admin/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_LOCATAIRE')) {
            return $this->render('locataire/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_PROPROETAIRE')) {
            return $this->render('proprietaire/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_SYNDICAT')) {
            return $this->render('syndicat/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_COPROPRIETAIRE')) {
            return $this->render('coproprietaire/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ASSOCOPRO')) {
            return $this->render('asso_copro/index.html.twig');
        }

    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/profile_user", name="profile_user")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */

    public function determineUser()
    {

        return $this->render('user/user.html.twig', array(
            'user'=>$this->getUser(),
        ));

    }






}