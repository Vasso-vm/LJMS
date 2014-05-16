<?php

/* WebProfilerBundle:Collector:exception.css.twig */
class __TwigTemplate_8fd680e8f3976660d92724c127e300f3fbb233600c3aebcfd5770cf9182e718a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo ".sf-reset .traces {
    padding-bottom: 14px;
}
.sf-reset .traces li {
    font-size: 12px;
    color: #868686;
    padding: 5px 4px;
    list-style-type: decimal;
    margin-left: 20px;
    white-space: break-word;
}
.sf-reset #logs .traces li.error {
    font-style: normal;
    color: #AA3333;
    background: #f9ecec;
}
.sf-reset #logs .traces li.warning {
    font-style: normal;
    background: #ffcc00;
}
/* fix for Opera not liking empty <li> */
.sf-reset .traces li:after {
    content: \"\\00A0\";
}
.sf-reset .trace {
    border: 1px solid #D3D3D3;
    padding: 10px;
    overflow: auto;
    margin: 10px 0 20px;
}
.sf-reset .block-exception {
    border-radius: 16px;
    margin-bottom: 20px;
    background-color: #f6f6f6;
    border: 1px solid #dfdfdf;
    padding: 30px 28px;
    word-wrap: break-word;
    overflow: hidden;
}
.sf-reset .block-exception div {
    color: #313131;
    font-size: 10px;
}
.sf-reset .block-exception-detected .illustration-exception,
.sf-reset .block-exception-detected .text-exception {
    float: left;
}
.sf-reset .block-exception-detected .illustration-exception {
    width: 152px;
}
.sf-reset .block-exception-detected .text-exception {
    width: 670px;
    padding: 30px 44px 24px 46px;
    position: relative;
}
.sf-reset .text-exception .open-quote,
.sf-reset .text-exception .close-quote {
    position: absolute;
}
.sf-reset .open-quote {
    top: 0;
    left: 0;
}
.sf-reset .close-quote {
    bottom: 0;
    right: 50px;
}
.sf-reset .block-exception p {
    font-family: Arial, Helvetica, sans-serif;
}
.sf-reset .block-exception p a,
.sf-reset .block-exception p a:hover {
    color: #565656;
}
.sf-reset .logs h2 {
    float: left;
    width: 654px;
}
.sf-reset .error-count {
    float: right;
    width: 170px;
    text-align: right;
}
.sf-reset .error-count span {
    display: inline-block;
    background-color: #aacd4e;
    border-radius: 6px;
    padding: 4px;
    color: white;
    margin-right: 2px;
    font-size: 11px;
    font-weight: bold;
}
.sf-reset .toggle {
    vertical-align: middle;
}
.sf-reset .linked ul,
.sf-reset .linked li {
    display: inline;
}
.sf-reset #output-content {
    color: #000;
    font-size: 12px;
}
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.css.twig";
    }

    public function getDebugInfo()
    {
        return array (  810 => 492,  807 => 491,  796 => 489,  792 => 488,  788 => 486,  775 => 485,  749 => 479,  746 => 478,  727 => 476,  710 => 475,  706 => 473,  702 => 472,  698 => 471,  694 => 470,  690 => 469,  686 => 468,  682 => 467,  679 => 466,  677 => 465,  649 => 462,  634 => 456,  625 => 453,  620 => 451,  601 => 446,  567 => 414,  549 => 411,  532 => 410,  529 => 409,  517 => 404,  165 => 83,  363 => 126,  357 => 123,  344 => 119,  315 => 110,  303 => 106,  291 => 102,  274 => 97,  265 => 96,  255 => 93,  212 => 78,  190 => 76,  185 => 74,  174 => 65,  672 => 345,  668 => 344,  664 => 342,  660 => 464,  651 => 337,  647 => 336,  644 => 335,  640 => 334,  631 => 327,  629 => 454,  626 => 325,  622 => 452,  613 => 320,  609 => 319,  606 => 449,  602 => 317,  593 => 310,  591 => 309,  588 => 308,  585 => 307,  581 => 305,  577 => 303,  569 => 300,  563 => 298,  559 => 296,  557 => 295,  552 => 293,  548 => 292,  545 => 291,  541 => 290,  533 => 284,  531 => 283,  527 => 408,  525 => 280,  522 => 406,  519 => 278,  515 => 276,  509 => 272,  505 => 270,  499 => 268,  497 => 267,  489 => 262,  483 => 258,  479 => 256,  473 => 254,  471 => 253,  465 => 249,  463 => 248,  459 => 246,  454 => 244,  448 => 240,  438 => 236,  436 => 235,  428 => 230,  422 => 226,  418 => 224,  412 => 222,  410 => 221,  400 => 214,  397 => 213,  383 => 207,  380 => 206,  376 => 205,  361 => 195,  351 => 120,  347 => 191,  329 => 188,  313 => 183,  300 => 105,  297 => 104,  295 => 178,  288 => 101,  205 => 108,  197 => 104,  170 => 84,  191 => 67,  178 => 66,  175 => 65,  134 => 54,  113 => 48,  367 => 198,  353 => 121,  350 => 327,  306 => 107,  53 => 17,  20 => 1,  330 => 103,  324 => 113,  321 => 112,  318 => 111,  311 => 96,  308 => 287,  270 => 81,  267 => 80,  259 => 75,  249 => 71,  234 => 65,  225 => 62,  222 => 61,  206 => 53,  188 => 90,  155 => 34,  129 => 24,  161 => 63,  126 => 23,  97 => 28,  81 => 3,  77 => 20,  84 => 40,  127 => 40,  110 => 32,  58 => 25,  160 => 53,  150 => 51,  137 => 44,  118 => 49,  76 => 25,  332 => 116,  328 => 120,  317 => 185,  307 => 105,  304 => 181,  301 => 93,  282 => 85,  275 => 96,  263 => 95,  260 => 93,  257 => 92,  242 => 67,  231 => 83,  216 => 82,  213 => 81,  194 => 74,  184 => 101,  181 => 71,  148 => 32,  104 => 32,  65 => 22,  334 => 120,  327 => 114,  320 => 114,  310 => 112,  302 => 111,  290 => 87,  286 => 86,  277 => 83,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 55,  202 => 94,  195 => 65,  192 => 64,  186 => 63,  172 => 64,  153 => 77,  124 => 37,  114 => 36,  100 => 39,  90 => 42,  70 => 26,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 245,  453 => 151,  444 => 238,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 215,  398 => 129,  393 => 211,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 197,  362 => 110,  360 => 109,  355 => 329,  341 => 118,  337 => 123,  322 => 101,  314 => 99,  312 => 109,  309 => 108,  305 => 95,  298 => 92,  294 => 109,  285 => 175,  283 => 100,  278 => 98,  268 => 95,  264 => 84,  258 => 94,  252 => 80,  247 => 78,  241 => 77,  229 => 63,  220 => 70,  214 => 69,  177 => 65,  169 => 53,  140 => 58,  132 => 25,  128 => 39,  107 => 41,  61 => 17,  273 => 174,  269 => 94,  254 => 73,  243 => 92,  240 => 86,  238 => 66,  235 => 85,  230 => 82,  227 => 81,  224 => 81,  221 => 77,  219 => 60,  217 => 75,  208 => 67,  204 => 78,  179 => 98,  159 => 90,  143 => 51,  135 => 42,  119 => 40,  102 => 40,  71 => 23,  67 => 20,  63 => 18,  59 => 11,  28 => 3,  87 => 41,  38 => 18,  201 => 106,  196 => 92,  183 => 44,  171 => 63,  166 => 95,  163 => 82,  158 => 80,  156 => 62,  151 => 59,  142 => 30,  138 => 54,  136 => 71,  121 => 50,  117 => 39,  105 => 14,  91 => 33,  62 => 27,  49 => 11,  26 => 3,  94 => 25,  89 => 30,  85 => 24,  75 => 19,  68 => 30,  56 => 16,  31 => 4,  25 => 4,  21 => 2,  24 => 3,  19 => 1,  93 => 27,  88 => 32,  78 => 18,  46 => 10,  44 => 20,  27 => 3,  79 => 21,  72 => 18,  69 => 17,  47 => 21,  40 => 11,  37 => 7,  22 => 2,  246 => 136,  157 => 89,  145 => 74,  139 => 49,  131 => 45,  123 => 61,  120 => 40,  115 => 34,  111 => 47,  108 => 47,  101 => 31,  98 => 45,  96 => 37,  83 => 33,  74 => 19,  66 => 25,  55 => 13,  52 => 12,  50 => 22,  43 => 12,  41 => 19,  35 => 6,  32 => 6,  29 => 3,  209 => 82,  203 => 78,  199 => 93,  193 => 73,  189 => 73,  187 => 75,  182 => 87,  176 => 86,  173 => 85,  168 => 38,  164 => 36,  162 => 54,  154 => 60,  149 => 51,  147 => 75,  144 => 48,  141 => 73,  133 => 43,  130 => 49,  125 => 42,  122 => 41,  116 => 57,  112 => 36,  109 => 52,  106 => 51,  103 => 28,  99 => 31,  95 => 39,  92 => 43,  86 => 22,  82 => 28,  80 => 27,  73 => 24,  64 => 13,  60 => 20,  57 => 19,  54 => 19,  51 => 37,  48 => 16,  45 => 9,  42 => 11,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
