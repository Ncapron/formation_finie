<?php

namespace FormationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\Eleve;
use FormationBundle\Form\EleveType;

/**
 * Eleve controller.
 *
 */
class EleveController extends Controller
{
    /**
     * Lists all Eleve entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eleves = $em->getRepository('FormationBundle:Eleve')->findAll();

        return $this->render('FormationBundle:eleve:index.html.twig', array(
            'eleves' => $eleves,
        ));
    }

    /**
     * Creates a new Eleve entity.
     *
     */
    public function newAction(Request $request)
    {
        $eleve = new Eleve();
        $form = $this->createForm('FormationBundle\Form\EleveType', $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();

            return $this->redirectToRoute('eleve_show', array('id' => $eleve->getId()));
        }

        return $this->render('FormationBundle:eleve:new.html.twig', array(
            'eleve' => $eleve,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Eleve entity.
     *
     */
    public function showAction(Eleve $eleve)
    {
        $deleteForm = $this->createDeleteForm($eleve);

        return $this->render('FormationBundle:eleve:show.html.twig', array(
            'eleve' => $eleve,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Eleve entity.
     *
     */
    public function editAction(Request $request, Eleve $eleve)
    {
        $deleteForm = $this->createDeleteForm($eleve);
        $editForm = $this->createForm('FormationBundle\Form\EleveType', $eleve);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();

            return $this->redirectToRoute('eleve_edit', array('id' => $eleve->getId()));
        }

        return $this->render('FormationBundle:eleve:edit.html.twig', array(
            'eleve' => $eleve,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Eleve entity.
     *
     */
    public function deleteAction(Request $request, Eleve $eleve)
    {
        $form = $this->createDeleteForm($eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eleve);
            $em->flush();
        }

        return $this->redirectToRoute('eleve_index');
    }

    /**
     * Creates a form to delete a Eleve entity.
     *
     * @param Eleve $eleve The Eleve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Eleve $eleve)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eleve_delete', array('id' => $eleve->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
