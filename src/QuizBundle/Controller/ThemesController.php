<?php

namespace QuizBundle\Controller;

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
     * @Method({"GET"})
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
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('QuizBundle:Themes:add.html.twig', array(
            // ...
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
