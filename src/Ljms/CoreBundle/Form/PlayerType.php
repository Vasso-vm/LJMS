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
	            ->add('first_name','text',array(

                ))
	            ->add('last_name','text',array(

                ))
	            ->add('birth_date','birthday',array(
                    'years' =>range(date('Y')-20,date('Y')-5),

                ))
	            ->add('note','textarea',array(
	            	'required'    => false,
	            	'label' => 'Allergies/Medical Conditions',
	            	))
                ->add('division','entity',array(
                    'mapped'=>false,
                    'class'=>'LjmsCoreBundle:Division',
                    'required'=>false,
                    'empty_value'=>'Select One',
                    'property'=>'name',
                ))
                ->add('team','entity',array(
                    'class' =>'LjmsCoreBundle:Team',
                    'property' => 'name',
                    'empty_value' =>'Select One',
                    'attr'=>array('disabled'=>'disabled'),
                    'required'=>false,
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
                            return array('Division','Player','PlayerRegistration','Address');
                        }
                },
		    ));
		}
	}
?>