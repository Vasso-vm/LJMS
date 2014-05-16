<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_114f657205b8dee5aa76bf01a673bf0c5f8599e9aac5dc8d383c913a37c88b96 extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "logs"));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute($this->getContext($context, "log"), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute($this->getContext($context, "log"), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  87 => 20,  55 => 13,  25 => 4,  21 => 2,  75 => 17,  68 => 14,  56 => 9,  50 => 8,  41 => 9,  24 => 3,  201 => 92,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  101 => 24,  91 => 31,  86 => 28,  69 => 25,  62 => 23,  51 => 12,  39 => 6,  19 => 1,  93 => 9,  88 => 6,  80 => 19,  46 => 7,  44 => 10,  32 => 12,  27 => 4,  22 => 2,  43 => 8,  40 => 8,  169 => 53,  162 => 54,  160 => 53,  154 => 49,  150 => 47,  144 => 45,  141 => 44,  137 => 42,  131 => 40,  124 => 37,  118 => 35,  115 => 43,  111 => 32,  105 => 40,  102 => 29,  98 => 40,  92 => 21,  89 => 20,  85 => 19,  79 => 18,  76 => 19,  66 => 15,  64 => 12,  57 => 14,  54 => 21,  49 => 19,  36 => 7,  33 => 5,  30 => 3,  604 => 163,  599 => 160,  586 => 158,  573 => 157,  570 => 156,  557 => 154,  554 => 153,  551 => 152,  532 => 149,  525 => 148,  520 => 147,  505 => 144,  502 => 143,  489 => 141,  478 => 140,  476 => 139,  472 => 137,  470 => 136,  465 => 133,  456 => 129,  442 => 127,  438 => 126,  432 => 125,  429 => 124,  415 => 122,  411 => 121,  407 => 120,  403 => 118,  400 => 117,  391 => 115,  386 => 114,  383 => 113,  380 => 112,  371 => 110,  366 => 109,  363 => 108,  351 => 107,  347 => 106,  343 => 104,  340 => 103,  331 => 101,  326 => 100,  323 => 99,  320 => 98,  311 => 96,  306 => 95,  303 => 94,  300 => 93,  291 => 91,  286 => 90,  283 => 89,  279 => 88,  275 => 86,  271 => 84,  268 => 83,  264 => 81,  261 => 80,  258 => 79,  249 => 78,  246 => 77,  243 => 76,  240 => 75,  231 => 74,  228 => 73,  226 => 72,  223 => 71,  219 => 70,  217 => 69,  212 => 67,  208 => 66,  204 => 65,  200 => 64,  191 => 63,  187 => 84,  164 => 46,  158 => 67,  149 => 43,  143 => 42,  134 => 40,  128 => 39,  119 => 37,  113 => 36,  99 => 25,  94 => 22,  84 => 18,  78 => 40,  72 => 16,  67 => 13,  52 => 11,  48 => 10,  42 => 5,  35 => 4,  31 => 5,  28 => 2,);
    }
}
