<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/category/", name="category_index")
     */
    public function indexAction()
    {
        return $this->render('QuizBundle:Category:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/category/{id}", name="category_list")
     * @Method({"GET"})
     */
    public function listAction($id) {
        $category = $this->getDoctrine()
            ->getRepository('QuizBundle:Category')
            ->find($id);

        return $this->render('QuizBundle:Category:list.html.twig', array(
            'category' => $category
        ));
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('QuizBundle:Category:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction()
    {
        return $this->render('QuizBundle:Category:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/edit")
     */
    public function editAction()
    {
        return $this->render('QuizBundle:Category:edit.html.twig', array(
            // ...
        ));
    }

}
