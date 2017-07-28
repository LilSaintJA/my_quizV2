<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Responses;
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
            ->getRepository('QuizBundle:Themes')
            ->find($id);

        $reponse = $this->getDoctrine()
            ->getRepository('QuizBundle:Responses')
            ->getAllByIdQuestions($id);

        $ask = $quiz->getQuestion();

        $reponses = new Responses();
        $form = $this->createForm(new ResponsesType(), $reponses);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

//            $test = $form->getData();

            // Récupérer le status par un input hidden
            // Vérifier que le input hidden est égale à 1 = good_answer, sinon = bad_answer
            $test = $request->request->all();

//            var_dump($test);

            foreach ($test as $tests => $id) {
                $q = $this->getDoctrine()
                    ->getRepository('QuizBundle:Responses')
                    ->findById($id);

                foreach ($q as $status => $value) {
//                    $tab = count($value);
//                    echo $tab;
                    foreach ($value as $stat) {
//                        var_dump($value);
                        if ($stat === 1) {
                            var_dump($value);
                            echo 'Bonne réponse' . "<br />";
                        } else {
                            var_dump($value) . "\n";
                            echo 'Mauvaise réponse' . "<br />";
                        }
                    }
                }
            }

//                return $this->redirectToRoute('quizz_index', array('id' => $reponse->getId()));
        }

        return $this->render('QuizBundle:Quizz:index.html.twig', array(
            'quiz' => $quiz,
            'form' => $form->createView(),
            'ask' => $ask,
            'reponse' => $reponse
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

    /**
     * @Route("/quizz", name="quiz_correction")
     * @Method({"POST"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function correctionAction(Request $request) {

        $em = $this->getDoctrine()
            ->getManager();

        $reponses = new Responses();
        $form = $this->createForm(new ResponsesType(), $reponses);


        return $this->render('QuizBundle:Quizz:correction.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
