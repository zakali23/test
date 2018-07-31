<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FournisseurCompteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Fournisseurcompteur controller.
 *
 * @Route("fournisseurcompteur")
 */
class FournisseurCompteurController extends Controller
{
    /**
     * Lists all fournisseurCompteur entities.
     *
     * @Route("/", name="fournisseurcompteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fournisseurCompteurs = $em->getRepository('AppBundle:FournisseurCompteur')->findAll();

        return $this->render('fournisseurcompteur/index.html.twig', array(
            'fournisseurCompteurs' => $fournisseurCompteurs,
        ));
    }

    /**
     * Creates a new fournisseurCompteur entity.
     *
     * @Route("/new", name="fournisseurcompteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fournisseurCompteur = new Fournisseurcompteur();
        $form = $this->createForm('AppBundle\Form\FournisseurCompteurType', $fournisseurCompteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseurCompteur);
            $em->flush();

            return $this->redirectToRoute('fournisseurcompteur_show', array('id' => $fournisseurCompteur->getId()));
        }

        return $this->render('fournisseurcompteur/new.html.twig', array(
            'fournisseurCompteur' => $fournisseurCompteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fournisseurCompteur entity.
     *
     * @Route("/{id}", name="fournisseurcompteur_show")
     * @Method("GET")
     */
    public function showAction(FournisseurCompteur $fournisseurCompteur)
    {
        $deleteForm = $this->createDeleteForm($fournisseurCompteur);

        return $this->render('fournisseurcompteur/show.html.twig', array(
            'fournisseurCompteur' => $fournisseurCompteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fournisseurCompteur entity.
     *
     * @Route("/{id}/edit", name="fournisseurcompteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FournisseurCompteur $fournisseurCompteur)
    {
        $deleteForm = $this->createDeleteForm($fournisseurCompteur);
        $editForm = $this->createForm('AppBundle\Form\FournisseurCompteurType', $fournisseurCompteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fournisseurcompteur_edit', array('id' => $fournisseurCompteur->getId()));
        }

        return $this->render('fournisseurcompteur/edit.html.twig', array(
            'fournisseurCompteur' => $fournisseurCompteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fournisseurCompteur entity.
     *
     * @Route("/{id}", name="fournisseurcompteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FournisseurCompteur $fournisseurCompteur)
    {
        $form = $this->createDeleteForm($fournisseurCompteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fournisseurCompteur);
            $em->flush();
        }

        return $this->redirectToRoute('fournisseurcompteur_index');
    }

    /**
     * Creates a form to delete a fournisseurCompteur entity.
     *
     * @param FournisseurCompteur $fournisseurCompteur The fournisseurCompteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FournisseurCompteur $fournisseurCompteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fournisseurcompteur_delete', array('id' => $fournisseurCompteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
