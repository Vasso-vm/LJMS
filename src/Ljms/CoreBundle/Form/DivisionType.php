<?php 
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	class DivisionType extends AbstractType{
		
		public function buildForm(FormBuilderInterface $builder, array $options)
	    {
	    	for ($i=5;$i<=18;$i++){
	    		$array[$i]=$i;
	    	}
	        $builder
	            ->add('is_active','choice',array(
	            		'choices'=>array('1'=>'Active','0'=>'Inactive'),
	            		'empty_value' =>'Select One',

	            	))
	            ->add('name','text',array(
                    'label'=>'Division Name',

                ))
	            ->add('min_age','choice',array(
	            	'choices'=>$array,
	            	'empty_value'=>'Select One',

	            	))
	            ->add('max_age','choice',array(
	            	'choices'=>$array,
	            	'empty_value'=>'Select One',

	            	))
	            ->add('description','textarea',array(
	            	'required'    => false,
	            	'label' => 'Description',

	            	))	   
            	->add('rules','textarea',array(
            		'required'    => false,
            		'label' => 'Rules',

            		))
                ->add('file','file',array(
                    'required'=>false,
                    'label'=>'Logo',
                ))
	            ->add('Save', 'submit');
	    }
	    public function getName()
	    {
	        return 'division';
	    }
	    public function setDefaultOptions(OptionsResolverInterface $resolver)
		{
		    $resolver->setDefaults(array(
		        'data_class' => 'Ljms\CoreBundle\Entity\Division',
                'validation_groups' => array('Division','mapped'),
		    ));
		}
	}
?>