<?php

namespace clubBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class workshopType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null,
                array('label' => 'form.nom', 'translation_domain' => 'clubBundle'))

            ->add('nombreplaces', null,
                array('label' => 'form.nombreplaces', 'translation_domain' => 'clubBundle'))



            ->add('datedebut', null,
                array('label' => 'form.datedebut', 'translation_domain' => 'clubBundle'))




            ->add('datefin', null,
                array('label' => 'form.datefin', 'translation_domain' => 'clubBundle'))


            ->add('discription', null,
                array('label' => 'form.discription', 'translation_domain' => 'clubBundle'))

            ->add('user',EntityType::class
                ,array('class'=>'AppBundle:user','choice_label'=>'username','multiple'=>false),
                array('label' => 'form.user', 'translation_domain' => 'clubBundle'))

            ->add('club',EntityType::class
                ,array('class'=>'clubBundle:club','choice_label'=>'nom','multiple'=>false),
                array('label' => 'form.club', 'translation_domain' => 'clubBundle'));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'clubBundle\Entity\workshop'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clubbundle_workshop';
    }


}
