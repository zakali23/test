<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mesure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mesure controller.
 *
 * @Route("mesure")
 */
class MesureController extends Controller
{
    /**
     * Lists all mesure entities.
     *
     * @Route("/", name="mesure_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mesures = $em->getRepository('AppBundle:Mesure')->findAll();

        return $this->render('mesure/index.html.twig', array(
            'mesures' => $mesures,
        ));
    }

    /**
     * Creates a new mesure entity.
     *
     * @Route("/new", name="mesure_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mesure = new Mesure();
        $form = $this->createForm('AppBundle\Form\MesureType', $mesure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mesure);
            $em->flush();

            return $this->redirectToRoute('mesure_show', array('id' => $mesure->getId()));
        }

        return $this->render('mesure/new.html.twig', array(
            'mesure' => $mesure,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mesure entity.
     *
     * @Route("/{id}", name="mesure_show")
     * @Method("GET")
     */
    public function showAction(Mesure $mesure)
    {
        $deleteForm = $this->createDeleteForm($mesure);

        return $this->render('mesure/show.html.twig', array(
            'mesure' => $mesure,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mesure entity.
     *
     * @Route("/{id}/edit", name="mesure_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Mesure $mesure)
    {
        $deleteForm = $this->createDeleteForm($mesure);
        $editForm = $this->createForm('AppBundle\Form\MesureType', $mesure);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mesure_edit', array('id' => $mesure->getId()));
        }

        return $this->render('mesure/edit.html.twig', array(
            'mesure' => $mesure,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mesure entity.
     *
     * @Route("/{id}", name="mesure_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Mesure $mesure)
    {
        $form = $this->createDeleteForm($mesure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mesure);
            $em->flush();
        }

        return $this->redirectToRoute('mesure_index');
    }

    /**
     * Creates a form to delete a mesure entity.
     *
     * @param Mesure $mesure The mesure entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mesure $mesure)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mesure_delete', array('id' => $mesure->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
