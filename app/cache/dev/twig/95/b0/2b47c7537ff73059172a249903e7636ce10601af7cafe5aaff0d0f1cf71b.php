<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_95b02b47c7537ff73059172a249903e7636ce10601af7cafe5aaff0d0f1cf71b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Redirection Intercepted";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "location"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "location"), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 15,  20 => 1,  330 => 103,  324 => 101,  321 => 100,  318 => 99,  311 => 96,  308 => 95,  270 => 81,  267 => 80,  259 => 75,  249 => 71,  234 => 65,  225 => 62,  222 => 61,  206 => 53,  188 => 46,  155 => 34,  129 => 24,  161 => 56,  126 => 23,  97 => 28,  81 => 3,  77 => 20,  84 => 4,  127 => 40,  110 => 32,  58 => 18,  160 => 53,  150 => 51,  137 => 44,  118 => 37,  76 => 27,  332 => 121,  328 => 120,  317 => 113,  307 => 105,  304 => 104,  301 => 93,  282 => 85,  275 => 96,  263 => 94,  260 => 93,  257 => 92,  242 => 67,  231 => 85,  216 => 82,  213 => 81,  194 => 74,  184 => 72,  181 => 71,  148 => 32,  104 => 29,  65 => 17,  334 => 120,  327 => 116,  320 => 114,  310 => 112,  302 => 111,  290 => 87,  286 => 86,  277 => 83,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 55,  202 => 52,  195 => 65,  192 => 64,  186 => 63,  172 => 59,  153 => 51,  124 => 37,  114 => 36,  100 => 28,  90 => 23,  70 => 24,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 123,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 92,  294 => 109,  285 => 89,  283 => 106,  278 => 86,  268 => 95,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 63,  220 => 70,  214 => 69,  177 => 65,  169 => 53,  140 => 51,  132 => 25,  128 => 39,  107 => 41,  61 => 91,  273 => 82,  269 => 94,  254 => 73,  243 => 88,  240 => 86,  238 => 66,  235 => 74,  230 => 82,  227 => 81,  224 => 84,  221 => 77,  219 => 60,  217 => 75,  208 => 67,  204 => 78,  179 => 43,  159 => 61,  143 => 47,  135 => 42,  119 => 42,  102 => 13,  71 => 99,  67 => 13,  63 => 12,  59 => 80,  28 => 2,  87 => 32,  38 => 6,  201 => 92,  196 => 50,  183 => 44,  171 => 63,  166 => 58,  163 => 57,  158 => 67,  156 => 56,  151 => 33,  142 => 30,  138 => 54,  136 => 43,  121 => 32,  117 => 18,  105 => 14,  91 => 25,  62 => 16,  49 => 50,  26 => 6,  94 => 25,  89 => 24,  85 => 22,  75 => 1,  68 => 98,  56 => 16,  31 => 8,  25 => 4,  21 => 2,  24 => 3,  19 => 1,  93 => 7,  88 => 5,  78 => 2,  46 => 13,  44 => 40,  27 => 7,  79 => 22,  72 => 18,  69 => 18,  47 => 41,  40 => 8,  37 => 23,  22 => 2,  246 => 89,  157 => 55,  145 => 31,  139 => 29,  131 => 40,  123 => 39,  120 => 40,  115 => 34,  111 => 30,  108 => 15,  101 => 29,  98 => 34,  96 => 27,  83 => 31,  74 => 19,  66 => 95,  55 => 13,  52 => 13,  50 => 11,  43 => 7,  41 => 8,  35 => 5,  32 => 12,  29 => 3,  209 => 82,  203 => 78,  199 => 51,  193 => 73,  189 => 73,  187 => 84,  182 => 66,  176 => 42,  173 => 41,  168 => 38,  164 => 36,  162 => 54,  154 => 49,  149 => 51,  147 => 54,  144 => 48,  141 => 44,  133 => 43,  130 => 49,  125 => 38,  122 => 38,  116 => 30,  112 => 16,  109 => 34,  106 => 28,  103 => 28,  99 => 31,  95 => 23,  92 => 23,  86 => 22,  82 => 19,  80 => 20,  73 => 19,  64 => 21,  60 => 6,  57 => 15,  54 => 60,  51 => 59,  48 => 16,  45 => 9,  42 => 8,  39 => 10,  36 => 10,  33 => 9,  30 => 1,);
    }
}
