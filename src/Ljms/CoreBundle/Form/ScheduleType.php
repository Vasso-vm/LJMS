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

            ))
            ->add('date','datetime',array(
                'with_seconds' => false,

            ))
            ->add('division','entity',array(
                'class'=> 'LjmsCoreBundle:Division',
                'property' => 'name',
                'mapped'=>false,
                'empty_value' => 'Select One',
                'required' =>false,

            ))
            ->add('home_team','entity',array(
                'class' =>'LjmsCoreBundle:Team',
                'property' => 'name',
                'empty_value' =>'Select One',

            ))
            ->add('visiting_team','entity',array(
                'class' =>'LjmsCoreBundle:Team',
                'property' => 'name',
                'empty_value' =>'Select One',

            ))
            ->add('location','entity',array(
                'class' => 'LjmsCoreBundle:Location',
                'property' => 'name',
                'empty_value' => 'Select One',

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