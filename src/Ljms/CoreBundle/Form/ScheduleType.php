<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
class ScheduleType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('practice','checkbox',array(
                'label' => 'Practice Game',
                'required' => false,
                'error_bubbling' =>true,
            ))
            ->add('date','datetime',array(
                'with_seconds' => false,
                'error_bubbling' =>true,
            ))
            ->add('division','entity',array(
                'class'=> 'LjmsCoreBundle:Division',
                'property' => 'name',
                'mapped'=>false,
                'empty_value' => 'Select One',
                'required' =>false,
                'error_bubbling' =>true,
            ))
            ->add('home_team','entity',array(
                'class' =>'LjmsCoreBundle:Team',
                'property' => 'name',
                'empty_value' =>'Select One',
                'disabled' => false,
                'error_bubbling' =>true,
            ))
            ->add('visiting_team','entity',array(
                'class' =>'LjmsCoreBundle:Team',
                'property' => 'name',
                'empty_value' =>'Select One',
                'disabled' => false,
                'error_bubbling' =>true,
            ))
            ->add('location','entity',array(
                'class' => 'LjmsCoreBundle:Location',
                'property' => 'name',
                'empty_value' => 'Select One',
                'error_bubbling' =>true,
            ))
            ->add('Save', 'submit');
    }
    public function getName()
    {
        return 'schedule';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ljms\CoreBundle\Entity\Schedule',
        ));
    }
}
?>