<?php

/* LjmsHomeBundle:Home:index.html.twig */
class __TwigTemplate_86df4d7d8f863a5ed4a66b5bf4f0c8d0376545ef1d420388d0b0cadfd35b7e84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LjmsHomeBundle:Default:base.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LjmsHomeBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"span5\">
        <h2>Welcome to our web site!</h2>
        ";
        // line 5
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "184a34a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_184a34a_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/184a34a_welcome_image_1.jpeg");
            // line 6
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" alt=\"\" class=\"pull-left\">
        ";
        } else {
            // asset "184a34a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_184a34a") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/184a34a.jpeg");
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" alt=\"\" class=\"pull-left\">
        ";
        }
        unset($context["asset_url"]);
        // line 8
        echo "        <div class=\"welcome\">
            <p>Welcome to the Lockport Junior Miss Softball web site. The LJMS Executive Board is excited to introduce the new league site.
                This site will have many new features that will enable us to keep you informed and updated on all league activities.
            </p>
            <p class=\"link\"><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("about_index");
        echo "\">more about us</a></p>
        </div>
    </div>        
";
    }

    public function getTemplateName()
    {
        return "LjmsHomeBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 12,  53 => 8,  39 => 6,  35 => 5,  31 => 3,  28 => 2,);
    }
}
