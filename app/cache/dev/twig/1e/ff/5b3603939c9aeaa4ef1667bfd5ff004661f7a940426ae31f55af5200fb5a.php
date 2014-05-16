<?php

/* LjmsHomeBundle:Home:division.html.twig */
class __TwigTemplate_1eff5b3603939c9aeaa4ef1667bfd5ff004661f7a940426ae31f55af5200fb5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LjmsHomeBundle:Default:base.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'rightside' => array($this, 'block_rightside'),
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
        echo "    <div class=\"span7\">
        <h2>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "division"), "name"), "html", null, true);
        echo "</h2>
        <p>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "division"), "description"), "html", null, true);
        echo "</p>
        <h3>Division rules</h3>
        <p>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "division"), "rules"), "html", null, true);
        echo "</p>
        <h3>Division Representives</h3>
        <table class=\"system_users\">
            <tbody>
            <tr class=\"header\">
                <td>DIRECTOR NAME</td>
                <td>CONTACT</td>
            </tr>
            <tr>
                <td>";
        // line 16
        if (($this->getAttribute($this->getContext($context, "division"), "profile") != null)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "division"), "profile"), "firstName"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "division"), "profile"), "lastName"), "html", null, true);
        }
        echo "</td>
                <td>";
        // line 17
        if (($this->getAttribute($this->getContext($context, "division"), "profile") != null)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "division"), "profile"), "email"), "html", null, true);
            echo "<br> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "division"), "profile"), "homePhone"), "html", null, true);
        }
        echo "</td>
            </tr>
            </tbody>
        </table>
        <h3>LJMS Teams</h3>
        <table class=\"system_users\">
            <tbody>
            <tr class=\"header\">
                <td>
                    TEAM
                </td>
                <td>
                    WINS
                </td>
                <td>
                    LOSES
                </td>
                <td>
                    TIES
                </td>
                <td>
                    AVERAGE
                </td>
            </tr>
            ";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "division"), "teams"));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if (($this->getAttribute($this->getContext($context, "division"), "teams") != null)) {
                // line 42
                echo "                <tr>
                    <td>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "t"), "name"), "html", null, true);
                echo "</td>
                    <td>
                        ";
                // line 45
                $context["wins"] = 0;
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "homeGames"));
                foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
                    if (($this->getAttribute($this->getContext($context, "h"), "homeTeamScore") > $this->getAttribute($this->getContext($context, "h"), "visitingTeamScore"))) {
                        // line 46
                        echo "                            ";
                        $context["wins"] = ($this->getContext($context, "wins") + 1);
                        // line 47
                        echo "                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "visitingGames"));
                foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                    if (($this->getAttribute($this->getContext($context, "v"), "homeTeamScore") < $this->getAttribute($this->getContext($context, "v"), "visitingTeamScore"))) {
                        // line 49
                        echo "                            ";
                        $context["wins"] = ($this->getContext($context, "wins") + 1);
                        // line 50
                        echo "                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getContext($context, "wins"), "html", null, true);
                echo "
                    </td>
                    <td>
                        ";
                // line 54
                $context["loses"] = 0;
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "homeGames"));
                foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
                    if (($this->getAttribute($this->getContext($context, "h"), "homeTeamScore") < $this->getAttribute($this->getContext($context, "h"), "visitingTeamScore"))) {
                        // line 55
                        echo "                            ";
                        $context["loses"] = ($this->getContext($context, "loses") + 1);
                        // line 56
                        echo "                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "visitingGames"));
                foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                    if (($this->getAttribute($this->getContext($context, "v"), "homeTeamScore") > $this->getAttribute($this->getContext($context, "v"), "visitingTeamScore"))) {
                        // line 58
                        echo "                            ";
                        $context["loses"] = ($this->getContext($context, "loses") + 1);
                        // line 59
                        echo "                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getContext($context, "loses"), "html", null, true);
                echo "
                    </td>
                    <td>
                        ";
                // line 63
                $context["ties"] = 0;
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "homeGames"));
                foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
                    if (($this->getAttribute($this->getContext($context, "h"), "homeTeamScore") == $this->getAttribute($this->getContext($context, "h"), "visitingTeamScore"))) {
                        // line 64
                        echo "                            ";
                        $context["ties"] = ($this->getContext($context, "ties") + 1);
                        // line 65
                        echo "                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "visitingGames"));
                foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                    if (($this->getAttribute($this->getContext($context, "v"), "homeTeamScore") == $this->getAttribute($this->getContext($context, "v"), "visitingTeamScore"))) {
                        // line 67
                        echo "                            ";
                        $context["ties"] = ($this->getContext($context, "ties") + 1);
                        // line 68
                        echo "                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 69
                echo "                        ";
                echo twig_escape_filter($this->env, $this->getContext($context, "ties"), "html", null, true);
                echo "
                    </td>
                    <td>";
                // line 71
                if (((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "t"), "homeGames")) + twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "t"), "visitingGames"))) != 0)) {
                    // line 72
                    echo "                            ";
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getContext($context, "wins") / (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "t"), "homeGames")) + twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "t"), "visitingGames")))) * 100), 1), "html", null, true);
                    echo " %
                        ";
                } else {
                    // line 74
                    echo "                            0 %
                        ";
                }
                // line 76
                echo "                    </td>
                </tr>
            ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "            </tbody>
        </table>
        <h3>Game schedule</h3>
        <table class=\"system_users\">
            <tbody>
            <tr class=\"header\">
                <td>
                    DATE
                </td>
                <td>
                    TIME
                </td>
                <td>
                    HOME
                </td>
                <td>
                    VISITOR
                </td>
                <td>
                    PRACTICE
                </td>
                <td>
                    LOCATION
                </td>
            </tr>
            ";
        // line 104
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "division"), "teams"));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            if (($this->getAttribute($this->getContext($context, "division"), "teams") != null)) {
                // line 105
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "t"), "homegames"));
                foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                    if (($this->getAttribute($this->getContext($context, "t"), "homegames") != null)) {
                        // line 106
                        echo "            <tr>
                <td>";
                        // line 107
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "s"), "date"), "m-d-Y"), "html", null, true);
                        echo "</td>
                <td>";
                        // line 108
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "s"), "date"), "h-i A", false), "html", null, true);
                        echo "</td>
                <td>";
                        // line 109
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "s"), "hometeam"), "name"), "html", null, true);
                        echo "</td>
                <td>";
                        // line 110
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "s"), "visitingteam"), "name"), "html", null, true);
                        echo "</td>
                <td>";
                        // line 111
                        if (($this->getAttribute($this->getContext($context, "s"), "practice") == 1)) {
                            echo " Yes ";
                        } else {
                            echo " No ";
                        }
                        echo "</td>
                <td>";
                        // line 112
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "s"), "location"), "name"), "html", null, true);
                        echo "</td>
            </tr>
                ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 115
                echo "                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "            </tbody>
        </table>
    </div>
";
    }

    // line 120
    public function block_rightside($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "LjmsHomeBundle:Home:division.html.twig";
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
