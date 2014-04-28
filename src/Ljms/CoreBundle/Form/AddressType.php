<?php
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class AddressType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	    	$builder
	    		->add('address','text')
	            ->add('state','entity',array(
                    'class' => 'LjmsCoreBundle:State',
                    'property' => 'name',
                    'empty_value' => 'Select One'
	            	))
	            ->add('city','text')
	            ->add('zip','number');
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