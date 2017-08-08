<?php

namespace QuizBundle\Form;

use QuizBundle\Entity\Questions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('statement', null, array(
                'required' => true,
                'label' => 'Question'
            ))
            ->add('SaveAndAddAsk', SubmitType::class, array(
                'label' => 'Ajouter une autre question',
                'attr' => array('class' => 'btn btn-quiz ')
            ))
            ->add('SaveAndAnswers', SubmitType::class, array(
                'label' => 'Ajouter les réponses',
                'attr' => array('class' => 'btn btn-quiz')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Questions::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_questions';
    }


}
