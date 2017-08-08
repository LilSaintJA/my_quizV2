<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Questions;
use QuizBundle\Entity\Themes;
use QuizBundle\Form\QuestionsType;
use QuizBundle\Form\ThemesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ThemesController extends Controller
{
    /**
     * @Route("/themes")
     */
    public function indexAction()
    {
        return $this->render('QuizBundle:Themes:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/themes/{id}", name="theme_list")
     */
    public function listAction($id)
    {

        $theme = $this->getDoctrine()
            ->getRepository('QuizBundle:Themes')
            ->find($id);

        return $this->render('QuizBundle:Themes:list.html.twig', array(
            'theme' => $theme
            // ...
        ));
    }

    /**
     * @Route("/themes/add/", name="theme_add")
     */
    public function addAction()
    {
        $theme = new Themes();
        $form = $this->createForm(ThemesType::class, $theme);
        return $this->render('QuizBundle:Themes:addQuestion.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/edit")
     */
    public function editAction()
    {
        return $this->render('QuizBundle:Themes:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction()
    {
        return $this->render('QuizBundle:Themes:delete.html.twig', array(
            // ...
        ));
    }

}
