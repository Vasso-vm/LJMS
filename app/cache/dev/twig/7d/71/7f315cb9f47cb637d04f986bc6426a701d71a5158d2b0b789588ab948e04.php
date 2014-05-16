<?php

/* LjmsAdminBundle:Users:index.html.twig */
class __TwigTemplate_7d717f315cb9f47cb637d04f986bc6426a701d71a5158d2b0b789588ab948e04 extends Twig_Template
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
        echo "\t\t<h2>Hi, Administrator </h2>
\t\t<h2>System Users</h2>
\t\t<form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("users_index");
        echo "\" method=\"get\" class=\"pull-left\" id=\"filter_form\">
\t\t\t<span class=\"filter\"><strong>Filter by:</strong></span>
            <span class=\"filter\"> Division:</span>
            <select id=\"filter\" name=\"division\">
                <option value=\"all\" ";
        // line 9
        if (($this->getAttribute($this->getContext($context, "filter"), "division") == "all")) {
            echo "selected ";
        }
        echo ">All</option>
                ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "division_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 11
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "name"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, "filter"), "division") == $this->getAttribute($this->getContext($context, "d"), "name"))) {
                echo "selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "name"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "            </select>
\t\t\t<span class=\"filter\"> Status:</span>
\t\t\t<select id=\"filter\" name=\"status\">
\t\t\t\t<option value=\"all\" ";
        // line 16
        if (($this->getAttribute($this->getContext($context, "filter"), "status") == "all")) {
            echo "selected ";
        }
        echo ">All</option>
\t\t\t\t<option value=\"active\"";
        // line 17
        if (($this->getAttribute($this->getContext($context, "filter"), "status") == "active")) {
            echo "selected ";
        }
        echo ">Active</option>
\t\t\t\t<option value=\"inactive\"";
        // line 18
        if (($this->getAttribute($this->getContext($context, "filter"), "status") == "inactive")) {
            echo "selected ";
        }
        echo ">Inactive</option>
\t\t\t</select>
\t\t\t<input class=\"btn filter\" type=\"submit\" value=\"filter\" >
\t\t</form>
\t\t <div class=\"pull-right\">
\t\t\t<a class=\"btn action add\" href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("users_add");
        echo "\" id=\"act\">Add user</a>
\t\t</div>
\t\t<form action=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("users_group");
        echo "\" method=\"post\" id=\"system_users_form\">
\t\t\t<div class=\"pull-left\">
\t\t\t\t<select id=\"action_select\" name=\"action_select\">
\t\t\t\t\t<option value=\"active\">Active</option>
\t\t\t\t\t<option value=\"inactive\">Inactive</option>
\t\t\t\t\t<option value=\"delete\">Delete</option>
\t\t\t\t</select>
\t\t\t\t<input class=\"btn action\" type=\"submit\" value=\"Action\" >
\t\t\t</div>
\t\t\t<div class=\"pagination pull-right\">
\t\t\t\t<ul>
\t\t\t\t\t<li ";
        // line 36
        if (($this->getContext($context, "limit") == 10)) {
            echo "class=\"active\"";
        }
        echo ">
                        <a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("users_index");
        echo "?division=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
        echo "&status=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
        echo "&page=1&limit=10\">10</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li ";
        // line 39
        if (($this->getContext($context, "limit") == 20)) {
            echo "class=\"active\"";
        }
        echo ">
                        <a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("users_index");
        echo "?division=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
        echo "&status=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
        echo "&page=1&limit=20\">20</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li ";
        // line 42
        if (($this->getContext($context, "limit") == 30)) {
            echo "class=\"active\"";
        }
        echo ">
                        <a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("users_index");
        echo "?division=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
        echo "&status=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
        echo "&page=1&limit=30\">30</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li ";
        // line 45
        if (($this->getContext($context, "limit") == "all")) {
            echo "class=\"active\"";
        }
        echo ">
                        <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("users_index");
        echo "?division=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
        echo "&status=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
        echo "&page=1&limit=all\">all</a>
\t\t\t\t\t</li>\t\t
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<table class=\"system_users\">
\t\t\t\t<tbody>
\t\t\t\t<tr class=\"header\">
\t\t\t\t\t<td><input type=\"checkbox\" id=\"selall\"></td>
\t\t\t\t\t<td>NAME</td>
\t\t\t\t\t<td>PHONE</td>
\t\t\t\t\t<td>EMAIL</td>
\t\t\t\t\t<td class=\"role\">ROLE(S)</td>
\t\t\t\t\t<td>DIVISIONS</td>
\t\t\t\t\t<td>TEAMS</td>
\t\t\t\t\t<td>ACTION</td>
\t\t\t\t</tr>
\t\t\t\t";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "users"));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 63
            echo "\t\t\t\t<tr ";
            if (($this->getAttribute($this->getContext($context, "u"), "isActive") == 0)) {
                echo " class=\"muted content\"";
            } else {
                echo "class=\"content\"";
            }
            echo " >
\t\t\t\t\t<td> <input type=\"checkbox\" class=\"checkbox\" name=\"check[]\" value=";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "u"), "id"), "html", null, true);
            echo "> </td>
