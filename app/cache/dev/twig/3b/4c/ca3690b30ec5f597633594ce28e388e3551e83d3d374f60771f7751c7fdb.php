<?php

/* SensioDistributionBundle:Configurator:final.html.twig */
class __TwigTemplate_3b4cca3690b30ec5f597633594ce28e388e3551e83d3d374f60771f7751c7fdb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'content_class' => array($this, 'block_content_class'),
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
    public function block_content_class($context, array $blocks = array())
    {
        echo "config_done";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"step\">
        <h1>Well done!</h1>
        ";
        // line 7
        if ($this->getContext($context, "is_writable")) {
            // line 8
            echo "        <h2>Your distribution is configured!</h2>
        ";
        } else {
            // line 10
            echo "        <h2 class=\"configure-error\">Your distribution is almost configured but...</h2>
        ";
        }
        // line 12
        echo "        <h3>
            <span>
                ";
        // line 14
        if ($this->getContext($context, "is_writable")) {
            // line 15
            echo "                    Your parameters.yml file has been overwritten with these parameters (in <em>";
            echo twig_escape_filter($this->env, $this->getContext($context, "yml_path"), "html", null, true);
            echo "</em>):
                ";
        } else {
            // line 17
            echo "                    Your parameters.yml file is not writeable! Here are the parameters you can copy and paste in <em>";
            echo twig_escape_filter($this->env, $this->getContext($context, "yml_path"), "html", null, true);
            echo "</em>:
                ";
        }
        // line 19
        echo "            </span>
        </h3>

        <textarea class=\"symfony-configuration\">";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, "parameters"), "html", null, true);
        echo "</textarea>

        ";
        // line 24
        if ($this->getContext($context, "welcome_url")) {
            // line 25
            echo "            <ul>
                <li><a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getContext($context, "welcome_url"), "html", null, true);
            echo "\">Go to the Welcome page</a></li>
            </ul>
        ";
        }
        // line 29
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:final.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  462 => 202,  449 => 198,  446 => 197,  441 => 196,  439 => 195,  431 => 189,  429 => 188,  415 => 180,  408 => 176,  401 => 172,  394 => 168,  373 => 156,  348 => 140,  342 => 137,  338 => 135,  335 => 134,  325 => 129,  323 => 128,  289 => 113,  262 => 98,  256 => 96,  233 => 87,  207 => 75,  200 => 72,  389 => 160,  386 => 159,  378 => 157,  371 => 156,  358 => 151,  345 => 147,  343 => 146,  340 => 145,  331 => 140,  326 => 138,  296 => 121,  293 => 120,  281 => 114,  276 => 111,  253 => 100,  248 => 94,  210 => 77,  152 => 46,  810 => 492,  807 => 491,  796 => 489,  792 => 488,  788 => 486,  775 => 485,  749 => 479,  746 => 478,  727 => 476,  710 => 475,  706 => 473,  702 => 472,  698 => 471,  694 => 470,  690 => 469,  686 => 468,  682 => 467,  679 => 466,  677 => 465,  649 => 462,  634 => 456,  625 => 453,  620 => 451,  601 => 446,  567 => 414,  549 => 411,  532 => 410,  529 => 409,  517 => 404,  165 => 60,  363 => 153,  357 => 123,  344 => 119,  315 => 125,  303 => 122,  291 => 102,  274 => 110,  265 => 105,  255 => 101,  212 => 78,  190 => 76,  185 => 66,  174 => 65,  672 => 345,  668 => 344,  664 => 342,  660 => 464,  651 => 337,  647 => 336,  644 => 335,  640 => 334,  631 => 327,  629 => 454,  626 => 325,  622 => 452,  613 => 320,  609 => 319,  606 => 449,  602 => 317,  593 => 310,  591 => 309,  588 => 308,  585 => 307,  581 => 305,  577 => 303,  569 => 300,  563 => 298,  559 => 296,  557 => 295,  552 => 293,  548 => 292,  545 => 291,  541 => 290,  533 => 284,  531 => 283,  527 => 408,  525 => 280,  522 => 406,  519 => 278,  515 => 276,  509 => 272,  505 => 270,  499 => 268,  497 => 267,  489 => 262,  483 => 258,  479 => 256,  473 => 254,  471 => 253,  465 => 249,  463 => 248,  459 => 246,  454 => 244,  448 => 240,  438 => 236,  436 => 235,  428 => 230,  422 => 184,  418 => 224,  412 => 222,  410 => 221,  400 => 214,  397 => 213,  383 => 207,  380 => 160,  376 => 205,  361 => 146,  351 => 141,  347 => 191,  329 => 131,  313 => 183,  300 => 121,  297 => 104,  295 => 178,  288 => 118,  205 => 108,  197 => 71,  170 => 56,  191 => 69,  178 => 64,  175 => 58,  134 => 47,  113 => 38,  367 => 155,  353 => 149,  350 => 327,  306 => 107,  53 => 12,  20 => 1,  330 => 103,  324 => 113,  321 => 135,  318 => 111,  311 => 96,  308 => 287,  270 => 102,  267 => 101,  259 => 103,  249 => 71,  234 => 65,  225 => 62,  222 => 83,  206 => 53,  188 => 90,  155 => 47,  129 => 24,  161 => 63,  126 => 23,  97 => 28,  81 => 23,  77 => 20,  84 => 24,  127 => 35,  110 => 32,  58 => 15,  160 => 53,  150 => 55,  137 => 44,  118 => 49,  76 => 17,  332 => 116,  328 => 139,  317 => 185,  307 => 128,  304 => 181,  301 => 93,  282 => 85,  275 => 105,  263 => 95,  260 => 93,  257 => 92,  242 => 67,  231 => 83,  216 => 79,  213 => 78,  194 => 70,  184 => 63,  181 => 65,  148 => 32,  104 => 32,  65 => 22,  334 => 141,  327 => 114,  320 => 127,  310 => 112,  302 => 125,  290 => 119,  286 => 112,  277 => 83,  272 => 104,  245 => 79,  236 => 76,  232 => 88,  226 => 84,  218 => 69,  211 => 55,  202 => 94,  195 => 65,  192 => 64,  186 => 63,  172 => 62,  153 => 56,  124 => 37,  114 => 36,  100 => 39,  90 => 27,  70 => 19,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 245,  453 => 199,  444 => 238,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 215,  398 => 129,  393 => 211,  387 => 164,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 197,  362 => 110,  360 => 109,  355 => 143,  341 => 118,  337 => 123,  322 => 101,  314 => 99,  312 => 124,  309 => 129,  305 => 95,  298 => 120,  294 => 109,  285 => 175,  283 => 115,  278 => 106,  268 => 95,  264 => 84,  258 => 94,  252 => 80,  247 => 78,  241 => 90,  229 => 85,  220 => 81,  214 => 69,  177 => 65,  169 => 53,  140 => 58,  132 => 25,  128 => 39,  107 => 41,  61 => 12,  273 => 174,  269 => 107,  254 => 73,  243 => 92,  240 => 86,  238 => 66,  235 => 89,  230 => 82,  227 => 86,  224 => 81,  221 => 77,  219 => 60,  217 => 75,  208 => 76,  204 => 78,  179 => 98,  159 => 90,  143 => 51,  135 => 42,  119 => 40,  102 => 33,  71 => 23,  67 => 18,  63 => 18,  59 => 14,  28 => 3,  87 => 41,  38 => 5,  201 => 106,  196 => 92,  183 => 44,  171 => 63,  166 => 54,  163 => 53,  158 => 80,  156 => 58,  151 => 59,  142 => 30,  138 => 54,  136 => 71,  121 => 50,  117 => 39,  105 => 34,  91 => 29,  62 => 27,  49 => 11,  26 => 3,  94 => 21,  89 => 30,  85 => 26,  75 => 22,  68 => 30,  56 => 14,  31 => 4,  25 => 4,  21 => 2,  24 => 3,  19 => 1,  93 => 27,  88 => 32,  78 => 18,  46 => 10,  44 => 8,  27 => 3,  79 => 18,  72 => 18,  69 => 17,  47 => 8,  40 => 11,  37 => 7,  22 => 2,  246 => 93,  157 => 89,  145 => 74,  139 => 49,  131 => 45,  123 => 42,  120 => 31,  115 => 34,  111 => 47,  108 => 47,  101 => 31,  98 => 45,  96 => 30,  83 => 33,  74 => 19,  66 => 25,  55 => 9,  52 => 12,  50 => 22,  43 => 9,  41 => 19,  35 => 4,  32 => 6,  29 => 3,  209 => 82,  203 => 73,  199 => 93,  193 => 73,  189 => 66,  187 => 75,  182 => 87,  176 => 63,  173 => 85,  168 => 61,  164 => 36,  162 => 59,  154 => 60,  149 => 51,  147 => 54,  144 => 42,  141 => 51,  133 => 43,  130 => 46,  125 => 42,  122 => 41,  116 => 39,  112 => 36,  109 => 27,  106 => 51,  103 => 28,  99 => 31,  95 => 39,  92 => 43,  86 => 22,  82 => 25,  80 => 24,  73 => 20,  64 => 17,  60 => 20,  57 => 19,  54 => 19,  51 => 13,  48 => 10,  45 => 10,  42 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
