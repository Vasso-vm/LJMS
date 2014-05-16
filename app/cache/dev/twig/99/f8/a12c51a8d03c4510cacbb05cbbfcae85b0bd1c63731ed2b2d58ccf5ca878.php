<?php

/* WebProfilerBundle:Router:panel.html.twig */
class __TwigTemplate_99f8a12c51a8d03c4510cacbb05cbbfcae85b0bd1c63731ed2b2d58ccf5ca878 extends Twig_Template
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
        echo "<h2>Routing for \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "request"), "pathinfo"), "html", null, true);
        echo "\"</h2>

<ul>
    <li>
        <strong>Route:&nbsp;</strong>
        ";
        // line 6
        if ($this->getAttribute($this->getContext($context, "request"), "route")) {
            // line 7
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "request"), "route"), "html", null, true);
            echo "
        ";
        } else {
            // line 9
            echo "            <em>No matching route</em>
        ";
        }
        // line 11
        echo "    </li>
    <li>
        <strong>Route parameters:&nbsp;</strong>
        ";
        // line 14
        if (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "request"), "routeParams"))) {
            // line 15
            echo "            ";
            $this->env->loadTemplate("@WebProfiler/Profiler/table.html.twig")->display(array("data" => $this->getAttribute($this->getContext($context, "request"), "routeParams"), "class" => "inline"));
            // line 16
            echo "        ";
        } else {
            // line 17
            echo "            <em>No parameters</em>
        ";
        }
        // line 19
        echo "    </li>
    ";
        // line 20
        if ($this->getAttribute($this->getContext($context, "router"), "redirect")) {
            // line 21
            echo "    <li>
        <strong>Redirecting to:&nbsp;</strong> \"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "router"), "targetUrl"), "html", null, true);
            echo "\" ";
            if ($this->getAttribute($this->getContext($context, "router"), "targetRoute")) {
                echo "(route: \"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "router"), "targetRoute"), "html", null, true);
                echo "\")";
            }
            // line 23
            echo "    <li>
    ";
        }
        // line 25
        echo "    <li>
        <strong>Route matching logs</strong>
        <table class=\"routing inline\">
            <tr>
                <th>Route name</th>
                <th>Pattern</th>
                <th>Log</th>
            </tr>
            ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "traces"));
        foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
            // line 34
            echo "                <tr class=\"";
            echo (((1 == $this->getAttribute($this->getContext($context, "trace"), "level"))) ? ("almost") : ((((2 == $this->getAttribute($this->getContext($context, "trace"), "level"))) ? ("matches") : (""))));
            echo "\">
                    <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "name"), "html", null, true);
            echo "</td>
                    <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "path"), "html", null, true);
            echo "</td>
                    <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "log"), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "        </table>
        <em><small>Note: The above matching is based on the configuration for the current router which might differ from
        the configuration used while routing this request.</small></em>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Router:panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 40,  367 => 339,  353 => 328,  350 => 327,  306 => 286,  53 => 17,  20 => 1,  330 => 103,  324 => 101,  321 => 100,  318 => 99,  311 => 96,  308 => 287,  270 => 81,  267 => 80,  259 => 75,  249 => 71,  234 => 65,  225 => 62,  222 => 61,  206 => 53,  188 => 46,  155 => 34,  129 => 24,  161 => 56,  126 => 23,  97 => 28,  81 => 3,  77 => 25,  84 => 27,  127 => 40,  110 => 32,  58 => 18,  160 => 53,  150 => 51,  137 => 44,  118 => 37,  76 => 28,  332 => 121,  328 => 120,  317 => 113,  307 => 105,  304 => 104,  301 => 93,  282 => 85,  275 => 96,  263 => 94,  260 => 93,  257 => 92,  242 => 67,  231 => 85,  216 => 82,  213 => 81,  194 => 74,  184 => 72,  181 => 71,  148 => 32,  104 => 37,  65 => 22,  334 => 120,  327 => 116,  320 => 114,  310 => 112,  302 => 111,  290 => 87,  286 => 86,  277 => 83,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 55,  202 => 52,  195 => 65,  192 => 64,  186 => 63,  172 => 59,  153 => 51,  124 => 37,  114 => 36,  100 => 36,  90 => 37,  70 => 26,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 329,  341 => 105,  337 => 123,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 92,  294 => 109,  285 => 89,  283 => 106,  278 => 86,  268 => 95,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 63,  220 => 70,  214 => 69,  177 => 65,  169 => 53,  140 => 51,  132 => 25,  128 => 39,  107 => 41,  61 => 23,  273 => 82,  269 => 94,  254 => 73,  243 => 88,  240 => 86,  238 => 66,  235 => 74,  230 => 82,  227 => 81,  224 => 84,  221 => 77,  219 => 60,  217 => 75,  208 => 67,  204 => 78,  179 => 43,  159 => 61,  143 => 47,  135 => 42,  119 => 42,  102 => 33,  71 => 23,  67 => 22,  63 => 21,  59 => 22,  28 => 6,  87 => 33,  38 => 6,  201 => 92,  196 => 50,  183 => 44,  171 => 63,  166 => 58,  163 => 57,  158 => 67,  156 => 56,  151 => 33,  142 => 30,  138 => 54,  136 => 43,  121 => 32,  117 => 18,  105 => 14,  91 => 34,  62 => 21,  49 => 50,  26 => 3,  94 => 25,  89 => 30,  85 => 23,  75 => 24,  68 => 12,  56 => 16,  31 => 4,  25 => 4,  21 => 2,  24 => 3,  19 => 1,  93 => 38,  88 => 5,  78 => 18,  46 => 12,  44 => 11,  27 => 7,  79 => 29,  72 => 27,  69 => 26,  47 => 15,  40 => 11,  37 => 7,  22 => 2,  246 => 89,  157 => 55,  145 => 31,  139 => 29,  131 => 40,  123 => 39,  120 => 40,  115 => 34,  111 => 30,  108 => 47,  101 => 43,  98 => 34,  96 => 35,  83 => 35,  74 => 19,  66 => 25,  55 => 38,  52 => 13,  50 => 16,  43 => 7,  41 => 8,  35 => 9,  32 => 7,  29 => 3,  209 => 82,  203 => 78,  199 => 51,  193 => 73,  189 => 73,  187 => 84,  182 => 66,  176 => 42,  173 => 41,  168 => 38,  164 => 36,  162 => 54,  154 => 49,  149 => 51,  147 => 54,  144 => 48,  141 => 44,  133 => 43,  130 => 49,  125 => 38,  122 => 38,  116 => 30,  112 => 16,  109 => 34,  106 => 28,  103 => 28,  99 => 31,  95 => 39,  92 => 28,  86 => 22,  82 => 19,  80 => 29,  73 => 23,  64 => 24,  60 => 20,  57 => 19,  54 => 19,  51 => 37,  48 => 16,  45 => 14,  42 => 11,  39 => 10,  36 => 9,  33 => 9,  30 => 7,);
    }
}
