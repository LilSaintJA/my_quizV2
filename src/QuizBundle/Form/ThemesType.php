<?php

namespace QuizBundle\Form;


use Doctrine\ORM\EntityRepository;
use QuizBundle\Entity\Themes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThemesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'required' => true,
                'label' => 'Nom du Quiz'
            ))
            ->add('category', null, array(
                'required' => true,
                'label' => 'La Category du Quiz',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name');
                }
            ))
            ->add('SaveAndAddAsk', SubmitType::class, array(
                'label' => 'Ajouter les questions',
                'attr' => array('class' => 'btn btn-quiz')
            ))
            ->add('saveAndAddTheme', SubmitType::class, array(
                'label' => 'Ajouter un autre théme',
                'attr' => array('class' => 'btn btn-quiz')
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Themes::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_themes';
    }


}
