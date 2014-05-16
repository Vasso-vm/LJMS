<?php

/* LjmsAdminBundle:Admin:recover.html.twig */
class __TwigTemplate_eebd41591dfb5c858628b82a629e645771b3ed2b020d5dbb5add3cb13ae46ab7 extends Twig_Template
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
    ";
        // line 4
        if (($this->getContext($context, "new_password") == true)) {
            // line 5
            echo "        <h2>New Password</h2>
        <p>A new password has been sent to your e-mail address.</p>
        <a href=\"";
            // line 7
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">Login</a>
    ";
        } else {
            // line 9
            echo "        <form action=\"\" method=\"post\" class=\"form-horizontal\" name=\"form_login\" id=\"forgot_password_form\">
            <fieldset>
                <legend><strong>Forgot Password</strong></legend>
                    ";
            // line 12
            if ((!(null === $this->getContext($context, "message")))) {
                // line 13
                echo "                        ";
                if (($this->getContext($context, "message") == true)) {
                    // line 14
                    echo "                            <p class=\"alert alert-success\">You will receive a link to create a new password via email.</p>
                        ";
                }
                // line 16
                echo "                        ";
                if (($this->getContext($context, "message") == false)) {
                    // line 17
                    echo "                            <p class=\"alert alert-error\">This email is wrong.</p>
                        ";
                }
                // line 19
                echo "                    ";
            }
            // line 20
            echo "                <div class=\"control-group\" >
                    <label class=\"control-label\" for=\"email\">Email</label>
                    <div class=\"controls\">
                        <input class=\"input-large\" type=\"text\" name=\"email\" id=\"email\">
                    </div>
                </div>
                <div class=\"controls\">
                    <input type=\"submit\" class=\"btn\" value=\"Submit\" >
                </div>
            </fieldset>
        </form>
    ";
        }
        // line 32
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "LjmsAdminBundle:Admin:recover.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 21,  127 => 40,  110 => 32,  58 => 14,  160 => 53,  150 => 47,  137 => 44,  118 => 35,  76 => 19,  332 => 121,  328 => 120,  317 => 113,  307 => 105,  304 => 104,  301 => 103,  282 => 98,  275 => 96,  263 => 94,  260 => 93,  257 => 92,  242 => 88,  231 => 85,  216 => 82,  213 => 81,  194 => 74,  184 => 72,  181 => 71,  148 => 49,  104 => 29,  65 => 17,  334 => 120,  327 => 116,  320 => 114,  310 => 112,  302 => 111,  290 => 100,  286 => 99,  277 => 105,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 68,  202 => 66,  195 => 65,  192 => 64,  186 => 63,  172 => 59,  153 => 51,  124 => 37,  114 => 33,  100 => 28,  90 => 23,  70 => 18,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 123,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 110,  294 => 109,  285 => 89,  283 => 106,  278 => 86,  268 => 95,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 53,  140 => 51,  132 => 51,  128 => 39,  107 => 41,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 87,  235 => 74,  230 => 82,  227 => 81,  224 => 84,  221 => 77,  219 => 83,  217 => 75,  208 => 67,  204 => 78,  179 => 60,  159 => 61,  143 => 47,  135 => 42,  119 => 42,  102 => 27,  71 => 20,  67 => 13,  63 => 12,  59 => 16,  28 => 2,  87 => 24,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 63,  166 => 61,  163 => 57,  158 => 67,  156 => 56,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 32,  117 => 47,  105 => 30,  91 => 22,  62 => 17,  49 => 11,  26 => 6,  94 => 28,  89 => 24,  85 => 22,  75 => 21,  68 => 17,  56 => 16,  31 => 3,  25 => 4,  21 => 2,  24 => 2,  19 => 1,  93 => 28,  88 => 22,  78 => 20,  46 => 7,  44 => 9,  27 => 4,  79 => 22,  72 => 18,  69 => 20,  47 => 10,  40 => 7,  37 => 10,  22 => 2,  246 => 89,  157 => 56,  145 => 46,  139 => 45,  131 => 40,  123 => 39,  120 => 40,  115 => 34,  111 => 30,  108 => 30,  101 => 26,  98 => 29,  96 => 24,  83 => 32,  74 => 19,  66 => 19,  55 => 14,  52 => 13,  50 => 12,  43 => 7,  41 => 5,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 76,  193 => 73,  189 => 73,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 62,  164 => 59,  162 => 54,  154 => 49,  149 => 51,  147 => 54,  144 => 48,  141 => 44,  133 => 43,  130 => 49,  125 => 38,  122 => 43,  116 => 30,  112 => 29,  109 => 34,  106 => 28,  103 => 43,  99 => 31,  95 => 23,  92 => 23,  86 => 22,  82 => 19,  80 => 20,  73 => 19,  64 => 16,  60 => 6,  57 => 9,  54 => 8,  51 => 9,  48 => 11,  45 => 9,  42 => 5,  39 => 6,  36 => 5,  33 => 3,  30 => 2,);
    }
}
