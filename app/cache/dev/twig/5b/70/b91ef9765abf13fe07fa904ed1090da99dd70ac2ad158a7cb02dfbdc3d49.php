<?php

/* SensioDistributionBundle:Configurator/Step:secret.html.twig */
class __TwigTemplate_5b70b91ef9765abf13fe07fa904ed1090da99dd70ac2ad158a7cb02dfbdc3d49 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Configure global Secret";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->env->getExtension('form')->renderer->setTheme($this->getContext($context, "form"), array(0 => "SensioDistributionBundle::Configurator/form.html.twig"));
        // line 7
        echo "
    <div class=\"step\">
        ";
        // line 9
        $this->env->loadTemplate("SensioDistributionBundle::Configurator/steps.html.twig")->display(array_merge($context, array("index" => $this->getContext($context, "index"), "count" => $this->getContext($context, "count"))));
        // line 10
        echo "
        <h1>Global Secret</h1>
        <p>Configure the global secret for your website (the secret is used for the CSRF protection among other things):</p>

        <div class=\"symfony-form-errors\">
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        </div>
        <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_configurator_step", array("index" => $this->getContext($context, "index"))), "html", null, true);
        echo " \" method=\"POST\">
            <div class=\"symfony-form-row\">
                ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "secret"), 'label');
        echo "
                <div class=\"symfony-form-field\">
                    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "secret"), 'widget');
        echo "
                    <a href=\"#\" onclick=\"generateSecret(); return false;\" class=\"sf-button\">
                        <span class=\"border-l\">
                            <span class=\"border-r\">
                                <span class=\"btn-bg\">Generate</span>
                            </span>
                        </span>
                    </a>
                    <div class=\"symfony-form-errors\">
                        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "secret"), 'errors');
        echo "
                    </div>
                </div>
            </div>

            ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "

            <div class=\"symfony-form-footer\">
                <p>
                    <button type=\"submit\" class=\"sf-button\">
                        <span class=\"border-l\">
                            <span class=\"border-r\">
                                <span class=\"btn-bg\">NEXT STEP</span>
                            </span>
                        </span>
                    </button>
                </p>
                <p>* mandatory fields</p>
            </div>

        </form>

        <script type=\"text/javascript\">
            function generateSecret()
            {
                var result = '';
                for (i=0; i < 32; i++) {
                    result += Math.round(Math.random()*16).toString(16);
                }
                document.getElementById('distributionbundle_secret_step_secret').value = result;
            }
        </script>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator/Step:secret.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  462 => 202,  449 => 198,  446 => 197,  441 => 196,  439 => 195,  431 => 189,  429 => 188,  415 => 180,  408 => 176,  401 => 172,  394 => 168,  373 => 156,  348 => 140,  342 => 137,  338 => 135,  335 => 134,  325 => 129,  323 => 128,  289 => 113,  262 => 98,  256 => 96,  233 => 87,  207 => 75,  200 => 72,  389 => 160,  386 => 159,  378 => 157,  371 => 156,  358 => 151,  345 => 147,  343 => 146,  340 => 145,  331 => 140,  326 => 138,  296 => 121,  293 => 120,  281 => 114,  276 => 111,  253 => 100,  248 => 94,  210 => 77,  152 => 46,  810 => 492,  807 => 491,  796 => 489,  792 => 488,  788 => 486,  775 => 485,  749 => 479,  746 => 478,  727 => 476,  710 => 475,  706 => 473,  702 => 472,  698 => 471,  694 => 470,  690 => 469,  686 => 468,  682 => 467,  679 => 466,  677 => 465,  649 => 462,  634 => 456,  625 => 453,  620 => 451,  601 => 446,  567 => 414,  549 => 411,  532 => 410,  529 => 409,  517 => 404,  165 => 60,  363 => 153,  357 => 123,  344 => 119,  315 => 125,  303 => 122,  291 => 102,  274 => 110,  265 => 105,  255 => 101,  212 => 78,  190 => 76,  185 => 66,  174 => 65,  672 => 345,  668 => 344,  664 => 342,  660 => 464,  651 => 337,  647 => 336,  644 => 335,  640 => 334,  631 => 327,  629 => 454,  626 => 325,  622 => 452,  613 => 320,  609 => 319,  606 => 449,  602 => 317,  593 => 310,  591 => 309,  588 => 308,  585 => 307,  581 => 305,  577 => 303,  569 => 300,  563 => 298,  559 => 296,  557 => 295,  552 => 293,  548 => 292,  545 => 291,  541 => 290,  533 => 284,  531 => 283,  527 => 408,  525 => 280,  522 => 406,  519 => 278,  515 => 276,  509 => 272,  505 => 270,  499 => 268,  497 => 267,  489 => 262,  483 => 258,  479 => 256,  473 => 254,  471 => 253,  465 => 249,  463 => 248,  459 => 246,  454 => 244,  448 => 240,  438 => 236,  436 => 235,  428 => 230,  422 => 184,  418 => 224,  412 => 222,  410 => 221,  400 => 214,  397 => 213,  383 => 207,  380 => 160,  376 => 205,  361 => 146,  351 => 141,  347 => 191,  329 => 131,  313 => 183,  300 => 121,  297 => 104,  295 => 178,  288 => 118,  205 => 108,  197 => 71,  170 => 56,  191 => 69,  178 => 64,  175 => 58,  134 => 47,  113 => 38,  367 => 155,  353 => 149,  350 => 327,  306 => 107,  53 => 11,  20 => 1,  330 => 103,  324 => 113,  321 => 135,  318 => 111,  311 => 96,  308 => 287,  270 => 102,  267 => 101,  259 => 103,  249 => 71,  234 => 65,  225 => 62,  222 => 83,  206 => 53,  188 => 90,  155 => 47,  129 => 24,  161 => 63,  126 => 23,  97 => 28,  81 => 30,  77 => 20,  84 => 24,  127 => 35,  110 => 32,  58 => 14,  160 => 53,  150 => 55,  137 => 44,  118 => 49,  76 => 17,  332 => 116,  328 => 139,  317 => 185,  307 => 128,  304 => 181,  301 => 93,  282 => 85,  275 => 105,  263 => 95,  260 => 93,  257 => 92,  242 => 67,  231 => 83,  216 => 79,  213 => 78,  194 => 70,  184 => 63,  181 => 65,  148 => 32,  104 => 32,  65 => 22,  334 => 141,  327 => 114,  320 => 127,  310 => 112,  302 => 125,  290 => 119,  286 => 112,  277 => 83,  272 => 104,  245 => 79,  236 => 76,  232 => 88,  226 => 84,  218 => 69,  211 => 55,  202 => 94,  195 => 65,  192 => 64,  186 => 63,  172 => 62,  153 => 56,  124 => 37,  114 => 36,  100 => 39,  90 => 27,  70 => 19,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 245,  453 => 199,  444 => 238,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 215,  398 => 129,  393 => 211,  387 => 164,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 197,  362 => 110,  360 => 109,  355 => 143,  341 => 118,  337 => 123,  322 => 101,  314 => 99,  312 => 124,  309 => 129,  305 => 95,  298 => 120,  294 => 109,  285 => 175,  283 => 115,  278 => 106,  268 => 95,  264 => 84,  258 => 94,  252 => 80,  247 => 78,  241 => 90,  229 => 85,  220 => 81,  214 => 69,  177 => 65,  169 => 53,  140 => 58,  132 => 25,  128 => 39,  107 => 41,  61 => 12,  273 => 174,  269 => 107,  254 => 73,  243 => 92,  240 => 86,  238 => 66,  235 => 89,  230 => 82,  227 => 86,  224 => 81,  221 => 77,  219 => 60,  217 => 75,  208 => 76,  204 => 78,  179 => 98,  159 => 90,  143 => 51,  135 => 42,  119 => 40,  102 => 33,  71 => 23,  67 => 18,  63 => 18,  59 => 17,  28 => 3,  87 => 41,  38 => 6,  201 => 106,  196 => 92,  183 => 44,  171 => 63,  166 => 54,  163 => 53,  158 => 80,  156 => 58,  151 => 59,  142 => 30,  138 => 54,  136 => 71,  121 => 50,  117 => 39,  105 => 34,  91 => 29,  62 => 27,  49 => 11,  26 => 3,  94 => 21,  89 => 35,  85 => 26,  75 => 22,  68 => 20,  56 => 14,  31 => 5,  25 => 4,  21 => 2,  24 => 3,  19 => 1,  93 => 27,  88 => 28,  78 => 24,  46 => 10,  44 => 8,  27 => 3,  79 => 18,  72 => 21,  69 => 21,  47 => 10,  40 => 11,  37 => 7,  22 => 2,  246 => 93,  157 => 89,  145 => 74,  139 => 49,  131 => 45,  123 => 42,  120 => 31,  115 => 34,  111 => 47,  108 => 47,  101 => 31,  98 => 45,  96 => 30,  83 => 33,  74 => 19,  66 => 25,  55 => 12,  52 => 13,  50 => 10,  43 => 9,  41 => 7,  35 => 5,  32 => 6,  29 => 3,  209 => 82,  203 => 73,  199 => 93,  193 => 73,  189 => 66,  187 => 75,  182 => 87,  176 => 63,  173 => 85,  168 => 61,  164 => 36,  162 => 59,  154 => 60,  149 => 51,  147 => 54,  144 => 42,  141 => 51,  133 => 43,  130 => 46,  125 => 42,  122 => 41,  116 => 39,  112 => 36,  109 => 27,  106 => 51,  103 => 28,  99 => 31,  95 => 39,  92 => 43,  86 => 22,  82 => 25,  80 => 24,  73 => 20,  64 => 19,  60 => 20,  57 => 19,  54 => 15,  51 => 13,  48 => 11,  45 => 9,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
