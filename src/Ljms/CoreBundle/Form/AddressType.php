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

                ))
	            ->add('state','entity',array(
                    'class' => 'LjmsCoreBundle:State',
                    'property' => 'name',
                    'empty_value' => 'Select One',

	            	))
	            ->add('city','text',array(

                ))
	            ->add('zip','number',array(

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