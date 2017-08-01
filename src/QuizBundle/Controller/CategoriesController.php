<?php

namespace QuizBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoriesController extends Controller
{
    /**
     * @Route("/category/", name="category_index")
     */
    public function indexAction()
    {
        return $this->render('QuizBundle:Categories:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/category/{id}", name="category_list")
     * @Method({"GET"})
     */
    public function listAction($id) {
        $category = $this->getDoctrine()
            ->getRepository('QuizBundle:Categories')
            ->find($id);

        $theme = $category->getTheme();

        return $this->render('QuizBundle:Categories:list.html.twig', array(
            'category' => $category,
            'theme' => $theme
        ));
    }

    /**
     * @Route("/categories/add")
     */
    public function addAction()
    {
        return $this->render('QuizBundle:Categories:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction()
    {
        return $this->render('QuizBundle:Categories:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/edit")
     */
    public function editAction()
    {
        return $this->render('QuizBundle:Categories:edit.html.twig', array(
            // ...
        ));
    }

}
