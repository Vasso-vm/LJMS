<?php
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	class AltContactType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	    	$builder
	    		->add('alt_first_name','text',array(
                    'required' => false,
                    'error_bubbling' =>true,
                ))
	            ->add('alt_last_name', 'text',array(
                    'required' => false,
                    'error_bubbling' =>true,
                ))
	            ->add('alt_email','text',array(
                    'required' => false,
                    'error_bubbling' =>true,
                    'invalid_message' => 'The field Alt email is not valid'
                ))
	            ->add('alt_phone','number',array(
                    'required' => false,
                    'error_bubbling' =>true,
                    'invalid_message'=>'The field Alt Phone must contain only numbers.',
                ));
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