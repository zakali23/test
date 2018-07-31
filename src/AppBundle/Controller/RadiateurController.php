<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Radiateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Radiateur controller.
 *
 * @Route("radiateur")
 */
class RadiateurController extends Controller
{
    /**
     * Lists all radiateur entities.
     *
     * @Route("/", name="radiateur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $radiateurs = $em->getRepository('AppBundle:Radiateur')->findAll();

        return $this->render('radiateur/index.html.twig', array(
            'radiateurs' => $radiateurs,
        ));
    }

    /**
     * Creates a new radiateur entity.
     *
     * @Route("/new", name="radiateur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $radiateur = new Radiateur();
        $form = $this->createForm('AppBundle\Form\RadiateurType', $radiateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($radiateur);
            $em->flush();

        }

        $em = $this->getDoctrine()->getManager();

        $radiateurs = $em->getRepository('AppBundle:Radiateur')->findAll();

        return $this->render('radiateur/new.html.twig', array(
            'radiateur' => $radiateur,
            'form' => $form->createView(),
            'radiateurs' => $radiateurs
        ));
    }

    /**
     * Finds and displays a radiateur entity.
     *
     * @Route("/{id}", name="radiateur_show")
     * @Method("GET")
     */
    public function showAction(Radiateur $radiateur)
    {
        $deleteForm = $this->createDeleteForm($radiateur);

        return $this->render('radiateur/show.html.twig', array(
            'radiateur' => $radiateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing radiateur entity.
     *
     * @Route("/{id}/edit", name="radiateur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Radiateur $radiateur)
    {
        $deleteForm = $this->createDeleteForm($radiateur);
        $editForm = $this->createForm('AppBundle\Form\RadiateurType', $radiateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('radiateur_edit', array('id' => $radiateur->getId()));
        }

        return $this->render('radiateur/edit.html.twig', array(
            'radiateur' => $radiateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a radiateur entity.
     *
     * @Route("/{id}", name="radiateur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Radiateur $radiateur)
    {
        $form = $this->createDeleteForm($radiateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($radiateur);
            $em->flush();
        }

        return $this->redirectToRoute('radiateur_index');
    }



    /**
     * Creates a form to delete a radiateur entity.
     *
     * @param Radiateur $radiateur The radiateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Radiateur $radiateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('radiateur_delete', array('id' => $radiateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
