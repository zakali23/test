<?php

namespace AppBundle\Controller;

use AppBundle\Entity\infoContact;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Infocontact controller.
 *
 * @Route("infocontact")
 */
class infoContactController extends Controller
{
    /**
     * Lists all infoContact entities.
     *
     * @Route("/", name="infocontact_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $infoContacts = $em->getRepository('AppBundle:infoContact')->findAll();

        return $this->render('infocontact/index.html.twig', array(
            'infoContacts' => $infoContacts,
        ));
    }

    /**
     * Lists all infoContact entities.
     *
     * @Route("/notification", name="infocontact_notif")
     * @Method({"GET","POST"})
     */
    public function notificationAction()
    {
        $em = $this->getDoctrine()->getManager();

        if(!empty($_POST)){
            $arrayId=[];
            $arrayId[] = $_POST;



            foreach ($arrayId as $key=>$value){
                foreach ($value as $id) {

                    $em->getRepository('AppBundle:infoContact')->updateNotification($id);
                }
            }

        }
        $notifications = $em->getRepository('AppBundle:infoContact')->findEmailNotRead();
        $numberNotif = count($notifications);



        return $this->render('infocontact/notification.html.twig', array(
            'notifications' => $notifications,
            'numberNotif' =>$numberNotif,

        ));
    }

    /**
     * Lists all infoContact entities.
     *
     * @Route("/notification/number", name="infocontact_number")
     * @Method("GET")
     */
    public function notificationNumberAction(SerializerInterface $serializer)
    {

        $em = $this->getDoctrine()->getManager();

        $notifications = $em->getRepository('AppBundle:infoContact')->findEmailNotRead();
        $numberNotif = count($notifications);

        $data=$serializer->serialize($numberNotif, 'json');
        $response=new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    /**
     * Creates a new infoContact entity.
     *
     * @Route("/new", name="infocontact_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $infoContact = new Infocontact();
        $form = $this->createForm('AppBundle\Form\infoContactType', $infoContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infoContact);
            $em->flush();

            return $this->redirectToRoute('infocontact_show', array('id' => $infoContact->getId()));
        }

        return $this->render('infocontact/new.html.twig', array(
            'infoContact' => $infoContact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a infoContact entity.
     *
     * @Route("/{id}", name="infocontact_show")
     * @Method("GET")
     */
    public function showAction(infoContact $infoContact)
    {
        $deleteForm = $this->createDeleteForm($infoContact);

        return $this->render('infocontact/show.html.twig', array(
            'infoContact' => $infoContact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing infoContact entity.
     *
     * @Route("/{id}/edit", name="infocontact_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, infoContact $infoContact)
    {
        $deleteForm = $this->createDeleteForm($infoContact);
        $editForm = $this->createForm('AppBundle\Form\infoContactType', $infoContact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('infocontact_edit', array('id' => $infoContact->getId()));
        }

        return $this->render('infocontact/edit.html.twig', array(
            'infoContact' => $infoContact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a infoContact entity.
     *
     * @Route("/{id}", name="infocontact_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, infoContact $infoContact)
    {
        $form = $this->createDeleteForm($infoContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infoContact);
            $em->flush();
        }

        return $this->redirectToRoute('infocontact_index');
    }

    /**
     * Creates a form to delete a infoContact entity.
     *
     * @param infoContact $infoContact The infoContact entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(infoContact $infoContact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('infocontact_delete', array('id' => $infoContact->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
