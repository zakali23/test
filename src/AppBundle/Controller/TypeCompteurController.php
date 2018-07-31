<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeCompteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typecompteur controller.
 *
 * @Route("typecompteur")
 */
class TypeCompteurController extends Controller
{
    /**
     * Lists all typeCompteur entities.
     *
     * @Route("/", name="typecompteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeCompteurs = $em->getRepository('AppBundle:TypeCompteur')->findAll();

        return $this->render('typecompteur/index.html.twig', array(
            'typeCompteurs' => $typeCompteurs,
        ));
    }

    /**
     * Creates a new typeCompteur entity.
     *
     * @Route("/new", name="typecompteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeCompteur = new Typecompteur();
        $form = $this->createForm('AppBundle\Form\TypeCompteurType', $typeCompteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeCompteur);
            $em->flush();

            return $this->redirectToRoute('typecompteur_show', array('id' => $typeCompteur->getId()));
        }

        return $this->render('typecompteur/new.html.twig', array(
            'typeCompteur' => $typeCompteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeCompteur entity.
     *
     * @Route("/{id}", name="typecompteur_show")
     * @Method("GET")
     */
    public function showAction(TypeCompteur $typeCompteur)
    {
        $deleteForm = $this->createDeleteForm($typeCompteur);

        return $this->render('typecompteur/show.html.twig', array(
            'typeCompteur' => $typeCompteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeCompteur entity.
     *
     * @Route("/{id}/edit", name="typecompteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeCompteur $typeCompteur)
    {
        $deleteForm = $this->createDeleteForm($typeCompteur);
        $editForm = $this->createForm('AppBundle\Form\TypeCompteurType', $typeCompteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typecompteur_edit', array('id' => $typeCompteur->getId()));
        }

        return $this->render('typecompteur/edit.html.twig', array(
            'typeCompteur' => $typeCompteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeCompteur entity.
     *
     * @Route("/{id}", name="typecompteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeCompteur $typeCompteur)
    {
        $form = $this->createDeleteForm($typeCompteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeCompteur);
            $em->flush();
        }

        return $this->redirectToRoute('typecompteur_index');
    }

    /**
     * Creates a form to delete a typeCompteur entity.
     *
     * @param TypeCompteur $typeCompteur The typeCompteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeCompteur $typeCompteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typecompteur_delete', array('id' => $typeCompteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
