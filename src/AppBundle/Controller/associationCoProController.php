<?php

namespace AppBundle\Controller;

use AppBundle\Entity\associationCoPro;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Associationcopro controller.
 *
 * @Route("associationcopro")
 */
class associationCoProController extends Controller
{
    /**
     * Lists all associationCoPro entities.
     *
     * @Route("/", name="associationcopro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $associationCoPros = $em->getRepository('AppBundle:associationCoPro')->findAll();

        return $this->render('associationcopro/index.html.twig', array(
            'associationCoPros' => $associationCoPros,
            'user' => $this->getUser(),
        ));
    }

    /**
     * Creates a new associationCoPro entity.
     *
     * @Route("/new", name="associationcopro_new")
     * @IsGranted("ROLE_ADMIN")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $associationCoPro = new Associationcopro();
        $form = $this->createForm('AppBundle\Form\associationCoProType', $associationCoPro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($associationCoPro);
            $em->flush();

            return $this->redirectToRoute('associationcopro_show', array('id' => $associationCoPro->getId()));
        }

        return $this->render('associationcopro/new.html.twig', array(
            'associationCoPro' => $associationCoPro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a associationCoPro entity.
     *
     * @Route("/{id}", name="associationcopro_show")
     * @IsGranted("ROLE_ADMIN")
     * @Method("GET")
     */
    public function showAction(associationCoPro $associationCoPro)
    {
        $deleteForm = $this->createDeleteForm($associationCoPro);

        return $this->render('associationcopro/show.html.twig', array(
            'associationCoPro' => $associationCoPro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing associationCoPro entity.
     *
     * @Route("/{id}/edit", name="associationcopro_edit")
     * @IsGranted("ROLE_ADMIN")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, associationCoPro $associationCoPro)
    {
        $deleteForm = $this->createDeleteForm($associationCoPro);
        $editForm = $this->createForm('AppBundle\Form\associationCoProType', $associationCoPro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('associationcopro_edit', array('id' => $associationCoPro->getId()));
        }

        return $this->render('associationcopro/edit.html.twig', array(
            'associationCoPro' => $associationCoPro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a associationCoPro entity.
     *
     * @Route("/{id}", name="associationcopro_delete")
     * @IsGranted("ROLE_ADMIN")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, associationCoPro $associationCoPro)
    {
        $form = $this->createDeleteForm($associationCoPro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($associationCoPro);
            $em->flush();
        }

        return $this->redirectToRoute('associationcopro_index');
    }

    /**
     * Creates a form to delete a associationCoPro entity.
     *
     * @param associationCoPro $associationCoPro The associationCoPro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(associationCoPro $associationCoPro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('associationcopro_delete', array('id' => $associationCoPro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
