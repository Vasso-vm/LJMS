<?php

/* LjmsAdminBundle:Player:add.html.twig */
class __TwigTemplate_e8fc746387240535250dac640defed29ddbe2b45ba9ee611c169d7d051105bb9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LjmsAdminBundle:Default:base.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LjmsAdminBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "\t\t<h2 class=\"add_user\">
\t\t\t";
        // line 4
        if (($this->getContext($context, "method") == "add")) {
            // line 5
            echo "\t\t\t\tAdd Player
\t\t\t";
        } else {
            // line 7
            echo "\t\t\t\tEdit Player
\t\t\t";
        }
        // line 9
        echo "\t\t</h2>
\t\t";
        // line 10
        if (($this->getContext($context, "method") == "add")) {
            // line 11
            echo "\t\t\t<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("player_add", array("id" => $this->getContext($context, "guardian_id"))), "html", null, true);
            echo "\" novalidate=\"novalidate\" method=\"post\" class=\"form-horizontal\" id=\"add_user_form\">
\t\t";
        } else {
            // line 13
            echo "\t\t\t<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("player_edit", array("id" => $this->getContext($context, "edit_id"))), "html", null, true);
            echo "\" novalidate=\"novalidate\" method=\"post\" class=\"form-horizontal\" id=\"edit_user_form\">
\t\t\t
\t\t";
        }
        // line 16
        echo "\t\t\t<fieldset>
\t\t\t\t<h3>Child information</h3>
\t\t\t\t";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "\t\t\t\t
\t\t\t\t<div class=\"pull-left\">
                    ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "shares_guardian_address"), 'row');
        echo "
\t\t\t\t\t";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "FirstName"), 'row');
        echo "
\t\t\t\t\t";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "address"), 'row');
        echo "
\t\t\t\t\t";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "state"), 'row');
        echo "
\t\t\t\t\t";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "birthdate"), 'row');
        echo "\t\t\t\t\t
\t\t\t\t\t";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "note"), 'row');
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "LastName"), 'row');
        echo "
\t\t\t\t\t";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "city"), 'row');
        echo "
\t\t\t\t\t";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "zip"), 'row');
        echo "
\t\t\t\t</div>
\t\t\t</fieldset>
            <fieldset>
                <h3>Child information</h3>
                <div class=\"pull-left\">
                    ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "player_registration"), "shirt_type"), 'row');
        echo "
                    ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "player_registration"), "short_type"), 'row');
        echo "
                    ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "player_registration"), "jersey_name"), 'row');
        echo "
                    ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "player_registration"), "jersey_number"), 'row');
        echo "
                </div>
                <div class=\"pull-right\">
                    ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "player_registration"), "shirt_size"), 'row');
        echo "
                    ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "player_registration"), "short_size"), 'row');
        echo "
                </div>
            </fieldset>
            <fieldset>
                <div class=\"pull-left\">
                    ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "division"), 'row');
        echo "
                </div>
                <div class=\"pull-right\">
                    ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "team"), 'row');
        echo "
                </div>
            </fieldset>
\t\t\t<div class=\"controls buttons\">
\t\t\t\t";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "Save"), 'widget', array("attr" => array("class" => "btn")));
        echo "
                <a class=\"btn\" id=\"act\" href=\"";
        // line 56
        echo $this->env->getExtension('routing')->getPath("player_index");
        echo "\">Back</a>
\t\t\t</div>
\t\t\t";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "
\t\t</form>
\t";
    }

    public function getTemplateName()
    {
        return "LjmsAdminBundle:Player:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 56,  126 => 39,  97 => 28,  81 => 21,  77 => 20,  84 => 21,  127 => 40,  110 => 32,  58 => 14,  160 => 53,  150 => 51,  137 => 44,  118 => 37,  76 => 19,  332 => 121,  328 => 120,  317 => 113,  307 => 105,  304 => 104,  301 => 103,  282 => 98,  275 => 96,  263 => 94,  260 => 93,  257 => 92,  242 => 88,  231 => 85,  216 => 82,  213 => 81,  194 => 74,  184 => 72,  181 => 71,  148 => 49,  104 => 29,  65 => 17,  334 => 120,  327 => 116,  320 => 114,  310 => 112,  302 => 111,  290 => 100,  286 => 99,  277 => 105,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 68,  202 => 66,  195 => 65,  192 => 64,  186 => 63,  172 => 59,  153 => 51,  124 => 37,  114 => 36,  100 => 28,  90 => 23,  70 => 18,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 123,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 110,  294 => 109,  285 => 89,  283 => 106,  278 => 86,  268 => 95,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 53,  140 => 51,  132 => 42,  128 => 39,  107 => 41,  61 => 16,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 87,  235 => 74,  230 => 82,  227 => 81,  224 => 84,  221 => 77,  219 => 83,  217 => 75,  208 => 67,  204 => 78,  179 => 60,  159 => 61,  143 => 47,  135 => 42,  119 => 42,  102 => 27,  71 => 20,  67 => 13,  63 => 12,  59 => 16,  28 => 2,  87 => 24,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 63,  166 => 58,  163 => 57,  158 => 67,  156 => 56,  151 => 63,  142 => 59,  138 => 54,  136 => 43,  121 => 32,  117 => 47,  105 => 30,  91 => 25,  62 => 16,  49 => 11,  26 => 6,  94 => 25,  89 => 24,  85 => 22,  75 => 21,  68 => 26,  56 => 20,  31 => 3,  25 => 4,  21 => 2,  24 => 2,  19 => 1,  93 => 28,  88 => 22,  78 => 20,  46 => 7,  44 => 9,  27 => 4,  79 => 22,  72 => 18,  69 => 18,  47 => 10,  40 => 7,  37 => 10,  22 => 2,  246 => 89,  157 => 55,  145 => 46,  139 => 45,  131 => 40,  123 => 39,  120 => 40,  115 => 34,  111 => 30,  108 => 30,  101 => 29,  98 => 26,  96 => 27,  83 => 23,  74 => 19,  66 => 18,  55 => 13,  52 => 13,  50 => 11,  43 => 7,  41 => 8,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 76,  193 => 73,  189 => 73,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 62,  164 => 59,  162 => 54,  154 => 49,  149 => 51,  147 => 54,  144 => 48,  141 => 44,  133 => 43,  130 => 49,  125 => 38,  122 => 38,  116 => 30,  112 => 29,  109 => 34,  106 => 28,  103 => 28,  99 => 31,  95 => 23,  92 => 23,  86 => 22,  82 => 19,  80 => 20,  73 => 19,  64 => 25,  60 => 6,  57 => 15,  54 => 13,  51 => 9,  48 => 9,  45 => 9,  42 => 8,  39 => 6,  36 => 5,  33 => 3,  30 => 2,);
    }
}
