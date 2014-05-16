<?php

/* LjmsTplBundle:Form:form.html.twig */
class __TwigTemplate_9375e46042bec8c966668585c3d2cefa3f3db76968f32d1b5e7b0bd6bc56f6ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
            '_division_file_row' => array($this, 'block__division_file_row'),
            'row_addRole' => array($this, 'block_row_addRole'),
            'form_errors' => array($this, 'block_form_errors'),
            '_schedule_home_team_row' => array($this, 'block__schedule_home_team_row'),
            '_schedule_visiting_team_row' => array($this, 'block__schedule_visiting_team_row'),
            '_schedule_date_row' => array($this, 'block__schedule_date_row'),
            '_player_birthdate_row' => array($this, 'block__player_birthdate_row'),
            '_result_visiting_team_score_widget' => array($this, 'block__result_visiting_team_score_widget'),
            '_result_home_team_score_widget' => array($this, 'block__result_home_team_score_widget'),
            'captcha_widget' => array($this, 'block_captcha_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form_row', $context, $blocks);
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('_division_file_row', $context, $blocks);
        // line 23
        $this->displayBlock('row_addRole', $context, $blocks);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('form_errors', $context, $blocks);
        // line 40
        echo "
";
        // line 41
        $this->displayBlock('_schedule_home_team_row', $context, $blocks);
        // line 50
        $this->displayBlock('_schedule_visiting_team_row', $context, $blocks);
        // line 59
        echo "
";
        // line 60
        $this->displayBlock('_schedule_date_row', $context, $blocks);
        // line 79
        echo "
";
        // line 80
        $this->displayBlock('_player_birthdate_row', $context, $blocks);
        // line 91
        echo "
";
        // line 92
        $this->displayBlock('_result_visiting_team_score_widget', $context, $blocks);
        // line 95
        $this->displayBlock('_result_home_team_score_widget', $context, $blocks);
        // line 98
        echo "
";
        // line 99
        $this->displayBlock('captcha_widget', $context, $blocks);
    }

    // line 1
    public function block_form_row($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        <div class=\"control-group\">
            ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label")));
        echo "
            ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
            <div class=\"controls\">
                ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget', array("attr" => array("class" => "input-large")));
        echo "
            </div>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 13
    public function block__division_file_row($context, array $blocks = array())
    {
        // line 14
        echo "    <div class=\"control-group\">
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label")));
        echo "
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        <div class=\"controls\">
            ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget', array("attr" => array("class" => "input-large", "onchange" => "return uploadFile(this.files);")));
        echo "
            <span class=\"help-block\">Recommended dimensions of 640×480<br>Maximum file size of 4MB </span>
        </div>
    </div>
";
    }

    // line 23
    public function block_row_addRole($context, array $blocks = array())
    {
        // line 24
        echo "    <div class=\"add_role\">
        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "AddRole"), 'widget');
        echo "
    </div>
";
    }

    // line 29
    public function block_form_errors($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        ob_start();
        // line 31
        echo "        ";
        if ((twig_length_filter($this->env, $this->getContext($context, "errors")) > 0)) {
            // line 32
            echo "            <ul>
                ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "errors"));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 34
                echo "                    <p class=\"alert alert-error\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "error"), "message"), "html", null, true);
                echo "</p>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "            </ul>
        ";
        }
        // line 38
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 41
    public function block__schedule_home_team_row($context, array $blocks = array())
    {
        // line 42
        echo "    <div class=\"control-group\">
        ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label")));
        echo "
        ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        <div class=\"controls\">
            ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget', array("attr" => array("class" => "input-large select_team")));
        echo "
        </div>
    </div>
";
    }

    // line 50
    public function block__schedule_visiting_team_row($context, array $blocks = array())
    {
        // line 51
        echo "    <div class=\"control-group\">
        ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label")));
        echo "
        ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        <div class=\"controls\">
            ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget', array("attr" => array("class" => "input-large select_team")));
        echo "
        </div>
    </div>
";
    }

    // line 60
    public function block__schedule_date_row($context, array $blocks = array())
    {
        // line 61
        echo "    <div class=\"control-group\">
        ";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label"), "label" => "Date"));
        echo "
        ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        <div class=\"controls\">
            ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "date"), "day"), 'widget', array("attr" => array("class" => "input-mini pull-left")));
        echo "
            ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "date"), "month"), 'widget', array("attr" => array("class" => "input-mini")));
        echo "
            ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "date"), "year"), 'widget', array("attr" => array("class" => "input-mini")));
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        ";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label"), "label" => "Time"));
        echo "
        <div class=\"controls\">
            ";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "time"), "hour"), 'widget', array("attr" => array("class" => "input-mini pull-left")));
        echo "
            <span> : </span>
            ";
        // line 75
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "time"), "minute"), 'widget', array("attr" => array("class" => "input-mini")));
        echo "
        </div>
    </div>
