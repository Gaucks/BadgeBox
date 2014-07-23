<?php

namespace BadgeBox\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('name')
                ->add('firstname')
                ->add('description')
                ->add('facebook')
                ->add('twitter')
                ->add('googleplus')
                ->remove('points');
    }

    public function getName()
    {
        return 'fos_user_profile';
    }
}