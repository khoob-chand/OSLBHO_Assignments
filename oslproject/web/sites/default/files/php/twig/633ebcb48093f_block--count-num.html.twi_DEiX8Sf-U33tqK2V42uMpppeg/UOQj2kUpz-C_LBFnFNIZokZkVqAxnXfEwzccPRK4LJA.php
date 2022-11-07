<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/bootstrap/templates/block--count-num.html.twig */
class __TwigTemplate_8cf8deea21e4a69999fd6ca9f94a002d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"parent_count\">
    <div class=\"number_1\">
        <div id=\"num_1\">";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_number", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
        echo "</div>
        <div>";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_plain_0", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
        echo "</div>
    </div>
    <div class=\"number_3\">
        <div id=\"num_2\">";
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_number_2", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
        echo " </div>
        <div id=\"plain_num_2\">";
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_plain_1", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
        echo " </div>
    </div>
    <div class=\"number_2\">
        <div id=\"num_3\">";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_number_3", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
        echo " </div>
        <div id=\"plain_num_3\">";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_plain_1", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
        echo " </div>
    </div>

    ";
        // line 19
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom/bootstrap/templates/block--count-num.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 19,  67 => 12,  63 => 11,  57 => 8,  53 => 7,  47 => 4,  43 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"parent_count\">
    <div class=\"number_1\">
        <div id=\"num_1\">{{ content.field_number }}</div>
        <div>{{ content.field_plain_0 }}</div>
    </div>
    <div class=\"number_3\">
        <div id=\"num_2\">{{ content.field_number_2 }} </div>
        <div id=\"plain_num_2\">{{ content.field_plain_1 }} </div>
    </div>
    <div class=\"number_2\">
        <div id=\"num_3\">{{ content.field_number_3 }} </div>
        <div id=\"plain_num_3\">{{ content.field_plain_1 }} </div>
    </div>

    {# <div class=\"number_4\">
        <div id=\"num_4\">{{ content.field_number_4 }} </div>
        <div id=\"plain_num_4\">{{ content.field_plain_4 }} </div>
    </div> #}
</div>", "themes/custom/bootstrap/templates/block--count-num.html.twig", "/home/lenovo/Desktop/OSLBHO_Assignments/oslproject/web/themes/custom/bootstrap/templates/block--count-num.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 3);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
