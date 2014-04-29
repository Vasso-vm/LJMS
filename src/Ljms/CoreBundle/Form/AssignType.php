<?php
namespace Ljms\CoreBundle\Form;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class AssignType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('not_assign_players','entity',array(
                'class'=>'LjmsCoreBundle:Player',
                'property'=>'first_name',
                'mapped' => false,
                'multiple'=>true,
                'label'=>'Players',
                'query_builder'=>function(EntityRepository $er){
                        return $er->createQueryBuilder('p')
                            ->where('p.player_team is NULL');
                        },)
            )
            ->add('assign_players','entity',array(
                    'class'=>'LjmsCoreBundle:PlayerXteam',
                    'property'=>'player.first_name',
                    'mapped' => false,
                    'multiple'=>true,

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

