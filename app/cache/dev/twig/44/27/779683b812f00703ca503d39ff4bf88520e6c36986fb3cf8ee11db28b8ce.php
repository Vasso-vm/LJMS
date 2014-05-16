<?php

/* LjmsAdminBundle:Users:add.html.twig */
class __TwigTemplate_4427779683b812f00703ca503d39ff4bf88520e6c36986fb3cf8ee11db28b8ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LjmsAdminBundle:Default:base.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LjmsAdminBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "\t\t<h2 class=\"add_user\">
\t\t\t";
        // line 4
        if (($this->getContext($context, "method") == "add")) {
            // line 5
            echo "\t\t\t\tAdd User
\t\t\t";
        } else {
            // line 7
            echo "\t\t\t\tEdit User
\t\t\t";
        }
        // line 9
        echo "\t\t</h2>
\t\t";
        // line 10
        if (($this->getContext($context, "method") == "add")) {
            // line 11
            echo "\t\t\t<form action=\"";
            echo $this->env->getExtension('routing')->getPath("users_add");
            echo "\" novalidate=\"novalidate\" method=\"post\" class=\"form-horizontal\" id=\"add_user_form\">
\t\t";
        } else {
            // line 13
            echo "\t\t\t<form action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_edit", array("id" => $this->getContext($context, "edit_id"))), "html", null, true);
            echo "\" method=\"post\" class=\"form-horizontal\" id=\"edit_user_form\">
\t\t";
        }
        // line 15
        echo "\t\t\t<fieldset>
\t\t\t\t<h3>User information</h3>
\t\t\t\t";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "FirstName"), 'row');
        echo "
\t\t\t\t\t";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "address"), 'row');
        echo "
\t\t\t\t\t";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "state"), 'row');
        echo "
                    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'row');
        echo "
                    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "password"), 'row');
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "LastName"), 'row');
        echo "
\t\t\t\t\t";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "city"), 'row');
        echo "
\t\t\t\t\t";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "address"), "zip"), 'row');
        echo "
\t\t\t\t\t";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "HomePhone"), 'row');
        echo "
\t\t\t\t\t";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "CellPhone"), 'row');
        echo "
\t\t\t\t\t";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "AltPhone"), 'row');
        echo "\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</fieldset>
\t\t\t<fieldset>
\t\t\t\t<h3>Alt Contact</h3>
\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "altContact"), "alt_first_name"), 'row');
        echo "
\t\t\t\t\t";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "altContact"), "alt_email"), 'row');
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "altContact"), "alt_last_name"), 'row');
        echo "
\t\t\t\t\t";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "altContact"), "alt_phone"), 'row');
        echo "
\t\t\t\t</div>\t\t\t\t
\t\t\t</fieldset>
\t\t\t<fieldset>
\t\t\t\t<h3>User Role</h3>
                    ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "Role"), 'row');
        echo "
\t\t\t\t<div class=\"pull-left\">
                    ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "Division"), 'row');
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"pull-right\">
                    ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "Team"), 'row');
        echo "
\t\t\t\t</div>
\t\t\t\t<table class=\"roles\" id=\"roles\">
\t\t\t\t\t<tr class=\"header\">
\t\t\t\t\t\t<td>Current Roles</td>
\t\t\t\t\t\t<td>Division</td>
\t\t\t\t\t\t<td>Team</td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
                ";
        // line 61
        if (array_key_exists("profile", $context)) {
            // line 62
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "profile"), "adminRole") != 0)) {
                // line 63
                echo "                    <tr class=\"1_undefined_undefined\">
                        <input type=\"hidden\" name=\"current_role[]\" value=\"1|undefined|undefined\">
                        <td>Admin</td>
                        <td></td>
                        <td></td>
                        <td class=\"delete\"><input type=\"button\" onclick=\"deleteRole(this)\" value=\"Delete Role\" class=\"1_undefined_undefined\"></td>
                    </tr>
                ";
            }
            // line 71
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "profile"), "directorRole") != 0)) {
                // line 72
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "profile"), "divisions"));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    // line 73
                    echo "                    <tr class=\"2_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "id"), "html", null, true);
                    echo "_undefined\">
                        <input type=\"hidden\" name=\"current_role[]\" value=\"2|";
                    // line 74
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "id"), "html", null, true);
                    echo "|undefined\">
                        <td>Director</td>
                        <td>";
                    // line 76
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "name"), "html", null, true);
                    echo "</td>
                        <td></td>
                        <td class=\"delete\"><input type=\"button\" onclick=\"deleteRole(this)\" value=\"Delete Role\" class=\"2_";
                    // line 78
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "id"), "html", null, true);
                    echo "_undefined\"></td>
                    </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                echo "                ";
            }
            // line 82
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "profile"), "coachRole") != 0)) {
                // line 83
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "profile"), "coachTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 84
                    echo "                        <tr class=\"3_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "c"), "division"), "id"), "html", null, true);
                    echo "_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "id"), "html", null, true);
                    echo "\">
                            <input type=\"hidden\" name=\"current_role[]\" value=\"3|";
                    // line 85
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "c"), "division"), "id"), "html", null, true);
                    echo "|";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "id"), "html", null, true);
                    echo "\">
                            <td>Coach</td>
                            <td>";
                    // line 87
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "c"), "division"), "name"), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 88
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "name"), "html", null, true);
                    echo "</td>
                            <td class=\"delete\"><input type=\"button\" onclick=\"deleteRole(this)\" value=\"Delete Role\" class=\"3_";
                    // line 89
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "c"), "division"), "id"), "html", null, true);
                    echo "_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "id"), "html", null, true);
                    echo "\"></td>
                        </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 92
                echo "                ";
            }
            // line 93
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "profile"), "managerRole") != 0)) {
                // line 94
                echo "                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "profile"), "managerTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                    // line 95
                    echo "                        <tr class=\"4_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "m"), "division"), "id"), "html", null, true);
                    echo "_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "m"), "id"), "html", null, true);
                    echo "\">
                            <input type=\"hidden\" name=\"current_role[]\" value=\"4|";
                    // line 96
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "m"), "division"), "id"), "html", null, true);
                    echo "|";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "m"), "id"), "html", null, true);
                    echo "\">
                            <td>Manager</td>
                            <td>";
                    // line 98
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "m"), "division"), "name"), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 99
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "m"), "name"), "html", null, true);
                    echo "</td>
                            <td class=\"delete\"><input type=\"button\" onclick=\"deleteRole(this)\" value=\"Delete Role\" class=\"4_";
                    // line 100
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "m"), "division"), "id"), "html", null, true);
                    echo "_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "m"), "id"), "html", null, true);
                    echo "\"></td>
                        </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "                ";
            }
            // line 104
            echo "                ";
            if (($this->getAttribute($this->getContext($context, "profile"), "guardianRole") != 0)) {
                // line 105
                echo "                    <tr class=\"5_undefined_undefined\">
                        <input type=\"hidden\" name=\"current_role[]\" value=\"5|undefined|undefined\">
                        <td>Guardian</td>
                        <td></td>
                        <td></td>
                        <td class=\"delete\"><input type=\"button\" onclick=\"deleteRole(this)\" value=\"Delete Role\" class=\"5_undefined_undefined\"></td>
                    </tr>
                ";
            }
            // line 113
            echo "                ";
        }
        // line 114
        echo "\t\t\t\t</table>
