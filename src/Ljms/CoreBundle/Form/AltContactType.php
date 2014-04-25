<?php
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class AltContactType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	    	$builder
	    		->add('altFirstName','text',array('required' => false))
	            ->add('altLastName', 'text',array('required' => false))
	            ->add('altEmail','text',array('required' => false))
	            ->add('altPhone','integer',array('required' => false));
	    }

	    public function setDefaultOptions(OptionsResolverInterface $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'Ljms\CoreBundle\Entity\AltContact',
	        ));
	    }

    	public function getName()
	    {
	        return 'altContact';
	    }
	}
?>