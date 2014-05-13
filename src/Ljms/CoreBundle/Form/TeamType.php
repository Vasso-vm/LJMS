<?php
	namespace Ljms\CoreBundle\Form;
	use Symfony\Component\Form\AbstractType;
    use Doctrine\ORM\EntityRepository;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	class TeamType extends AbstractType{

        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $id=$options['attr']['id'];
            $builder
                ->add('is_active','choice',array(
                    'choices'=>array('1'=>'Active','0'=>'Inactive'),
                    'empty_value' =>'Select One',
                    'error_bubbling' =>true,
                ))
                ->add('name','text',array(
                    'label'=>'Team Name',
                    'error_bubbling' =>true,
                ))
                ->add('division','entity',array(
                    'class' => 'LjmsCoreBundle:Division',
                    'property' => 'name',
                    'empty_value' => 'Select One',
                    'error_bubbling' =>true,
                    'query_builder'=>function(EntityRepository $er)use ($id){
                            if ($id!==null){
                                return $er->createQueryBuilder('d')
                                    ->leftJoin('d.profile','p')
                                    ->where("p.id='$id'");
                            }
                            else return $er->createQueryBuilder('d');
                        },
                ))
                ->add('traveling','choice',array(
                    'choices'=>array('1'=>'Yes','0'=>'No'),
                    'empty_value' =>'Select One',
                    'label' => 'is Visitor',
                    'error_bubbling' =>true,
                ))
                ->add('Save', 'submit');
        }
        public function getName()
        {
            return 'team';
        }
        public function setDefaultOptions(OptionsResolverInterface $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'Ljms\CoreBundle\Entity\Team',
            ));
        }
    }
?>

