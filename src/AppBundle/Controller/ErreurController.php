<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Erreur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Erreur controller.
 *
 * @Route("erreur")
 */
class ErreurController extends Controller
{
    /**
     * Lists all erreur entities.
     *
     * @Route("/", name="erreur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $erreurs = $em->getRepository('AppBundle:Erreur')->findAll();

        return $this->render('erreur/index.html.twig', array(
            'erreurs' => $erreurs,
        ));
    }

    /**
     * Creates a new erreur entity.
     *
     * @Route("/new", name="erreur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $erreur = new Erreur();
        $form = $this->createForm('AppBundle\Form\ErreurType', $erreur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($erreur);
            $em->flush();

            return $this->redirectToRoute('erreur_show', array('id' => $erreur->getId()));
        }

        return $this->render('erreur/new.html.twig', array(
            'erreur' => $erreur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a erreur entity.
     *
     * @Route("/{id}", name="erreur_show")
     * @Method("GET")
     */
    public function showAction(Erreur $erreur)
    {
        $deleteForm = $this->createDeleteForm($erreur);

        return $this->render('erreur/show.html.twig', array(
            'erreur' => $erreur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing erreur entity.
     *
     * @Route("/{id}/edit", name="erreur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Erreur $erreur)
    {
        $deleteForm = $this->createDeleteForm($erreur);
        $editForm = $this->createForm('AppBundle\Form\ErreurType', $erreur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('erreur_edit', array('id' => $erreur->getId()));
        }

        return $this->render('erreur/edit.html.twig', array(
            'erreur' => $erreur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a erreur entity.
     *
     * @Route("/{id}", name="erreur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Erreur $erreur)
    {
        $form = $this->createDeleteForm($erreur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($erreur);
            $em->flush();
        }

        return $this->redirectToRoute('erreur_index');
    }

    /**
     * Creates a form to delete a erreur entity.
     *
     * @param Erreur $erreur The erreur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Erreur $erreur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('erreur_delete', array('id' => $erreur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
