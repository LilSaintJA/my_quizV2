<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Questions;
use QuizBundle\Form\QuizType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class QuizzController extends Controller
{
    /**
     * @Route("/quizz/{id}", name="quiz")
     * @Method({"GET"})
     */
    public function indexAction(Request $request, $id)
    {
        $quiz = $this->getDoctrine()
            ->getRepository('QuizBundle:Themes')
            ->find($id);

        $ask = $quiz->getQuestion();

        $questions = new Questions();
        $form = $this->createForm(new QuizType($quiz, $ask), $questions);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questions);
            $em->flush();

            return $this->redirectToRoute('quizz_index', array('id' => $questions->getId()));
        }



        return $this->render('QuizBundle:Quizz:index.html.twig', array(
            'quiz' => $quiz,
            'form' => $form->createView(),
            'ask' => $ask
            // ...
        ));
    }

    /**
     * @Route("/list")
     */
    public function listAction()
    {
        return $this->render('QuizBundle:Quizz:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('QuizBundle:Quizz:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/edit")
     */
    public function editAction()
    {
        return $this->render('QuizBundle:Quizz:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction()
    {
        return $this->render('QuizBundle:Quizz:delete.html.twig', array(
            // ...
        ));
    }

}
