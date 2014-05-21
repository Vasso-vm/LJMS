<?php 
	namespace Ljms\CoreBundle\Form;
    use Symfony\Component\Form\FormInterface;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class PlayerType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	        $builder
                ->add('shares_guardian_address','checkbox',array(
                    'required'=>false,
                ))
	            ->add('FirstName','text')
	            ->add('LastName','text')
	            ->add('birthdate','birthday',array(
                    'years' =>range(date('Y')-20,date('Y')),
                    'error_bubbling' =>true,
                ))
	            ->add('note','textarea',array(
	            	'required'    => false,
	            	'label' => 'Allergies/Medical Conditions',
                    'error_bubbling' =>true,
	            	))
                ->add('division','entity',array(
                    'mapped'=>false,
                    'class'=>'LjmsCoreBundle:Division',
                    'required'=>false,
                    'empty_value'=>'Select One',
                    'property'=>'name',
                    'error_bubbling' =>true,
                ))
                ->add('team','entity',array(
                    'class' =>'LjmsCoreBundle:Team',
                    'property' => 'name',
                    'empty_value' =>'Select One',
                    'required'=>false,
                    'error_bubbling' =>true,
                ))
	            ->add('Save', 'submit');
	        $builder->add('address', new AddressType());
            $builder->add('player_registration', new PlayerRegistrationType());
	    }
	    public function getName()
	    {
	        return 'player';
	    }
	    public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		    $resolver->setDefaults(array(
		        'data_class' => 'Ljms\CoreBundle\Entity\Player',
		        'cascade_validation' => true,
                'validation_groups' => function(FormInterface $form) {
                        $data=$form->getData();
                        $address=$data->getSharesGuardianAddress();
                        if ($address==true){
                            return array('Division','Player','PlayerRegistration');
                        }else{
                            return array('Division','PlayerRegistration','Address');
                        }
                },
		    ));
		}
	}
?>