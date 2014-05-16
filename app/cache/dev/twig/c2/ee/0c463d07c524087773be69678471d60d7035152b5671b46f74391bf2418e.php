<?php

/* LjmsHomeBundle:About:index.html.twig */
class __TwigTemplate_c2ee0c463d07c524087773be69678471d60d7035152b5671b46f74391bf2418e extends Twig_Template
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
        echo "\t<div class=\"span5\">
\t\t<h2>About Us</h2>
\t\t<p>
\t\tLockport Junior Miss Softball (LJMS) was created in 1972 and has become one of the strongest,
\t\tfastest growing softball organizations in the Chicago land area.
\t\t</p>
\t\t<p>LJMS is a structured organization offering balanced age divisions for girls 5 to 18 years of age.</p>
\t\t<p>
\t\tUnlike other organizations, LJMS is a not for profit sole entity, which means all monies are redirected back into the
\t\tLJMS organization. All participants receive a complete uniform along with many opportunities to participate in league activities.
\t\t</p>
\t\t<p>LJMS believes in a strong family involvement and encourages fun and fundamentals. Safe play and a safe environment
\t\tare also focus points of LJMS. All Coach/Managers attend instructional clinics to assist them with their teachings.
\t\tEach team is staffed with at least one female leader.</p>
\t\t<p>All LJMS adult participants (Coaches, Managers, Umpires, and Executive Board Members)
\t\tare screened through a criminal history check to ensure the safest atmosphere for the girls.
\t\tLJMS is also proud to provide a higher level of competition with the creation of a full time travel team.
\t\t</p>
\t\t<p>The \"Lockport Pride\" is currently offered at the 10U,11U,12U and 13U levels.</p>
\t\t<p>LJMS encourages you to be part of this historic organization and help build the future
\t\tof girls softball.
\t\t</p>
\t</div>\t
";
    }

    public function getTemplateName()
    {
        return "LjmsHomeBundle:About:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 120,  327 => 116,  320 => 115,  310 => 112,  302 => 111,  290 => 108,  286 => 107,  277 => 105,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 68,  202 => 66,  195 => 65,  192 => 64,  186 => 63,  172 => 59,  153 => 55,  124 => 48,  114 => 46,  100 => 42,  90 => 37,  70 => 32,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 110,  294 => 109,  285 => 89,  283 => 106,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 58,  140 => 51,  132 => 51,  128 => 49,  107 => 41,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 67,  204 => 72,  179 => 60,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 31,  63 => 30,  59 => 14,  28 => 2,  87 => 25,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 57,  158 => 67,  156 => 56,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 47,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  26 => 6,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 14,  56 => 16,  31 => 3,  25 => 4,  21 => 2,  24 => 2,  19 => 1,  93 => 28,  88 => 6,  78 => 34,  46 => 7,  44 => 7,  27 => 4,  79 => 18,  72 => 16,  69 => 25,  47 => 9,  40 => 7,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 45,  101 => 32,  98 => 38,  96 => 31,  83 => 25,  74 => 33,  66 => 15,  55 => 15,  52 => 21,  50 => 10,  43 => 6,  41 => 5,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 54,  144 => 49,  141 => 48,  133 => 50,  130 => 49,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 43,  99 => 31,  95 => 41,  92 => 21,  86 => 36,  82 => 35,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 7,  39 => 5,  36 => 5,  33 => 4,  30 => 7,);
    }
}
