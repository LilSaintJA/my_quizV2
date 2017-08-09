<?php

namespace QuizBundle\Form;

use QuizBundle\Entity\Answers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class QuizType
 * Permet de gérer l'affiche du quiz
 * @package QuizBundle\Form
 */
class QuizType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('statement', ChoiceType::class, array(
//                'multiple' => true,
////                'expanded' => true,
//                'attr' => array('class' => 'input-quiz'),
//                'labe
//            ))
            ->add('Save', SubmitType::class, array(
                'label' => 'Envoyer',
                'attr' => array('class' => 'btn btn-quiz')
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answers::class
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_responses';
    }

}