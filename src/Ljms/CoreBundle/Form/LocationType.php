<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class LocationType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array(
                'error_bubbling' =>true,
            ))
            ->add('city','text',array(
                'required'=>false,
                'error_bubbling' =>true,
            ))
            ->add('address','text',array(
                'required'=>false,
                'error_bubbling' =>true,
            ))
            ->add('state','entity',array(
                'class' => 'LjmsCoreBundle:State',
                'property' => 'name',
                'empty_value' => 'Select One',
                'error_bubbling' =>true,
            ))
            ->add('zip','number',array(
                'required'=>false,
                'error_bubbling' =>true,
            ))
            ->add('phone','number',array(
                'required'=>false,
                'error_bubbling' =>true,
            ))
            ->add('url','text',array(
                'required'=>false,
                'label' => 'Site URL',
                'error_bubbling' =>true,
            ))
            ->add('is_active','choice',array(
                'choices'=>array('1'=>'Active','0'=>'Inactive'),
                'empty_value' =>'Select One',
                'error_bubbling' =>true,
            ))
            ->add('Save', 'submit');

    }
    public function getName()
    {
        return 'location';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ljms\CoreBundle\Entity\Location',
        ));
    }
}
?>

