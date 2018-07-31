<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Immeuble;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
/**
 * Immeuble controller.
 *
 * @Route("immeuble")
 */
class ImmeubleController extends Controller
{
    /**
     * Lists all immeuble entities.
     *
     * @Route("/", name="immeuble_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $immeubles = $em->getRepository('AppBundle:Immeuble')->findAll();
        return $this->render('immeuble/index.html.twig', array(
            'immeubles' => $immeubles,
        ));
    }
    /**
     * Creates a new immeuble entity.
     *
     * @Route("/new", name="immeuble_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $immeuble = new Immeuble();
        $form = $this->createForm('AppBundle\Form\ImmeubleType', $immeuble);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($immeuble);
            $em->flush();
        }
        $em = $this->getDoctrine()->getManager();
        $immeubles = $em->getRepository('AppBundle:Immeuble')->findAll();
        return $this->render('immeuble/new.html.twig', array(
            'immeuble' => $immeuble,
            'form' => $form->createView(),
            'immeubles' => $immeubles,
        ));
    }
    /**
     * Finds and displays a immeuble entity.
     *
     * @Route("/{id}", name="immeuble_show")
     * @Method("GET")
     */
    public function showAction(Immeuble $immeuble)
    {
        $deleteForm = $this->createDeleteForm($immeuble);
        return $this->render('immeuble/show.html.twig', array(
            'immeuble' => $immeuble,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing immeuble entity.
     *
     * @Route("/{id}/edit", name="immeuble_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Immeuble $immeuble)
    {
        $deleteForm = $this->createDeleteForm($immeuble);
        $editForm = $this->createForm('AppBundle\Form\ImmeubleType', $immeuble);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('immeuble_edit', array('id' => $immeuble->getId()));
        }
        return $this->render('immeuble/edit.html.twig', array(
            'immeuble' => $immeuble,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a immeuble entity.
     *
     * @Route("/{id}", name="immeuble_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Immeuble $immeuble)
    {
        $form = $this->createDeleteForm($immeuble);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($immeuble);
            $em->flush();
        }
        return $this->redirectToRoute('immeuble_index');
    }
    /**
     * Creates a form to delete a immeuble entity.
     *
     * @param Immeuble $immeuble The immeuble entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Immeuble $immeuble)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('immeuble_delete', array('id' => $immeuble->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

