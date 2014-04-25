<?php 
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	class PlayerType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	        $builder
                ->add('shares_guardian_address','checkbox',array(
                    'label' => 'Address as Guardian',
                    'required' => false,
                ))
	            ->add('FirstName','text')
	            ->add('LastName','text')
	            ->add('birthdate','birthday',array(
                    'years' =>range(date('Y')-20,date('Y'))
                ))
	            ->add('note','textarea',array(
	            	'required'    => false,
	            	'label' => 'Allergies/Medical Conditions',
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
		    ));
		}
	}
?>