<?php

namespace Ljms\HomeBundle\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CaptchaType extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'url' => 'http://www.google.com/recaptcha/api/js/recaptcha_ajax.js',
            'public_key'    => '6Lc9hfMSAAAAAPS3VAeRoXqDWctxaJqbSRxG6iFU',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'compound'      => false,
            'public_key'    => null,
            'url' => null,
        ));
    }

    public function getParent()
    {
        return 'form';
    }

    public function getName()
    {
        return 'captcha';
    }


}
