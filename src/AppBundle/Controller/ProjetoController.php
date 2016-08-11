<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Projeto;
use AppBundle\Form\ProjetoType;

/**
 * Projeto controller.
 *
 * @Route("/projeto")
 */
class ProjetoController extends Controller
{
    /**
     * Lists all Projeto entities.
     *
     * @Route("/", name="projeto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projetos = $em->getRepository('AppBundle:Projeto')->findAll();

        return $this->render('projeto/index.html.twig', array(
            'projetos' => $projetos,
        ));
    }

    /**
     * Creates a new Projeto entity.
     *
     * @Route("/new", name="projeto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projeto = new Projeto();
        $form = $this->createForm('AppBundle\Form\ProjetoType', $projeto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projeto);
            $em->flush();

            return $this->redirectToRoute('projeto_show', array('id' => $projeto->getId()));
        }

        return $this->render('projeto/new.html.twig', array(
            'projeto' => $projeto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Projeto entity.
     *
     * @Route("/{id}", name="projeto_show")
     * @Method("GET")
     */
    public function showAction(Projeto $projeto)
    {
        $deleteForm = $this->createDeleteForm($projeto);

        return $this->render('projeto/show.html.twig', array(
            'projeto' => $projeto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Projeto entity.
     *
     * @Route("/{id}/edit", name="projeto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Projeto $projeto)
    {
        $deleteForm = $this->createDeleteForm($projeto);
        $editForm = $this->createForm('AppBundle\Form\ProjetoType', $projeto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projeto);
            $em->flush();

            return $this->redirectToRoute('projeto_edit', array('id' => $projeto->getId()));
        }

        return $this->render('projeto/edit.html.twig', array(
            'projeto' => $projeto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Projeto entity.
     *
     * @Route("/{id}", name="projeto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Projeto $projeto)
    {
        $form = $this->createDeleteForm($projeto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projeto);
            $em->flush();
        }

        return $this->redirectToRoute('projeto_index');
    }

    /**
     * Creates a form to delete a Projeto entity.
     *
     * @param Projeto $projeto The Projeto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Projeto $projeto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projeto_delete', array('id' => $projeto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