";
    }

    // line 80
    public function block__player_birthdate_row($context, array $blocks = array())
    {
        // line 81
        echo "    <div class=\"control-group\">
        ";
        // line 82
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', array("label_attr" => array("class" => "control-label")));
        echo "
        ";
        // line 83
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        <div class=\"controls\">
            ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "day"), 'widget', array("attr" => array("class" => "input-mini pull-left")));
        echo "
            ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "month"), 'widget', array("attr" => array("class" => "input-mini")));
        echo "
            ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "year"), 'widget', array("attr" => array("class" => "input-mini")));
        echo "
        </div>
    </div>
";
    }

    // line 92
    public function block__result_visiting_team_score_widget($context, array $blocks = array())
    {
        // line 93
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget', array("attr" => array("class" => "input-medium")));
        echo "
";
    }

    // line 95
    public function block__result_home_team_score_widget($context, array $blocks = array())
    {
        // line 96
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget', array("attr" => array("class" => "input-medium")));
        echo "
";
    }

    // line 99
    public function block_captcha_widget($context, array $blocks = array())
    {
        // line 100
        echo "    ";
        ob_start();
        // line 101
        echo "        <script type=\"text/javascript\" src=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "url"), "html", null, true);
        echo "></script>
        <script type=\"text/javascript\">
                Recaptcha.create(\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "public_key"), "html", null, true);
        echo "\", 'recaptcha_div', {
                    theme: \"red\",
                    callback: Recaptcha.get_response()});
        </script>
        <div id=\"recaptcha_div\"></div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "LjmsTplBundle:Form:form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  330 => 103,  324 => 101,  321 => 100,  318 => 99,  311 => 96,  308 => 95,  301 => 93,  298 => 92,  290 => 87,  286 => 86,  282 => 85,  277 => 83,  273 => 82,  270 => 81,  267 => 80,  259 => 75,  254 => 73,  249 => 71,  242 => 67,  238 => 66,  234 => 65,  229 => 63,  225 => 62,  222 => 61,  219 => 60,  211 => 55,  206 => 53,  202 => 52,  199 => 51,  196 => 50,  188 => 46,  183 => 44,  179 => 43,  176 => 42,  173 => 41,  168 => 38,  164 => 36,  155 => 34,  151 => 33,  148 => 32,  145 => 31,  142 => 30,  139 => 29,  132 => 25,  129 => 24,  126 => 23,  117 => 18,  112 => 16,  108 => 15,  105 => 14,  102 => 13,  93 => 7,  88 => 5,  84 => 4,  81 => 3,  78 => 2,  75 => 1,  71 => 99,  68 => 98,  66 => 95,  64 => 92,  61 => 91,  56 => 79,  54 => 60,  49 => 50,  44 => 40,  42 => 29,  37 => 23,  35 => 13,  32 => 12,  30 => 1,  82 => 19,  76 => 16,  72 => 15,  67 => 13,  63 => 12,  59 => 80,  55 => 10,  51 => 59,  47 => 41,  43 => 7,  39 => 28,  34 => 4,  31 => 3,  28 => 2,);
    }
}
