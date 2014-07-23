<?php

namespace BadgeBox\BadgeBoxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content','textarea', array('label' => FALSE, 'attr' => array('class' => 'profil-post',
                                                                            'placeholder' => 'Ecrire un nouveau message')))
            ->remove('date')
            ->remove('user')
            ->remove('ipadress')
            ->remove('title')
            ->remove('type');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BadgeBox\BadgeBoxBundle\Entity\Post'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'badgebox_badgeboxbundle_post';
    }
}
