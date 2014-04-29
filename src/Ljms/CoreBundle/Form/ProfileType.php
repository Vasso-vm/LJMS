<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class ProfileType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName','text')
            ->add('email','repeated',array(
                'type'=>'email',
                'first_options'  => array('label' => 'Email'),
                'second_options' => array('label' => 'Confirm Email'),
            ))
            ->add('password','repeated',array(
                'type'=>'password',
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Confirm Password'),
            ))
            ->add('LastName','text')
            ->add('HomePhone','number')
            ->add('CellPhone','number',array('required' => false))
            ->add('AltPhone','number',array('required' => false))
            ->add('Save', 'submit');

    }
    public function getName()
    {
        return 'profile';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ljms\CoreBundle\Entity\Profile',
        ));
    }
}
?>