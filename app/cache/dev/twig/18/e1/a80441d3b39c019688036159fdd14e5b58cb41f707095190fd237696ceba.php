<?php

/* LjmsTplBundle:Default:base.html.twig */
class __TwigTemplate_18e1a80441d3b39c019688036159fdd14e5b58cb41f707095190fd237696ceba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'scripts' => array($this, 'block_scripts'),
            'section' => array($this, 'block_section'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 8
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c856ad0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c856ad0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/style_bootstrap_1.css");
            // line 15
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
    ";
            // asset "c856ad0_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c856ad0_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/style_index_2.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
    ";
            // asset "c856ad0_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c856ad0_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/style_jquery-ui-1.10.4.custom.min_3.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
    ";
            // asset "c856ad0_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c856ad0_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/style_jquery.ui.timepicker_4.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
    ";
            // asset "c856ad0_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c856ad0_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/style_pickmeup_5.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "c856ad0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c856ad0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/style.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 17
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b0f5dd0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery-1.10.2_1.js");
            // line 20
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery-2.0.3_2.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery-ui-1.10.4.custom.min_3.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery.inputmask_4.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery.maskedinput_5.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery.pickmeup_6.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery.ui.timepicker_7.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_1_jquery.validate_8.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_8") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_2_ajax_1.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_9") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_2_form_validation_2.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_10") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_2_link-handler_3.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_11") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_2_script_4.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
            // asset "b0f5dd0_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0_12") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0_part_2_upload_5.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "b0f5dd0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0f5dd0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/b0f5dd0.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 22
        echo "    ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 25
        echo "</head>
<body>
    <header>
        <h1><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getUrl("home_index");
        echo "\">
                ";
        // line 29
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5c989a1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5c989a1_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/5c989a1_logo_1.jpg");
            // line 30
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" alt=\"Logo\" />
                ";
        } else {
            // asset "5c989a1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5c989a1") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/5c989a1.jpg");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" alt=\"Logo\" />
                ";
        }
        unset($context["asset_url"]);
        // line 32
        echo "        </a></h1>
        ";
        // line 33
        if (($this->getAttribute($this->getContext($context, "app"), "user") != null)) {
            // line 34
            echo "            <div class=\"login pull-right\">
                <strong><a href=\"";
            // line 35
            echo $this->env->getExtension('routing')->getPath("profile_index");
            echo "\">Profile</a></strong>
                <strong><a href=\"";
            // line 36
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Log Out</a></strong>
            </div>
        ";
        }
        // line 39
        echo "        <div class=\"navbar\">
            <div class=\"navbar-inner\">
                <ul class=\"nav\">
                    <li><a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getUrl("home_index");
        echo "\">Home</a></li>
                    <li><a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("about_index");
        echo "\">About</a></li>
                    <li><a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("sponsors_index");
        echo "\">Sponsors</a></li>
                    <li><a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("contact_index");
        echo "\">Contact us</a></li>
                </ul>
            </div>
        </div>
    </header>
    ";
        // line 50
        $this->displayBlock('section', $context, $blocks);
        // line 52
        echo "    <footer>
        <ul class=\"unstyled pull-left nav nav-pills\">
            <li><a href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getUrl("home_index");
        echo "\">Home</a></li>
            <li><a href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("about_index");
        echo "\">About</a></li>
            <li><a href=\"";
        // line 56
        echo $this->env->getExtension('routing')->getPath("sponsors_index");
        echo "\">Sponsors</a></li>
            <li><a href=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("contact_index");
        echo "\">Contact</a></li>
        </ul>
        <p class=\"pull-right\">Copyright 2008 Lockport Junior Miss Softball</p>
    </footer>
</body>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "        <title>Test Application</title>
    ";
    }

    // line 22
    public function block_scripts($context, array $blocks = array())
    {
        // line 23
        echo "
    ";
    }

    // line 50
    public function block_section($context, array $blocks = array())
    {
        // line 51
        echo "    ";
    }

    public function getTemplateName()
    {
        return "LjmsTplBundle:Default:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 51,  280 => 50,  275 => 23,  272 => 22,  267 => 6,  264 => 5,  255 => 57,  251 => 56,  247 => 55,  243 => 54,  239 => 52,  237 => 50,  229 => 45,  225 => 44,  221 => 43,  217 => 42,  212 => 39,  206 => 36,  202 => 35,  199 => 34,  197 => 33,  194 => 32,  180 => 30,  176 => 29,  172 => 28,  167 => 25,  164 => 22,  78 => 20,  73 => 17,  35 => 15,  30 => 8,  28 => 5,  22 => 1,);
    }
}
