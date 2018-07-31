<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Compteur;
use AppBundle\Entity\Immeuble;
use AppBundle\Entity\TypeCompteur;
use AppBundle\Repository\ImmeubleRepository;
use AppBundle\Entity\Radiateur;
use AppBundle\Repository\RadiateurRepository;
use AppBundle\Entity\Lot;
use AppBundle\Repository\LotRepository;
use AppBundle\Entity\Piece;
use AppBundle\Repository\PieceRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Compteur controller.
 *
 * @Route("compteur")
 */
class CompteurController extends Controller
{
    /**
     * Lists all compteur entities.
     *
     * @Route("/", name="compteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compteurs = $em->getRepository('AppBundle:Compteur')->findAll();

        return $this->render('compteur/index.html.twig', array(
            'compteurs' => $compteurs,
        ));
    }

    /**
     * Lists all compteur entities.
     *
     * @Route("/installation", name="compteur_installation")
     * @Method("GET")
     */

    public function installationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compteurs = $em->getRepository('AppBundle:Compteur')->findByNoInstalled();

        return $this->render('compteur/installation.html.twig', array(
            'compteurs' => $compteurs,
        ));
    }

    /**
     * Creates a new compteur entity.
     *
     * @Route("/new", name="compteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $compteur = new Compteur();
        $form = $this->createForm('AppBundle\Form\CompteurNewType', $compteur);
        $form->handleRequest($request);
        dump($form);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compteur);
            $em->flush();

            return $this->redirectToRoute('compteur_show', array('id' => $compteur->getId()));
        }

        return $this->render('compteur/new.html.twig', array(
            'compteur' => $compteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a compteur entity.
     *
     * @Route("/{id}", name="compteur_show")
     * @Method("GET")
     */
    public function showAction(Compteur $compteur)
    {
        $deleteForm = $this->createDeleteForm($compteur);

        return $this->render('compteur/show.html.twig', array(
            'compteur' => $compteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing compteur entity.
     *
     * @Route("/{id}/edit", name="compteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Compteur $compteur)
    {
        $deleteForm = $this->createDeleteForm($compteur);
        $editForm = $this->createForm('AppBundle\Form\CompteurType', $compteur);
        $editForm->handleRequest($request);


        $radiateur = new Radiateur();
        $form = $this->createForm('AppBundle\Form\RadiateurType', $radiateur);
        $form->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('compteur_edit', array('id' => $compteur->getId()));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $radiateur->setCalorimetre($compteur);
            $em->persist($radiateur);
            $em->flush();

        }


        $em = $this->getDoctrine()->getManager();
        $immeubles = $em->getRepository('AppBundle:Immeuble')->findAll();
        $em = $this->getDoctrine()->getManager();
        $radiateurs = $em->getRepository('AppBundle:Radiateur')->findRadiateurBycalorimetre($compteur->getId());

        return $this->render('compteur/edit.html.twig', array(
            'compteur' => $compteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'immeubles' => $immeubles,
            'radiateur' => $radiateur,
            'form' => $form->createView(),
            'radiateurs' => $radiateurs
        ));


    }

    /**
     * Deletes a compteur entity.
     *
     * @Route("/{id}", name="compteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Compteur $compteur)
    {
        $form = $this->createDeleteForm($compteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($compteur);
            $em->flush();
        }

        return $this->redirectToRoute('compteur_index');
    }

    /**
     * @Route("/search/{adresse}", name="ajaxRechercheAction")
     *
     */
    public function ajaxRechercheAction($adresse, SerializerInterface $serializer){

        $em=$this->getDoctrine()->getManager();
        $immeubles=$em->getRepository('AppBundle:Immeuble')->findImmeublesByAdresse($adresse);
        $data=$serializer->serialize($immeubles, 'json');

        $response=new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/find/{id}", name="ajaxIdAction")
     *
     */
    public function ajaxIdAction($id, SerializerInterface $serializer){

        $em=$this->getDoctrine()->getManager();
        $lots=$em->getRepository('AppBundle:Lot')->findLotsById($id);
        $data=$serializer->serialize($lots, 'json');
        $response=new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/findPiece/{id}", name="ajaxFindPieceAction")
     *
     */
    public function ajaxFindPieceAction($id, SerializerInterface $serializer){

        $em=$this->getDoctrine()->getManager();
        $pieces=$em->getRepository('AppBundle:Piece')->findPiecesById($id);
        $data=$serializer->serialize($pieces, 'json');
        $response=new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/compteurSubmit", name="compteurSubmit")
     * @Method({"POST"})
     *
     */
    public function getPostPiece(){
      //  if(!empty($_POST)) {dump($_POST['idCompteur']);dump($_POST['idPiece']);}
        if(empty($_POST)){

            $this->addFlash("error", "Saisie Incorrecte");

        }
        $id=$_POST['idCompteur'];
        $idPiece=$_POST['idPiece'];
        $em=$this->getDoctrine()->getManager();
        $compteur = $em->getRepository('AppBundle:Compteur')->findOneBy(['id'=>$id]);
        $piece = $em->getRepository('AppBundle:Piece')->findOneBy(['id'=>$idPiece]);
        $compteur->setCompteur($piece);
        $em->persist($compteur);
        $em->flush();


        return $this->redirectToRoute('compteur_index');

    }





    /**
     * Creates a form to delete a compteur entity.
     *
     * @param Compteur $compteur The compteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Compteur $compteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compteur_delete', array('id' => $compteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
