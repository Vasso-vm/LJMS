<?php

/* TwigBundle:Exception:traces.html.twig */
class __TwigTemplate_471f7f408298ba2280bbec606a2c2a16795c8fecf992c033c7a723d5bfe730cc extends Twig_Template
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
        echo "<div class=\"block\">
    ";
        // line 2
        if (($this->getContext($context, "count") > 0)) {
            // line 3
            echo "        <h2>
            <span><small>[";
            // line 4
            echo twig_escape_filter($this->env, (($this->getContext($context, "count") - $this->getContext($context, "position")) + 1), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, ($this->getContext($context, "count") + 1), "html", null, true);
            echo "]</small></span>
            ";
            // line 5
            echo $this->env->getExtension('code')->abbrClass($this->getAttribute($this->getContext($context, "exception"), "class"));
            echo ": ";
            echo $this->env->getExtension('code')->formatFileFromText(nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "message"), "html", null, true)));
            echo "&nbsp;
            ";
            // line 6
            ob_start();
            // line 7
            echo "            <a href=\"#\" onclick=\"toggle('traces-";
            echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
            echo "', 'traces'); switchIcons('icon-traces-";
            echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
            echo "-open', 'icon-traces-";
            echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
            echo "-close'); return false;\">
                <img class=\"toggle\" id=\"icon-traces-";
            // line 8
            echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
            echo "-close\" alt=\"-\" src=\"data:image/gif;base64,R0lGODlhEgASAMQSANft94TG57Hb8GS44ez1+mC24IvK6ePx+Wa44dXs92+942e54o3L6W2844/M6dnu+P/+/l614P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABIALAAAAAASABIAQAVCoCQBTBOd6Kk4gJhGBCTPxysJb44K0qD/ER/wlxjmisZkMqBEBW5NHrMZmVKvv9hMVsO+hE0EoNAstEYGxG9heIhCADs=\" style=\"display: ";
            echo (((0 == $this->getContext($context, "count"))) ? ("inline") : ("none"));
            echo "\" />
                <img class=\"toggle\" id=\"icon-traces-";
            // line 9
            echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
            echo "-open\" alt=\"+\" src=\"data:image/gif;base64,R0lGODlhEgASAMQTANft99/v+Ga44bHb8ITG52S44dXs9+z1+uPx+YvK6WC24G+944/M6W28443L6dnu+Ge54v/+/l614P///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABMALAAAAAASABIAQAVS4DQBTiOd6LkwgJgeUSzHSDoNaZ4PU6FLgYBA5/vFID/DbylRGiNIZu74I0h1hNsVxbNuUV4d9SsZM2EzWe1qThVzwWFOAFCQFa1RQq6DJB4iIQA7\" style=\"display: ";
            echo (((0 == $this->getContext($context, "count"))) ? ("none") : ("inline"));
            echo "\" />
            </a>
            ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 12
            echo "        </h2>
    ";
        } else {
            // line 14
            echo "        <h2>Stack Trace</h2>
    ";
        }
        // line 16
        echo "
    <a id=\"traces-link-";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
        echo "\"></a>
    <ol class=\"traces list-exception\" id=\"traces-";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "position"), "html", null, true);
        echo "\" style=\"display: ";
        echo (((0 == $this->getContext($context, "count"))) ? ("block") : ("none"));
        echo "\">
        ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "exception"), "trace"));
        foreach ($context['_seq'] as $context["i"] => $context["trace"]) {
            // line 20
            echo "            <li>
                ";
            // line 21
            $this->env->loadTemplate("TwigBundle:Exception:trace.html.twig")->display(array("prefix" => $this->getContext($context, "position"), "i" => $this->getContext($context, "i"), "trace" => $this->getContext($context, "trace")));
            // line 22
            echo "            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['trace'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </ol>
</div>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 17,  68 => 14,  56 => 9,  50 => 8,  41 => 7,  24 => 3,  201 => 92,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  168 => 72,  166 => 71,  163 => 70,  156 => 66,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  101 => 24,  91 => 31,  86 => 28,  69 => 25,  62 => 23,  51 => 20,  39 => 6,  19 => 1,  93 => 9,  88 => 6,  80 => 41,  46 => 10,  44 => 9,  32 => 12,  27 => 4,  22 => 2,  43 => 8,  40 => 8,  169 => 53,  162 => 54,  160 => 53,  154 => 49,  150 => 47,  144 => 45,  141 => 44,  137 => 42,  131 => 40,  124 => 37,  118 => 35,  115 => 43,  111 => 32,  105 => 40,  102 => 29,  98 => 40,  92 => 21,  89 => 20,  85 => 19,  79 => 18,  76 => 19,  66 => 24,  64 => 12,  57 => 12,  54 => 21,  49 => 19,  36 => 7,  33 => 5,  30 => 3,  604 => 163,  599 => 160,  586 => 158,  573 => 157,  570 => 156,  557 => 154,  554 => 153,  551 => 152,  532 => 149,  525 => 148,  520 => 147,  505 => 144,  502 => 143,  489 => 141,  478 => 140,  476 => 139,  472 => 137,  470 => 136,  465 => 133,  456 => 129,  442 => 127,  438 => 126,  432 => 125,  429 => 124,  415 => 122,  411 => 121,  407 => 120,  403 => 118,  400 => 117,  391 => 115,  386 => 114,  383 => 113,  380 => 112,  371 => 110,  366 => 109,  363 => 108,  351 => 107,  347 => 106,  343 => 104,  340 => 103,  331 => 101,  326 => 100,  323 => 99,  320 => 98,  311 => 96,  306 => 95,  303 => 94,  300 => 93,  291 => 91,  286 => 90,  283 => 89,  279 => 88,  275 => 86,  271 => 84,  268 => 83,  264 => 81,  261 => 80,  258 => 79,  249 => 78,  246 => 77,  243 => 76,  240 => 75,  231 => 74,  228 => 73,  226 => 72,  223 => 71,  219 => 70,  217 => 69,  212 => 67,  208 => 66,  204 => 65,  200 => 64,  191 => 63,  187 => 84,  164 => 46,  158 => 67,  149 => 43,  143 => 42,  134 => 40,  128 => 39,  119 => 37,  113 => 36,  99 => 25,  94 => 22,  84 => 18,  78 => 40,  72 => 16,  67 => 13,  52 => 11,  48 => 10,  42 => 5,  35 => 5,  31 => 3,  28 => 2,);
    }
}