\t\t\t\t\t<td class=\"name\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "u"), "firstname"), "html", null, true);
            echo "</td>
\t\t\t\t\t<td> ";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "u"), "homephone"), "html", null, true);
            echo "</td>
\t\t\t\t\t<td class=\"email\">";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "u"), "email"), "html", null, true);
            echo "</td>
\t\t\t\t\t<td class=\"role\">
\t\t\t\t\t\t";
            // line 69
            if (($this->getAttribute($this->getContext($context, "u"), "adminrole") == 1)) {
                // line 70
                echo "\t\t\t\t\t\t\t<p>Admin</p>
\t\t\t\t\t\t";
            }
            // line 71
            echo "\t
\t\t\t\t\t\t";
            // line 72
            if (($this->getAttribute($this->getContext($context, "u"), "directorrole") == 1)) {
                // line 73
                echo "\t\t\t\t\t\t\tDirector
                            ";
                // line 74
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "divisions"));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 75
                echo "\t\t\t\t\t\t";
            }
            // line 76
            echo "\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "u"), "coachrole") == 1)) {
                // line 77
                echo "\t\t\t\t\t\t\tCoach
                            ";
                // line 78
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "coachTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 79
                echo "\t\t\t\t\t\t";
            }
            // line 80
            echo "\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "u"), "managerrole") == 1)) {
                // line 81
                echo "\t\t\t\t\t\t\t<p>Manager</p>
\t\t\t\t\t\t";
            }
            // line 83
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "guardianrole") == 1)) {
                // line 84
                echo "                            <p>Guardian</p>
                        ";
            }
            // line 86
            echo "                    </td>
\t\t\t\t\t<td class=\"division\">
                        ";
            // line 88
            if (($this->getAttribute($this->getContext($context, "u"), "adminRole") == 1)) {
                echo "<br>";
            }
            // line 89
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "directorRole") == 1)) {
                // line 90
                echo "                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "divisions"));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    // line 91
                    echo "                               <p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "name"), "html", null, true);
                    echo "</p>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 93
                echo "                        ";
            }
            // line 94
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "coachRole") == 1)) {
                // line 95
                echo "                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "coachTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 96
                    echo "                                <p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "c"), "division"), "name"), "html", null, true);
                    echo "</p>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 98
                echo "                        ";
            }
            // line 99
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "managerRole") == 1)) {
                // line 100
                echo "                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "managerTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                    // line 101
                    echo "                                <p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "m"), "division"), "name"), "html", null, true);
                    echo "</p>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "                        ";
            }
            // line 104
            echo "                    </td>
\t\t\t\t\t<td class=\"team\">
                        ";
            // line 106
            if (($this->getAttribute($this->getContext($context, "u"), "adminRole") == 1)) {
                echo "<br>";
            }
            // line 107
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "directorRole") == 1)) {
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "divisions"));
                foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 108
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "coachRole") == 1)) {
                // line 109
                echo "                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "coachTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 110
                    echo "                                <p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "c"), "name"), "html", null, true);
                    echo "</p>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 112
                echo "                        ";
            }
            // line 113
            echo "                        ";
            if (($this->getAttribute($this->getContext($context, "u"), "managerRole") == 1)) {
                // line 114
                echo "                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "u"), "managerTeams"));
                foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                    // line 115
                    echo "                                <p>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "m"), "name"), "html", null, true);
                    echo "</p>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 117
                echo "                        ";
            }
            // line 118
            echo "\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t<a href=\"";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_edit", array("id" => $this->getAttribute($this->getContext($context, "u"), "id"))), "html", null, true);
            echo "\">
                        ";
            // line 121
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "5ffc5fa_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5ffc5fa_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/5ffc5fa_edit_1.png");
                // line 122
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
                echo "\" alt=\"edit\" />
                        ";
            } else {
                // asset "5ffc5fa"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5ffc5fa") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/5ffc5fa.png");
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
                echo "\" alt=\"edit\" />
                        ";
            }
            unset($context["asset_url"]);
            // line 124
            echo "\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"";
            // line 125
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_delete", array("id" => $this->getAttribute($this->getContext($context, "u"), "id"))), "html", null, true);
            echo "\" data-confirm-text=\"Do you want to delete user?\" data-method=\"delete\" data-csrf=\"_token:";
            echo twig_escape_filter($this->env, $this->getContext($context, "csrf"), "html", null, true);
            echo "\" class=\"confirmable as-form\">
