<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Syndic;
use AppBundle\Service\Lister;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Syndic controller.
 *
 * @Route("syndic")
 */
class SyndicController extends Controller
{
    /**
     * Lists all syndic entities.
     *
     * @Route("/", name="syndic_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $syndics = $em->getRepository('AppBundle:Syndic')->findAll();


        return $this->render('syndic/index.html.twig', array(
            'syndics' => $syndics,
            'user' => $this->getUser(),
        ));
    }

    /**
     * Creates a new syndic entity.
     *
     * @Route("/new", name="syndic_new")
     * @IsGranted("ROLE_ADMIN")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $syndic = new Syndic();
        $form = $this->createForm('AppBundle\Form\SyndicType', $syndic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($syndic);
            $em->flush();

            return $this->redirectToRoute('syndic_show', array('id' => $syndic->getId()));
        }

        return $this->render('syndic/new.html.twig', array(
            'syndic' => $syndic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a syndic entity.
     *
     * @Route("/{id}", name="syndic_show")
     * @IsGranted("ROLE_ADMIN")
     * @Method("GET")
     */
    public function showAction(Syndic $syndic)
    {
        $deleteForm = $this->createDeleteForm($syndic);

        return $this->render('syndic/show.html.twig', array(
            'syndic' => $syndic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a syndic entity.
     *
     * @Route("/{id}/immeuble", name="syndic_immeuble")
     * @Method("GET")
     * @param Syndic $syndic
     * @param Lister $lister
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function immeubleAction(Syndic $syndic, Lister $lister)
    {
        $immeubles = $lister->getImmeubleFromSyndic($syndic);


        return $this->render('syndic/immeuble_syndic.html.twig', array(
            'syndic' => $syndic,
            'immeubles' => $immeubles,

        ));
    }

    /**
     * Finds and displays a syndic entity.
     *
     * @Route("/{id}/lot", name="syndic_lot")
     * @Method("GET")
     * @param Syndic $syndic
     * @param Lister $lister
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function lotAction(Syndic $syndic, Lister $lister)
    {
        $lots = $lister->getLotsFromSyndic($syndic);


        return $this->render('syndic/lot_syndic.html.twig', array(

            'lots' => $lots,
            'syndic' => $syndic,

        ));
    }

    /**
     * Finds and displays a syndic entity.
     *
     * @Route("/{id}/piece", name="syndic_room")
     * @Method("GET")
     * @param Syndic $syndic
     * @param Lister $lister
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function roomAction(Syndic $syndic, Lister $lister)
    {
        $rooms = $lister->getRoomsFromSyndic($syndic);



        return $this->render('syndic/piece_syndic.html.twig', array(

            'rooms' => $rooms,
            'syndic' => $syndic,

        ));
    }

    /**
     * Displays a form to edit an existing syndic entity.
     *
     * @Route("/{id}/edit", name="syndic_edit")
     * @IsGranted("ROLE_ADMIN")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Syndic $syndic)
    {

        $deleteForm = $this->createDeleteForm($syndic);
        $editForm = $this->createForm('AppBundle\Form\SyndicType', $syndic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('syndic_index', array('id' => $syndic->getId()));
        }

        return $this->render('syndic/edit.html.twig', array(
            'syndic' => $syndic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a syndic entity.
     *
     * @Route("/{id}", name="syndic_delete")
     * @IsGranted("ROLE_ADMIN")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Syndic $syndic)
    {
        $form = $this->createDeleteForm($syndic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($syndic);
            $em->flush();
        }

        return $this->redirectToRoute('syndic_index');
    }

    /**
     * Creates a form to delete a syndic entity.
     *
     * @param Syndic $syndic The syndic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Syndic $syndic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('syndic_delete', array('id' => $syndic->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
