<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Orcamento;
use AppBundle\Form\OrcamentoType;

/**
 * Orcamento controller.
 *
 * @Route("/orcamento")
 */
class OrcamentoController extends Controller
{
    /**
     * Lists all Orcamento entities.
     *
     * @Route("/", name="orcamento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orcamentos = $em->getRepository('AppBundle:Orcamento')->findAll();

        return $this->render('orcamento/index.html.twig', array(
            'orcamentos' => $orcamentos,
        ));
    }

    /**
     * Creates a new Orcamento entity.
     *
     * @Route("/new", name="orcamento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $orcamento = new Orcamento();
        $form = $this->createForm('AppBundle\Form\OrcamentoType', $orcamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orcamento);
            $em->flush();

            return $this->redirectToRoute('orcamento_show', array('id' => $orcamento->getId()));
        }

        return $this->render('orcamento/new.html.twig', array(
            'orcamento' => $orcamento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Orcamento entity.
     *
     * @Route("/{id}", name="orcamento_show")
     * @Method("GET")
     */
    public function showAction(Orcamento $orcamento)
    {
        $deleteForm = $this->createDeleteForm($orcamento);

        return $this->render('orcamento/show.html.twig', array(
            'orcamento' => $orcamento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * send by email a Orcamento entity.
     *
     * @Route("/{id}/send", name="orcamento_send")
     * @Method("GET")
     */
    public function sendAction(Orcamento $orcamento)
    {
        
    
        return $this->render('orcamento/show.html.twig', array(
            'orcamento' => $orcamento,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Displays a form to edit an existing Orcamento entity.
     *
     * @Route("/{id}/edit", name="orcamento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Orcamento $orcamento)
    {
        $deleteForm = $this->createDeleteForm($orcamento);
        $editForm = $this->createForm('AppBundle\Form\OrcamentoType', $orcamento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orcamento);
            $em->flush();

            return $this->redirectToRoute('orcamento_edit', array('id' => $orcamento->getId()));
        }

        return $this->render('orcamento/edit.html.twig', array(
            'orcamento' => $orcamento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Orcamento entity.
     *
     * @Route("/{id}", name="orcamento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Orcamento $orcamento)
    {
        $form = $this->createDeleteForm($orcamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($orcamento);
            $em->flush();
        }

        return $this->redirectToRoute('orcamento_index');
    }

    /**
     * Creates a form to delete a Orcamento entity.
     *
     * @param Orcamento $orcamento The Orcamento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Orcamento $orcamento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orcamento_delete', array('id' => $orcamento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
