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
	            ->add('HomePhone','number')
	            ->add('CellPhone','number',array('required' => false))
	            ->add('AltPhone','number',array('required' => false))
	            ->add('Role','choice',array(
	            		'choices'=>array(
	            			'1'=>'Admin',
	            			'2'=>'Director',
	            			'3'=>'Coach',
	            			'4'=>'Manager',
	            			'5'=>'Guardian'
	            		),
                    'mapped'=>false,
                    'empty_value' =>'Select One',
                    'label'=>'Assign Roles',
                    'required'=>false,

	            	))
	            ->add('Division','entity',array(
                    'class'=>'LjmsCoreBundle:Division',
                    'property'=>'name',
                    'mapped'=>false,
                    'required'=>false,
                    'label'=>'Assign Division',
                    'disabled'=>true,
	            	))
	            ->add('Team','entity',array(
                    'class'=>'LjmsCoreBundle:Team',
                    'property'=>'name',
                    'mapped'=>false,
                    'required'=>false,
                    'label'=>'Assign Team',
                    'disabled'=>true,
	            	))
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