\t\t\t\t\t    ";
            // line 126
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "30a1ae4_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_30a1ae4_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/30a1ae4_delete_1.png");
                // line 127
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
                echo "\" alt=\"delete\" />
                        ";
            } else {
                // asset "30a1ae4"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_30a1ae4") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/30a1ae4.png");
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
                echo "\" alt=\"delete\" />
                        ";
            }
            unset($context["asset_url"]);
            // line 129
            echo "\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</form>
        ";
        // line 136
        if (((($this->getContext($context, "limit") != "all") && ($this->getContext($context, "limit") != false)) && ($this->getAttribute($this->getContext($context, "pagination"), "count_pages") > 0))) {
            // line 137
            echo "            <div class=\"pagination\">
                <ul>
                    ";
            // line 139
            if (($this->getContext($context, "page") != 1)) {
                // line 140
                echo "                        <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=1&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">To Start</a></li>
                        <li><a href=\"";
                // line 141
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, ($this->getContext($context, "page") - 1), "html", null, true);
                echo "&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">Previous</a></li>
                    ";
            }
            // line 143
            echo "                    ";
            if ((($this->getAttribute($this->getContext($context, "pagination"), "count_pages") > 20) && (($this->getContext($context, "page") - 3) > $this->getAttribute($this->getContext($context, "pagination"), "center")))) {
                // line 144
                echo "                        <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, ($this->getContext($context, "pages") / twig_round(2)), "html", null, true);
                echo "&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">To Start</a></li>
                        <li><span class=\"invizible\">...</span></li>
                    ";
            }
            // line 147
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range($this->getAttribute($this->getContext($context, "pagination"), "i"), $this->getAttribute($this->getContext($context, "pagination"), "end")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 148
                echo "                        <li";
                if (($this->getContext($context, "i") == $this->getContext($context, "page"))) {
                    echo " class=\"active\"";
                }
                echo ">
                            <a href=\"";
                // line 149
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</a>
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "                    ";
            if ((($this->getAttribute($this->getContext($context, "pagination"), "count_pages") > 20) && (($this->getContext($context, "page") + 3) < $this->getAttribute($this->getContext($context, "pagination"), "center")))) {
                // line 153
                echo "                        <li><span class=\"invizible\">...</span></li>
                        <li><a href=\"";
                // line 154
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, ($this->getContext($context, "pages") / twig_round(2)), "html", null, true);
                echo "&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">To Start</a></li>
                    ";
            }
            // line 156
            echo "                    ";
            if (($this->getContext($context, "page") != $this->getAttribute($this->getContext($context, "pagination"), "count_pages"))) {
                // line 157
                echo "                        <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, ($this->getContext($context, "page") + 1), "html", null, true);
                echo "&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">Next</a></li>
                        <li><a href=\"";
                // line 158
                echo $this->env->getExtension('routing')->getPath("users_index");
                echo "?division=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "division"), "html", null, true);
                echo "&status=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "filter"), "status"), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pagination"), "count_pages"), "html", null, true);
                echo "&limit=";
                echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
                echo "\">To end</a></li>
                    ";
            }
            // line 160
            echo "                </ul>
            </div>
        ";
        }
        // line 163
        echo "\t";
    }

    public function getTemplateName()
    {
        return "LjmsAdminBundle:Users:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  604 => 163,  599 => 160,  586 => 158,  573 => 157,  570 => 156,  557 => 154,  554 => 153,  551 => 152,  532 => 149,  525 => 148,  520 => 147,  505 => 144,  502 => 143,  489 => 141,  478 => 140,  476 => 139,  472 => 137,  470 => 136,  465 => 133,  456 => 129,  442 => 127,  438 => 126,  432 => 125,  429 => 124,  415 => 122,  411 => 121,  407 => 120,  403 => 118,  400 => 117,  391 => 115,  386 => 114,  383 => 113,  380 => 112,  371 => 110,  366 => 109,  363 => 108,  351 => 107,  347 => 106,  343 => 104,  340 => 103,  331 => 101,  326 => 100,  323 => 99,  320 => 98,  311 => 96,  306 => 95,  303 => 94,  300 => 93,  291 => 91,  286 => 90,  283 => 89,  279 => 88,  275 => 86,  271 => 84,  268 => 83,  264 => 81,  261 => 80,  258 => 79,  249 => 78,  246 => 77,  243 => 76,  240 => 75,  231 => 74,  228 => 73,  226 => 72,  223 => 71,  219 => 70,  217 => 69,  212 => 67,  208 => 66,  204 => 65,  200 => 64,  191 => 63,  187 => 62,  164 => 46,  158 => 45,  149 => 43,  143 => 42,  134 => 40,  128 => 39,  119 => 37,  113 => 36,  99 => 25,  94 => 23,  84 => 18,  78 => 17,  72 => 16,  67 => 13,  52 => 11,  48 => 10,  42 => 9,  35 => 5,  31 => 3,  28 => 2,);
    }
}
