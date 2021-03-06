<?php

namespace AppBundle\Controller;

use AppBundle\Entity\contact;
use AppBundle\Entity\infoContact;
use AppBundle\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contact controller.
 *
 * @Route("contact")
 */
class contactController extends Controller
{
    /**
     * Lists all contact entities.
     *
     * @Route("/list", name="contact_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AppBundle:contact')->findAll();

        return $this->render('contact/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new contact entity.
     *
     * @Route("/", name="contact_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request,Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm('AppBundle\Form\contactType', $contact);
        $form->handleRequest($request);
        $activeContact = true;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            if(!$em){

            }else{
                $message = (new \Swift_Message('Demande de devis'))
                    ->setFrom('caldex67@gmail.com')
                    ->setTo($contact->getEmailContact())
                    ->addTo($contact->getEmailSyndic())
                    ->setBody($contact->getMessage());
                $this->get('mailer')->send($message);

                // Passenger mail
                $message = (new \Swift_Message('Réservation Flyaround'))
                    ->setFrom('reservations@flyaround.com')
                    ->setTo('caldex67@gmail.com')
                    ->setBody('Votre réservation est enregistrée.<br/>Merci de voyager avec Flyaround', 'text/html');
                $this->get('mailer')->send($message);

            }

            return $this->redirectToRoute('contact_new');
        }


        $infoContact = new Infocontact();
        $formInfo = $this->createForm('AppBundle\Form\infoContactType', $infoContact);
        $formInfo->handleRequest($request);


        if ($formInfo->isSubmitted() && $formInfo->isValid()) {
            $em1 = $this->getDoctrine()->getManager();
            $em1->persist($infoContact);
            $em1->flush();

            if(!$em1){
            }else {
                $mailer->sendEmail($infoContact->getNomInfo(),$infoContact->getPrenomInfo(),$infoContact->getTelephoneInfo(),$infoContact->getEmailInfo(),$infoContact->getAdresseInfo(),$infoContact->getMessageInfo());

                $request->getSession()->getFlashBag()->add('success', 'Votre message a bien été envoyé !')
                ;

                $url = $this->generateUrl('contact_new');

                return $this->redirect($url);
            }


        }
        return $this->render('contact/contact.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView(),
            'activeContact' => $activeContact,
            'infoContact'=>$infoContact,
            'formInfo'=>$formInfo->createView()

        ));
    }

    /**
     * Finds and displays a contact entity.
     *
     * @Route("/{id}", name="contact_show")
     * @Method("GET")
     */
    public function showAction(contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);

        return $this->render('contact/show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contact entity.
     *
     * @Route("/{id}/edit", name="contact_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);
        $editForm = $this->createForm('AppBundle\Form\contactType', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contact_edit', array('id' => $contact->getId()));
        }

        return $this->render('contact/edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contact entity.
     *
     * @Route("/{id}", name="contact_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, contact $contact)
    {
        $form = $this->createDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contact_index');
    }



    /**
     * Creates a form to delete a contact entity.
     *
     * @param contact $contact The contact entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(contact $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_delete', array('id' => $contact->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
