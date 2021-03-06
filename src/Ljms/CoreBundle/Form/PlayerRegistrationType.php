<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class PlayerRegistrationType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jersey_name','text',array(

            ))
            ->add('jersey_number','number',array(

                'invalid_message'=>'The field Jersey Number must contain only numbers.',
            ))
            ->add('shirt_type','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformGroup',
                'property' => 'name',
                'empty_value' => 'Select One',

            ))
            ->add('short_type','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformGroup',
                'property' => 'name',
                'empty_value' => 'Select One',

            ))
            ->add('shirt_size','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformSize',
                'property' => 'name',
                'empty_value' => 'Select One',

            ))
            ->add('short_size','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformSize',
                'property' => 'name',
                'empty_value' => 'Select One',

            ));
    }
    public function getName()
    {
        return 'player_registration';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ljms\CoreBundle\Entity\PlayerRegistration',
            'cascade_validation' => true,
        ));
    }
}
?>