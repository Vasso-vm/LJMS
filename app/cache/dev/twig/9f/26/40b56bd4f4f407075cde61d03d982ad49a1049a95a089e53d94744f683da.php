<?php

/* LjmsAdminBundle:Default:base.html.twig */
class __TwigTemplate_9f2640b56bd4f4f407075cde61d03d982ad49a1049a95a089e53d94744f683da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LjmsTplBundle:Default:base.html.twig");

        $this->blocks = array(
            'scripts' => array($this, 'block_scripts'),
            'section' => array($this, 'block_section'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LjmsTplBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_scripts($context, array $blocks = array())
    {
        // line 3
        echo "            <script>
                ";
        // line 4
        if (array_key_exists("url", $context)) {
            echo " var Url='";
            echo $this->env->getExtension('routing')->getPath($this->getContext($context, "url"));
            echo "';";
        }
        // line 5
        echo "                ";
        if (array_key_exists("ajaxUrl", $context)) {
            echo " var ajaxUrl='";
            echo $this->env->getExtension('routing')->getPath($this->getContext($context, "ajaxUrl"));
            echo "';";
        }
        // line 6
        echo "            </script>
        ";
    }

    // line 8
    public function block_section($context, array $blocks = array())
    {
        // line 9
        echo "        <section>
            <div class=\"row\">
\t            <div class=\"navbar menu\">
\t\t            <div class=\"navbar-inner \">
\t\t                <ul class=\"nav\">
                            ";
        // line 14
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 15
            echo "                            <li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("users_index");
            echo "\">System Users</a></li>
                            ";
        } else {
            // line 17
            echo "                                <li><a name=\"\" class=\"disabled\">System Users</a></li>
                            ";
        }
        // line 19
        echo "                            ";
        if ($this->env->getExtension('security')->isGranted("ROLE_GUARDIAN")) {
            // line 20
            echo "\t\t                \t    <li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("guardian_index");
            echo "\">Guardians</a></li>
                            ";
        } else {
            // line 22
            echo "                                <li><a name=\"\" class=\"disabled\">Guardians</a></li>
                            ";
        }
        // line 24
        echo "                            ";
        if (($this->env->getExtension('security')->isGranted("ROLE_GUARDIAN") || $this->env->getExtension('security')->isGranted("ROLE_COACH"))) {
            // line 25
            echo "\t\t                \t<li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("player_index");
            echo "\">Players</a></li>
                            ";
        } else {
            // line 27
            echo "                                <li><a name=\"\" class=\"disabled\">Players</a></li>
                            ";
        }
        // line 29
        echo "                            ";
        if ($this->env->getExtension('security')->isGranted("ROLE_DIRECTOR")) {
            // line 30
            echo "\t\t                \t<li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("division_index");
            echo "\">Divisions</a></li>
                            ";
        } else {
            // line 32
            echo "                                <li><a name=\"\" class=\"disabled\">Divisions</a></li>
                            ";
        }
        // line 34
        echo "                            ";
        if ((($this->env->getExtension('security')->isGranted("ROLE_COACH") || $this->env->getExtension('security')->isGranted("ROLE_MANAGER")) || $this->env->getExtension('security')->isGranted("ROLE_DIRECTOR"))) {
            // line 35
            echo "\t\t                \t<li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("team_index");
            echo "\">Teams</a></li>
                            ";
        } else {
            // line 37
            echo "                                <li><a name=\"\" class=\"disabled\">Teams</a></li>
                            ";
        }
        // line 39
        echo "                            ";
        if (($this->env->getExtension('security')->isGranted("ROLE_MANAGER") || $this->env->getExtension('security')->isGranted("ROLE_COACH"))) {
            // line 40
            echo "\t\t                \t<li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("schedule_index");
            echo "\">Game Schedule</a></li>
                            ";
        } else {
            // line 42
            echo "                                <li><a name=\"\" class=\"disabled\">Game Schedule</a></li>
                            ";
        }
        // line 44
        echo "                            ";
        if ($this->env->getExtension('security')->isGranted("ROLE_MANAGER")) {
            // line 45
            echo "\t\t                \t<li><a href=\"";
            echo $this->env->getExtension('routing')->getUrl("location_index");
            echo "\">Locations</a></li>
                            ";
        } else {
            // line 47
            echo "                                <li><a name=\"\" class=\"disabled\">Locations</a></li>
                            ";
        }
        // line 49
        echo "\t\t                </ul>
\t\t            </div>
\t        \t</div>    \t
                <div class=\"span9\">
                \t";
        // line 53
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "                </div>                                
            </div>
        </section>
        ";
    }

    // line 53
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "LjmsAdminBundle:Default:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 53,  162 => 54,  160 => 53,  154 => 49,  150 => 47,  144 => 45,  141 => 44,  137 => 42,  131 => 40,  124 => 37,  118 => 35,  115 => 34,  111 => 32,  105 => 30,  102 => 29,  98 => 27,  92 => 25,  89 => 24,  85 => 22,  79 => 20,  76 => 19,  66 => 15,  64 => 14,  57 => 9,  54 => 8,  49 => 6,  36 => 4,  33 => 3,  30 => 2,  604 => 163,  599 => 160,  586 => 158,  573 => 157,  570 => 156,  557 => 154,  554 => 153,  551 => 152,  532 => 149,  525 => 148,  520 => 147,  505 => 144,  502 => 143,  489 => 141,  478 => 140,  476 => 139,  472 => 137,  470 => 136,  465 => 133,  456 => 129,  442 => 127,  438 => 126,  432 => 125,  429 => 124,  415 => 122,  411 => 121,  407 => 120,  403 => 118,  400 => 117,  391 => 115,  386 => 114,  383 => 113,  380 => 112,  371 => 110,  366 => 109,  363 => 108,  351 => 107,  347 => 106,  343 => 104,  340 => 103,  331 => 101,  326 => 100,  323 => 99,  320 => 98,  311 => 96,  306 => 95,  303 => 94,  300 => 93,  291 => 91,  286 => 90,  283 => 89,  279 => 88,  275 => 86,  271 => 84,  268 => 83,  264 => 81,  261 => 80,  258 => 79,  249 => 78,  246 => 77,  243 => 76,  240 => 75,  231 => 74,  228 => 73,  226 => 72,  223 => 71,  219 => 70,  217 => 69,  212 => 67,  208 => 66,  204 => 65,  200 => 64,  191 => 63,  187 => 62,  164 => 46,  158 => 45,  149 => 43,  143 => 42,  134 => 40,  128 => 39,  119 => 37,  113 => 36,  99 => 25,  94 => 23,  84 => 18,  78 => 17,  72 => 17,  67 => 13,  52 => 11,  48 => 10,  42 => 5,  35 => 5,  31 => 3,  28 => 2,);
    }
}
