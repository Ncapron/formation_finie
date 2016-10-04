<?php

namespace FormationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FormationBundle\Entity\Promotion;
use FormationBundle\Form\PromotionType;

/**
 * Promotion controller.
 *
 */
class PromotionController extends Controller
{
    /**
     * Lists all Promotion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('FormationBundle:Promotion')->findAll();

        return $this->render('FormationBundle:promotion:index.html.twig', array(
            'promotions' => $promotions,
        ));
    }

    /**
     * Creates a new Promotion entity.
     *
     */
    public function newAction(Request $request)
    {
        $promotion = new Promotion();
        $form = $this->createForm('FormationBundle\Form\PromotionType', $promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();

            return $this->redirectToRoute('promotion_show', array('id' => $promotion->getId()));
        }

        return $this->render('FormationBundle:promotion:new.html.twig', array(
            'promotion' => $promotion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Promotion entity.
     *
     */
    public function showAction(Promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);

        return $this->render('FormationBundle:promotion:show.html.twig', array(
            'promotion' => $promotion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Promotion entity.
     *
     */
    public function editAction(Request $request, Promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);
        $editForm = $this->createForm('FormationBundle\Form\PromotionType', $promotion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();

            return $this->redirectToRoute('promotion_edit', array('id' => $promotion->getId()));
        }

        return $this->render('FormationBundle:promotion:edit.html.twig', array(
            'promotion' => $promotion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Promotion entity.
     *
     */
    public function deleteAction(Request $request, Promotion $promotion)
    {
        $form = $this->createDeleteForm($promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($promotion);
            $em->flush();
        }

        return $this->redirectToRoute('promotion_index');
    }

    /**
     * Creates a form to delete a Promotion entity.
     *
     * @param Promotion $promotion The Promotion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Promotion $promotion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('promotion_delete', array('id' => $promotion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
