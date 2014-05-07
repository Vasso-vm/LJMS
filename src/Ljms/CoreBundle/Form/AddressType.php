<?php
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class AddressType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	    	$builder
	    		->add('address','text',array(
                    'error_bubbling' =>true,
                ))
	            ->add('state','entity',array(
                    'class' => 'LjmsCoreBundle:State',
                    'property' => 'name',
                    'empty_value' => 'Select One',
                    'error_bubbling' =>true,
	            	))
	            ->add('city','text',array(
                    'error_bubbling' =>true,
                ))
	            ->add('zip','number',array(
                    'error_bubbling' =>true,
                    'invalid_message'=>'The field Zip must contain only numbers.',
                    ));
	    }

	    public function setDefaultOptions(OptionsResolverInterface $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'Ljms\CoreBundle\Entity\Address',
	        ));
	    }

    	public function getName()
	    {
	        return 'address';
	    }
	}
?>