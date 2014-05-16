<?php

/* LjmsHomeBundle:Default:base.html.twig */
class __TwigTemplate_c392156083f79da980b54497426ea8f61311df7d52b8115e94d705f279d6a477 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LjmsTplBundle:Default:base.html.twig");

        $this->blocks = array(
            'scripts' => array($this, 'block_scripts'),
            'section' => array($this, 'block_section'),
            'leftside' => array($this, 'block_leftside'),
            'content' => array($this, 'block_content'),
            'rightside' => array($this, 'block_rightside'),
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
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "url"), array("year" => 0, "month" => 0, "day" => 0)), "html", null, true);
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
                ";
        // line 11
        $this->displayBlock('leftside', $context, $blocks);
        // line 28
        echo "                ";
        $this->displayBlock('content', $context, $blocks);
        // line 29
        echo "                ";
        $this->displayBlock('rightside', $context, $blocks);
        // line 48
        echo "            </div>
        </section>
        ";
    }

    // line 11
    public function block_leftside($context, array $blocks = array())
    {
        // line 12
        echo "                    <div class=\"span2 left\">
                        <form action=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("home_division_info");
        echo "\" method=\"post\">
                        <fieldset>
                            <legend>Division</legend>
                            <label for=\"division_list\">Select Your Division:</label>
                            <select name=\"division\" id=\"division_list\" onchange=\"this.form.submit()\">
                                <option value=\"\">--Select one--</option>
                                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "division_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 20
            echo "                                    <option value=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "id"), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "name"), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "                            </select>
                        </fieldset>
                        </form>
                        <div id=\"date\"> </div>
                    </div>
                ";
    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    // line 29
    public function block_rightside($context, array $blocks = array())
    {
        // line 30
        echo "                    <div class=\"span2\">
                        <h2>Announcements</h2>
                        ";
        // line 32
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "86b28a9_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_86b28a9_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/86b28a9_announce_img_1.gif");
            // line 33
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" alt=\"\" />
                        ";
        } else {
            // asset "86b28a9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_86b28a9") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/86b28a9.gif");
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" alt=\"\" />
                        ";
        }
        unset($context["asset_url"]);
        // line 35
        echo "                        <blockquote>
                            <p><strong>All Games On As Scheduled!!!!</strong></p>
                            <p><strong>LJMS will be walking in the Lockport Old Canal Days Parade June 14th!!!!</strong></p>
                            <p><strong>Watch for more Info!!!!!</strong></p>
                            <p class=\"last\">
                                Rain-out hot line.....in the event of questionable weather, we have established a call in hot-line
                                that you can call to see if games are cancelled.<strong>This only applies to</strong>
                                <strong>Hassert Park</strong> and can be called after 3pm on weekdays and 8am on weekends.
                                The number is <strong>815-838-1183 ext 504</strong> .....please remember to dial the proper extension.
                            </p>
                        </blockquote>
                    </div>    
                ";
    }

    public function getTemplateName()
    {
        return "LjmsHomeBundle:Default:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 35,  133 => 33,  129 => 32,  125 => 30,  122 => 29,  116 => 28,  107 => 22,  96 => 20,  92 => 19,  83 => 13,  80 => 12,  77 => 11,  71 => 48,  68 => 29,  65 => 28,  63 => 11,  56 => 8,  51 => 6,  44 => 5,  38 => 4,  32 => 2,  59 => 9,  53 => 8,  39 => 6,  35 => 3,  31 => 3,  28 => 2,);
    }
}
