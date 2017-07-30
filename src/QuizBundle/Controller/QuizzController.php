<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Responses;
use QuizBundle\Entity\Themes;
use QuizBundle\Form\ResponsesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class QuizzController extends Controller
{
    /**
     * @Route("/quizz/{id}", name="quiz")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, $id)
    {

        $quiz = $this->getDoctrine()
            ->getRepository(Themes::class)
            ->find($id);

        $ask = $quiz->getQuestion();

        $reponses = new Responses();
        $form = $this->createForm(ResponsesType::class, $reponses);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                return $this->redirectToRoute('quiz_correction');
            }
        }

        return $this->render('QuizBundle:Quizz:index.html.twig', array(
            'quiz' => $quiz,
            'form' => $form->createView(),
            'ask' => $ask
        ));
    }


    /**
     * @Route("/quiz/{id}", name="quiz_correction")
     * @Method({"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function correctionAction(Request $request, $id) {

//        $repository = $this->getDoctrine()
//            ->getRepository(Themes::class);
//
//        $answer = $repository->findBy(
//            array('id' => $id),
//            array('nom' => 'ASC')
//        );

        $quiz = $this->getDoctrine()
            ->getRepository(Themes::class)
            ->find($id);


        $ask = $quiz->getQuestion();

        $reponseUser = $request->request->all();

        return $this->render('QuizBundle:Quizz:correction.html.twig', array(
            'quiz' => $quiz,
            'ask' => $ask,
            'reponseUser' => $reponseUser
        ));
    }

    /**
     * @Route("/list", name="quizz_list")
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
