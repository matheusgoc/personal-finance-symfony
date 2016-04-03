<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Outgoing;
use AppBundle\Form\OutgoingType;

/**
 * Outgoing controller.
 *
 * @Route("/outgoing")
 */
class OutgoingController extends Controller
{
    /**
     * Lists all Outgoing entities.
     *
     * @Route("/", name="outgoing_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $outgoings = $em->getRepository('AppBundle:Outgoing')->findAll();

        return $this->render('outgoing/index.html.twig', array(
            'outgoings' => $outgoings,
        ));
    }

    /**
     * Creates a new Outgoing entity.
     *
     * @Route("/new", name="outgoing_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $outgoing = new Outgoing();
        $form = $this->createForm('AppBundle\Form\OutgoingType', $outgoing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($outgoing);
            $em->flush();

            return $this->redirectToRoute('outgoing_show', array('id' => $outgoing->getId()));
        }

        return $this->render('outgoing/new.html.twig', array(
            'outgoing' => $outgoing,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Outgoing entity.
     *
     * @Route("/{id}", name="outgoing_show")
     * @Method("GET")
     */
    public function showAction(Outgoing $outgoing)
    {
        $deleteForm = $this->createDeleteForm($outgoing);

        return $this->render('outgoing/show.html.twig', array(
            'outgoing' => $outgoing,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Outgoing entity.
     *
     * @Route("/{id}/edit", name="outgoing_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Outgoing $outgoing)
    {
        $deleteForm = $this->createDeleteForm($outgoing);
        $editForm = $this->createForm('AppBundle\Form\OutgoingType', $outgoing);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($outgoing);
            $em->flush();

            return $this->redirectToRoute('outgoing_edit', array('id' => $outgoing->getId()));
        }

        return $this->render('outgoing/edit.html.twig', array(
            'outgoing' => $outgoing,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Outgoing entity.
     *
     * @Route("/{id}", name="outgoing_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Outgoing $outgoing)
    {
        $form = $this->createDeleteForm($outgoing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($outgoing);
            $em->flush();
        }

        return $this->redirectToRoute('outgoing_index');
    }

    /**
     * Creates a form to delete a Outgoing entity.
     *
     * @param Outgoing $outgoing The Outgoing entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Outgoing $outgoing)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('outgoing_delete', array('id' => $outgoing->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