\t\t\t\t<div class=\"add_role\">
\t\t\t\t\t<input class=\"btn\" type=\"button\" id=\"add_role\" value=\"Add Role\" disabled>
\t\t\t\t</div>\t\t\t\t
\t\t\t</fieldset>
\t\t\t<div class=\"controls buttons\">
\t\t\t\t";
        // line 120
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "Save"), 'widget', array("attr" => array("class" => "btn")));
        echo "
\t\t\t\t<a class=\"btn\" id=\"act\" href=\"";
        // line 121
        echo $this->env->getExtension('routing')->getPath("users_index");
        echo "\">Back</a>
\t\t\t</div>
\t\t\t";
        // line 123
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "
\t\t</form>
\t";
    }

    public function getTemplateName()
    {
        return "LjmsAdminBundle:Users:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 121,  328 => 120,  317 => 113,  307 => 105,  304 => 104,  301 => 103,  282 => 98,  275 => 96,  263 => 94,  260 => 93,  257 => 92,  242 => 88,  231 => 85,  216 => 82,  213 => 81,  194 => 74,  184 => 72,  181 => 71,  148 => 49,  104 => 29,  65 => 17,  334 => 120,  327 => 116,  320 => 114,  310 => 112,  302 => 111,  290 => 100,  286 => 99,  277 => 105,  272 => 104,  245 => 79,  236 => 76,  232 => 74,  226 => 72,  218 => 69,  211 => 68,  202 => 66,  195 => 65,  192 => 64,  186 => 63,  172 => 59,  153 => 55,  124 => 48,  114 => 46,  100 => 28,  90 => 37,  70 => 19,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 123,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 110,  294 => 109,  285 => 89,  283 => 106,  278 => 86,  268 => 95,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 58,  140 => 51,  132 => 51,  128 => 49,  107 => 41,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 87,  235 => 74,  230 => 82,  227 => 81,  224 => 84,  221 => 77,  219 => 83,  217 => 75,  208 => 67,  204 => 78,  179 => 60,  159 => 61,  143 => 47,  135 => 42,  119 => 42,  102 => 32,  71 => 19,  67 => 31,  63 => 30,  59 => 14,  28 => 2,  87 => 21,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 63,  166 => 61,  163 => 57,  158 => 67,  156 => 56,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 37,  117 => 47,  105 => 40,  91 => 22,  62 => 23,  49 => 11,  26 => 6,  94 => 28,  89 => 20,  85 => 25,  75 => 18,  68 => 14,  56 => 16,  31 => 3,  25 => 4,  21 => 2,  24 => 2,  19 => 1,  93 => 28,  88 => 6,  78 => 21,  46 => 7,  44 => 9,  27 => 4,  79 => 19,  72 => 17,  69 => 25,  47 => 10,  40 => 7,  37 => 10,  22 => 2,  246 => 89,  157 => 56,  145 => 46,  139 => 45,  131 => 41,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 30,  101 => 26,  98 => 38,  96 => 27,  83 => 20,  74 => 20,  66 => 16,  55 => 13,  52 => 12,  50 => 10,  43 => 10,  41 => 5,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 76,  193 => 73,  189 => 73,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 62,  164 => 59,  162 => 57,  154 => 52,  149 => 51,  147 => 54,  144 => 49,  141 => 48,  133 => 50,  130 => 49,  125 => 38,  122 => 43,  116 => 41,  112 => 31,  109 => 34,  106 => 28,  103 => 43,  99 => 31,  95 => 23,  92 => 26,  86 => 23,  82 => 22,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 13,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
