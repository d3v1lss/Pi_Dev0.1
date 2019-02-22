<?php

namespace clubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class clubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null,
                array('label' => 'form.nom', 'translation_domain' => 'clubBundle'))
            ->add('mail',null,
                array('label' => 'form.mail', 'translation_domain' => 'clubBundle'))


            ->add('discription',null,
                array('label' => 'form.discription', 'translation_domain' => 'clubBundle'))

            ->add('activite',null,
                array('label' => 'form.activite', 'translation_domain' => 'clubBundle'))

            ->add('president',null,
                array('label' => 'form.president', 'translation_domain' => 'clubBundle'))


        ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'clubBundle\Entity\club'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clubbundle_club';
    }


}
