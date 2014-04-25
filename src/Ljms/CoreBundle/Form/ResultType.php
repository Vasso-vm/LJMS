<?php
namespace Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResultType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('home_team_score','number',array(
                'label' => 'Home Team'
            ))
            ->add('visiting_team_score','number',array(
                'label' => 'Visiting Team'
            ))
            ->add('Save', 'submit');
    }
    public function getName()
    {
        return 'result';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ljms\CoreBundle\Entity\Schedule',
        ));
    }
}
?>