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

            ))
            ->add('city','text',array(
                'required'=>false,

            ))
            ->add('address','text',array(
                'required'=>false,

            ))
            ->add('state','entity',array(
                'class' => 'LjmsCoreBundle:State',
                'property' => 'name',
                'empty_value' => 'Select One',

            ))
            ->add('zip','number',array(
                'required'=>false,

            ))
            ->add('phone','number',array(
                'required'=>false,

            ))
            ->add('url','text',array(
                'required'=>false,
                'label' => 'Site URL',

            ))
            ->add('is_active','choice',array(
                'choices'=>array('1'=>'Active','0'=>'Inactive'),
                'empty_value' =>'Select One',

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

