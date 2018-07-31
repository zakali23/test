<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bridget;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bridget controller.
 *
 * @Route("bridget")
 */
class BridgetController extends Controller
{
    /**
     * Lists all bridget entities.
     *
     * @Route("/", name="bridget_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bridgets = $em->getRepository('AppBundle:Bridget')->findAll();

        return $this->render('bridget/index.html.twig', array(
            'bridgets' => $bridgets,
        ));
    }

    /**
     * Creates a new bridget entity.
     *
     * @Route("/new", name="bridget_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bridget = new Bridget();
        $form = $this->createForm('AppBundle\Form\BridgetType', $bridget);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bridget);
            $em->flush();

            return $this->redirectToRoute('bridget_show', array('id' => $bridget->getId()));
        }

        return $this->render('bridget/new.html.twig', array(
            'bridget' => $bridget,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bridget entity.
     *
     * @Route("/{id}", name="bridget_show")
     * @Method("GET")
     */
    public function showAction(Bridget $bridget)
    {
        $deleteForm = $this->createDeleteForm($bridget);

        return $this->render('bridget/show.html.twig', array(
            'bridget' => $bridget,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bridget entity.
     *
     * @Route("/{id}/edit", name="bridget_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bridget $bridget)
    {
        $deleteForm = $this->createDeleteForm($bridget);
        $editForm = $this->createForm('AppBundle\Form\BridgetType', $bridget);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bridget_edit', array('id' => $bridget->getId()));
        }

        return $this->render('bridget/edit.html.twig', array(
            'bridget' => $bridget,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bridget entity.
     *
     * @Route("/{id}", name="bridget_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bridget $bridget)
    {
        $form = $this->createDeleteForm($bridget);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bridget);
            $em->flush();
        }

        return $this->redirectToRoute('bridget_index');
    }

    /**
     * Creates a form to delete a bridget entity.
     *
     * @param Bridget $bridget The bridget entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bridget $bridget)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bridget_delete', array('id' => $bridget->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
