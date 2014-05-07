<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class ProfileType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName','text',array(
                'error_bubbling'=>true
            ))
            ->add('email','repeated',array(
                'type'=>'email',
                'first_options'  => array('label' => 'Email',),
                'second_options' => array('label' => 'Confirm Email',),
                'invalid_message'=>'The Email fields must match.',
                'error_bubbling'=>true
            ))
            ->add('password','repeated',array(
                'type'=>'password',
                'first_options'  => array('label' => 'Password','required'=>false,),
                'second_options' => array('label' => 'Confirm Password','required'=>false,),
                'error_bubbling'=>true,
                'invalid_message'=>'The Password fields must match.',
            ))
            ->add('LastName','text',array(
                'error_bubbling'=>true,
            ))
            ->add('HomePhone','number',array(
                'error_bubbling'=>true
            ))
            ->add('CellPhone','number',array(
                'required' => false,
                'error_bubbling'=>true
            ))
            ->add('AltPhone','number',array(
                'required' => false,
                'error_bubbling'=>true
            ))
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