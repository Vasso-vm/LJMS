<?php 
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	class UserType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	        $builder
	            ->add('first_name','text',array(
                    'attr'=>array('class'=>'required')
                ))
	            ->add('email','repeated',array(
	            		'type'=>'email',
	            		'first_options'  => array('label' => 'Email'),
    					'second_options' => array('label' => 'Confirm Email'),
                        'invalid_message'=>'The Email fields must match.',

	            	))	            
	            ->add('password','repeated',array(
	            		'type'=>'password',
	            		'first_options'  => array('label' => 'Password'),
    					'second_options' => array('label' => 'Confirm Password'),
                        'invalid_message'=>'The Password fields must match.',
                        'required'=>false,
	            	))	            
	            ->add('last_name','text',array(

                ))
	            ->add('home_phone','number',array(

                        'invalid_message'=>'The field Home Phone must contain only numbers.',
                ))
	            ->add('cell_phone','number',array(
                    'required' => false,
                    'invalid_message'=>'The field Cell Phone must contain only numbers.',
                ))
	            ->add('alt_phone','number',array(
                    'required' => false,
                    'invalid_message'=>'The field Alt Phone must contain only numbers.',
                ))
                ->add('Save', 'submit');
            if (!isset($options['attr']['guardian'])){
                $builder
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
                        ));
            }
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
		        'validation_groups' => array('Profile','Address','AltContact'),
                'cascade_validation' => true,
		    ));
		}
	}
?>