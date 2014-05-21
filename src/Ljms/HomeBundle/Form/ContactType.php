<?php
namespace Ljms\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;
use Ljms\HomeBundle\Validator\Constraints\True;



class ContactType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array(
                'error_bubbling' =>true,
            ))
            ->add('email','email',array(

                'error_bubbling' =>true,
            ))
            ->add('subject','text',array(
                'error_bubbling' =>true,
            ))
            ->add('message','textarea',array(
                'error_bubbling' =>true,
            ))
            ->add('recaptcha', 'recaptcha',array(
                'mapped' => false,
                'attr' => array(
                    'options' => array(
                        'theme' => 'red'
                    )),
                'constraints'   => array(
                    new True()
                ),
                'error_bubbling' =>true,
            ))
            ->add('Submit', 'submit');
    }
    public function getName()
    {
        return 'contact';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
            'name' => array(
                new NotBlank(array('message' => 'Name should not be blank.')),
                new Length(array('min' => 2,'minMessage' => 'Name value is too short. It should have 2 characters or more.'))
            ),
            'email' => array(
                new NotBlank(array('message' => 'Email should not be blank.')),
                new Email(array('message' => 'Invalid email address.'))
            ),
            'subject' => array(
                new NotBlank(array('message' => 'Subject should not be blank.')),
                new Length(array('min' => 3,'minMessage' => 'Subject value is too short. It should have 3 characters or more.'))
            ),
            'message' => array(
                new NotBlank(array('message' => 'Message should not be blank.')),
                new Length(array('min' => 5,'minMessage' => 'Message value is too short. It should have 5 characters or more.'))
            ),
        ));
        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }
}
?>