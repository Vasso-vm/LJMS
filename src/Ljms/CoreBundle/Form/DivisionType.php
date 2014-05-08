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
                        'error_bubbling' =>true,
	            	))
	            ->add('name','text',array(
                    'label'=>'Division Name',
                    'error_bubbling' =>true,
                ))
	            ->add('min_age','choice',array(
	            	'choices'=>$array,
	            	'empty_value'=>'Select One',
                    'error_bubbling' =>true,
	            	))
	            ->add('max_age','choice',array(
	            	'choices'=>$array,
	            	'empty_value'=>'Select One',
                    'error_bubbling' =>true,
	            	))
	            ->add('description','textarea',array(
	            	'required'    => false,
	            	'label' => 'Description',
                    'error_bubbling' =>true,
	            	))	   
            	->add('rules','textarea',array(
            		'required'    => false,
            		'label' => 'Rules',
                    'error_bubbling' =>true,
            		))
                ->add('file','file',array(
                    'error_bubbling' =>true,
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
		    ));
		}
	}
?>