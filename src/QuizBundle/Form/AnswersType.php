<?php

namespace QuizBundle\Form;

use QuizBundle\Entity\Answers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('statement', null, array(
                'required' => true,
                'label' => 'Réponse'
            ))
//            ->add('idQuestion')
            ->add('status', CheckboxType::class, array(
                'required' => false,
                'label' => 'Bonne réponse'
            ))
//            ->add('question')
            ->add('SaveAndAdd', SubmitType::class, array(
                'label' => 'Ajouter une autre réponse',
                'attr' => array('class' => 'btn btn-quiz')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Answers::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_responses';
    }


}
