<?php

namespace FormationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\Langage;
use FormationBundle\Form\LangageType;

/**
 * Langage controller.
 *
 */
class LangageController extends Controller
{
    /**
     * Lists all Langage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $langages = $em->getRepository('FormationBundle:Langage')->findAll();

        return $this->render('FormationBundle:langage:index.html.twig', array(
            'langages' => $langages,
        ));
    }

    /**
     * Creates a new Langage entity.
     *
     */
    public function newAction(Request $request)
    {
        $langage = new Langage();
        $form = $this->createForm('FormationBundle\Form\LangageType', $langage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($langage);
            $em->flush();

            return $this->redirectToRoute('langage_show', array('id' => $langage->getId()));
        }

        return $this->render('FormationBundle:langage:new.html.twig', array(
            'langage' => $langage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Langage entity.
     *
     */
    public function showAction(Langage $langage)
    {
        $deleteForm = $this->createDeleteForm($langage);

        return $this->render('FormationBundle:langage:show.html.twig', array(
            'langage' => $langage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Langage entity.
     *
     */
    public function editAction(Request $request, Langage $langage)
    {
        $deleteForm = $this->createDeleteForm($langage);
        $editForm = $this->createForm('FormationBundle\Form\LangageType', $langage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($langage);
            $em->flush();

            return $this->redirectToRoute('langage_edit', array('id' => $langage->getId()));
        }

        return $this->render('FormationBundle:langage:edit.html.twig', array(
            'langage' => $langage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Langage entity.
     *
     */
    public function deleteAction(Request $request, Langage $langage)
    {
        $form = $this->createDeleteForm($langage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($langage);
            $em->flush();
        }

        return $this->redirectToRoute('langage_index');
    }

    /**
     * Creates a form to delete a Langage entity.
     *
     * @param Langage $langage The Langage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Langage $langage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('langage_delete', array('id' => $langage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
