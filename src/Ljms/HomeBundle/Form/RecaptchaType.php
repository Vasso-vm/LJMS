<?php

namespace Ljms\HomeBundle\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Exception\FormException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * A field for entering a recaptcha text.
 */
class RecaptchaType extends AbstractType
{

    const RECAPTCHA_API_SERVER        = '//www.google.com/recaptcha/api';
    const RECAPTCHA_API_JS_SERVER     = '//www.google.com/recaptcha/api/js/recaptcha_ajax.js';

    /**
     * The public key
     *
     * @var string
     */
    protected $publicKey;

    /**
     * Use secure url
     *
     * @var Boolean
     */
    protected $secure;

    /**
     * Enable recaptcha
     *
     * @var Boolean
     */
    protected $enabled;


    protected $language;

    /**
     * Construct.
     *
     * @param ContainerInterface $container An ContainerInterface instance
     */
    public function __construct(ContainerInterface $container)
    {
        $this->publicKey = $container->getParameter('recaptcha.public_key');
        $this->enabled   = $container->getParameter('recaptcha.enabled');
        $this->language  = $container->getParameter($container->getParameter('recaptcha.locale_key'));
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'recaptcha_enabled' => $this->enabled,
        ));

        if (!$this->enabled) {
            return;
        }

        $server = self::RECAPTCHA_API_SERVER;

        $view->vars = array_replace($view->vars, array(
            'url_challenge' => sprintf('%s/challenge?k=%s', $server, $this->publicKey),
            'url_noscript'  => sprintf('%s/noscript?k=%s', $server, $this->publicKey),
            'public_key'    => $this->publicKey,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'compound'      => false,
            'public_key'    => null,
            'url_challenge' => null,
            'url_noscript'  => null,
            'attr'          => array(
                'options' => array(
                    'theme' => 'clean',
	    	    'lang'  => $this->language,
    	        ),
	    ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'recaptcha';
    }


    public function getScriptURL($key)
    {
        return isset($this->scripts[$key]) ? $this->scripts[$key] : null;
    }

    /**
     * Gets the public key.
     *
     * @return string The javascript source URL
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
}
