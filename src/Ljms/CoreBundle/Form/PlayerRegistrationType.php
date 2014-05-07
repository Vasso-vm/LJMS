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
                'error_bubbling' =>true,
            ))
            ->add('jersey_number','number',array(
                'error_bubbling' =>true,
                'invalid_message'=>'The field Jersey Number must contain only numbers.',
            ))
            ->add('shirt_type','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformGroup',
                'property' => 'name',
                'empty_value' => 'Select One',
                'error_bubbling' =>true,
            ))
            ->add('short_type','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformGroup',
                'property' => 'name',
                'empty_value' => 'Select One',
                'error_bubbling' =>true,
            ))
            ->add('shirt_size','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformSize',
                'property' => 'name',
                'empty_value' => 'Select One',
                'error_bubbling' =>true,
            ))
            ->add('short_size','entity',array(
                'class' => 'LjmsCoreBundle:TypeUniformSize',
                'property' => 'name',
                'empty_value' => 'Select One',
                'error_bubbling' =>true,
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