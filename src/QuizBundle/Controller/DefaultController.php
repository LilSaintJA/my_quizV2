<?php

namespace QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $cat = $this->getDoctrine()->getManager();
        $categories = $cat->getRepository('QuizBundle:Categories')->findAll();
        return $this->render('QuizBundle:Default:index.html.twig', array('categories' => $categories));
    }
}
