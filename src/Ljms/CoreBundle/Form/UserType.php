<?php 
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	class UserType extends AbstractType{
		
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
	            ->add('HomePhone','integer')
	            ->add('CellPhone','integer',array('required' => false))
	            ->add('AltPhone','integer',array('required' => false))
	            /*
	            ->add('Role','choice',array(
	            		'choices'=>array(
	            			'0'=>'Select One',
	            			'1'=>'Admin',
	            			'2'=>'Director',
	            			'3'=>'Coach',
	            			'4'=>'Manager',
	            			'5'=>'Guardian'
	            		),
	            	))
	            /*->add('AssignDivision','choice',array(
	            		'choices'=>array(         			
	            		),
	            	))
	            ->add('AssignTeam','choice',array(
	            		'choices'=>array(         			
	            		),
	            	))*/
	            ->add('Save', 'submit');
	        $builder->add('address', new AddressType());
	        $builder->add('altContact', new AltContactType());
	    }
	    public function getName()
	    {
	        return 'user';
	    }
	    public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		    $resolver->setDefaults(array(
		        'data_class' => 'Ljms\CoreBundle\Entity\Profile',
		        'cascade_validation' => true,
		    ));
		}
	}
?>