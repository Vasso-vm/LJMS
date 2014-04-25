<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class AssignType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('division','entity',array(
                'class' => 'LjmsCoreBundle:Division',
                'property' => 'name',
                'empty_value' => 'Select One'
            ))
            ->add('Save', 'submit');
    }
    public function getName()
    {
        return 'assign';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ljms\CoreBundle\Entity\PlayerXteam',
        ));
    }
}
?>

