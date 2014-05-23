<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class ProfileType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name','text',array(

            ))
            ->add('email','email',array(

            ))
            ->add('password','repeated',array(
                'type'=>'password',
                'first_options'  => array('label' => 'Password','required'=>false,),
                'second_options' => array('label' => 'Confirm Password','required'=>false,),
                'required' =>false,
                'invalid_message'=>'The Password fields must match.',
            ))
            ->add('last_name','text',array(

            ))
            ->add('home_phone','number',array(

            ))
            ->add('cell_phone','number',array(
                'required' => false,
            ))
            ->add('alt_phone','number',array(
                'required' => false,
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
            'validation_groups' => array('Profile'),
        ));
    }
}
?>