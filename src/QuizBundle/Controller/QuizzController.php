<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Answers;
use QuizBundle\Entity\Questions;
use QuizBundle\Entity\Themes;
use QuizBundle\Form\QuestionsType;
use QuizBundle\Form\AnswersType;
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

        $reponses = new Answers();
        $form = $this->createForm(AnswersType::class, $reponses);

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
     * @Route("/quiz/addQuestion/", name="add_question")
     */
    public function addQuestionAction()
    {
        $question = new Questions();
        $form= $this->createForm(QuestionsType::class, $question);
        return $this->render('QuizBundle:Quizz:addQuestion.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/quiz/addAnswers/", name="add_answers")
     */
    public function addAnswersAction()
    {
        $answers = new Answers();
        $form = $this->createForm(AnswersType::class, $answers);
        return $this->render('QuizBundle:Quizz:addAnswers.html.twig', array(
            'form' => $form->createView(),
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
