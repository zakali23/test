<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CoPro;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Copro controller.
 *
 * @Route("copro")
 */
class CoProController extends Controller
{
    /**
     * Lists all coPro entities.
     *
     * @Route("/", name="copro_index")
     *
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coPros = $em->getRepository('AppBundle:CoPro')->findAll();

        return $this->render('copro/index.html.twig', array(
            'coPros' => $coPros,
            'user' => $this->getUser(),
        ));
    }

    /**
     * Creates a new coPro entity.
     *
     * @Route("/new", name="copro_new")
     * @IsGranted("ROLE_ADMIN")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $coPro = new Copro();
        $form = $this->createForm('AppBundle\Form\CoProType', $coPro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coPro);
            $em->flush();

            return $this->redirectToRoute('copro_show', array('id' => $coPro->getId()));
        }

        return $this->render('copro/new.html.twig', array(
            'coPro' => $coPro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coPro entity.
     *
     * @Route("/{id}", name="copro_show")
     * @IsGranted("ROLE_ADMIN")
     * @Method("GET")
     */
    public function showAction(CoPro $coPro)
    {
        $deleteForm = $this->createDeleteForm($coPro);

        return $this->render('copro/show.html.twig', array(
            'coPro' => $coPro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coPro entity.
     *
     * @Route("/{id}/edit", name="copro_edit")
     * @IsGranted("ROLE_ADMIN")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CoPro $coPro)
    {
        $deleteForm = $this->createDeleteForm($coPro);
        $editForm = $this->createForm('AppBundle\Form\CoProType', $coPro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('copro_edit', array('id' => $coPro->getId()));
        }

        return $this->render('copro/edit.html.twig', array(
            'coPro' => $coPro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function listImmeubleAction(CoPro $coPro)
    {
        $em = $this->getDoctrine()->getManager();
        $idcoPro = $coPro->getid();

        $coPros = $em->getRepository('AppBundle:CoPro')->find($idcoPro);
       return $coPros;

    }
    /**
     * Deletes a coPro entity.
     *
     * @Route("/{id}", name="copro_delete")
     * @IsGranted("ROLE_ADMIN")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CoPro $coPro)
    {
        $form = $this->createDeleteForm($coPro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coPro);
            $em->flush();
        }

        return $this->redirectToRoute('copro_index');
    }

    /**
     * Creates a form to delete a coPro entity.
     *
     * @param CoPro $coPro The coPro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CoPro $coPro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('copro_delete', array('id' => $coPro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
