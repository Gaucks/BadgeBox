<?php

namespace BadgeBox\BadgeBoxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChallengeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->remove('date')
            ->remove('ipadress')
            ->remove('user')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BadgeBox\BadgeBoxBundle\Entity\Challenge'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'badgebox_badgeboxbundle_challenge';
    }
}
