<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_3423d066c19f0bc12da4f780dad90f51713ce066520d2d10852a1bfab5fac741 extends Twig_Template
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
        if (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "trace"))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "exception"), "trace"));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->env->loadTemplate("TwigBundle:Exception:trace.txt.twig")->display(array("trace" => $this->getContext($context, "trace")));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 13,  26 => 5,  87 => 20,  55 => 13,  25 => 3,  21 => 2,  75 => 17,  68 => 14,  56 => 9,  50 => 8,  41 => 9,  24 => 4,  201 => 92,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  101 => 24,  91 => 31,  86 => 28,  69 => 25,  62 => 23,  51 => 15,  39 => 6,  19 => 1,  93 => 9,  88 => 6,  80 => 19,  46 => 7,  44 => 10,  32 => 12,  27 => 4,  22 => 2,  43 => 8,  40 => 8,  169 => 53,  162 => 54,  160 => 53,  154 => 49,  150 => 47,  144 => 45,  141 => 44,  137 => 42,  131 => 40,  124 => 37,  118 => 35,  115 => 43,  111 => 32,  105 => 40,  102 => 29,  98 => 40,  92 => 21,  89 => 20,  85 => 19,  79 => 18,  76 => 19,  66 => 15,  64 => 12,  57 => 16,  54 => 21,  49 => 19,  36 => 7,  33 => 10,  30 => 3,  604 => 163,  599 => 160,  586 => 158,  573 => 157,  570 => 156,  557 => 154,  554 => 153,  551 => 152,  532 => 149,  525 => 148,  520 => 147,  505 => 144,  502 => 143,  489 => 141,  478 => 140,  476 => 139,  472 => 137,  470 => 136,  465 => 133,  456 => 129,  442 => 127,  438 => 126,  432 => 125,  429 => 124,  415 => 122,  411 => 121,  407 => 120,  403 => 118,  400 => 117,  391 => 115,  386 => 114,  383 => 113,  380 => 112,  371 => 110,  366 => 109,  363 => 108,  351 => 107,  347 => 106,  343 => 104,  340 => 103,  331 => 101,  326 => 100,  323 => 99,  320 => 98,  311 => 96,  306 => 95,  303 => 94,  300 => 93,  291 => 91,  286 => 90,  283 => 89,  279 => 88,  275 => 86,  271 => 84,  268 => 83,  264 => 81,  261 => 80,  258 => 79,  249 => 78,  246 => 77,  243 => 76,  240 => 75,  231 => 74,  228 => 73,  226 => 72,  223 => 71,  219 => 70,  217 => 69,  212 => 67,  208 => 66,  204 => 65,  200 => 64,  191 => 63,  187 => 84,  164 => 46,  158 => 67,  149 => 43,  143 => 42,  134 => 40,  128 => 39,  119 => 37,  113 => 36,  99 => 25,  94 => 22,  84 => 18,  78 => 40,  72 => 16,  67 => 13,  52 => 11,  48 => 10,  42 => 14,  35 => 4,  31 => 5,  28 => 2,);
    }
}
