<?php
namespace Ljms\CoreBundle\Form;

use Doctrine\ORM\EntityRepository;
use Ljms\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class AssignType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id=$options['attr']['id'];
        $builder
            ->add('not_assign_players','entity',array(
                'class'=>'LjmsCoreBundle:Player',
                'property'=>'first_name',
                'mapped' => false,
                'required'=>false,
                'multiple'=>true,
                'label'=>'Not Assign Players',
                'query_builder'=>function(EntityRepository $er){
                        return $er->createQueryBuilder('p')
                            ->where('p.team is NULL');
                        },)
            )
            ->add('players','entity',array(
                    'class'=>'LjmsCoreBundle:Player',
                    'property'=>'first_name',
                    'mapped' => false,
                    'required'=>false,
                    'multiple'=>true,
                    'label'=>$options['attr']['team_name'].','.$options['attr']['division_name'],
                    'query_builder'=>function(EntityRepository $er) use($id){
                            return $er->createQueryBuilder('p')
                                ->where("p.team='$id'");
                        },
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
            'data_class' => 'Ljms\CoreBundle\Entity\Team',
            'cascade_validation'=>true
        ));
    }

}
?>

