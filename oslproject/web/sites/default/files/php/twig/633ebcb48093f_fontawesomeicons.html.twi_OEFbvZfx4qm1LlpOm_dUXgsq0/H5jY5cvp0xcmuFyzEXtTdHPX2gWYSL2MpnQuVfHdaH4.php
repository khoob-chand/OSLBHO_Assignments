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

/* modules/contrib/fontawesome/templates/fontawesomeicons.html.twig */
class __TwigTemplate_e51842323708e3de62b0c13db4aaa0ad extends \Twig\Template
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
        // line 13
        echo "<div class=\"fontawesome-icons\">
  ";
        // line 14
        if ((($context["layers"] ?? null) == "1")) {
            // line 15
            echo "    <span class=\"fa-layers fa-fw\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icons"] ?? null), 15, $this->source), "html", null, true);
            echo "</span>
  ";
        } else {
            // line 17
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icons"] ?? null), 17, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 19
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/fontawesome/templates/fontawesomeicons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 19,  50 => 17,  44 => 15,  42 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default implementation for Font Awesome icons.
 *
 * Available variables:
 * - icons: a list of Font Awesome icons to be rendered.
 * - layers: flag indicating if icons are printing as layers.
 *
 * @ingroup themeable
 */
#}
<div class=\"fontawesome-icons\">
  {% if layers == '1' %}
    <span class=\"fa-layers fa-fw\">{{ icons }}</span>
  {% else %}
    {{ icons }}
  {% endif %}
</div>
", "modules/contrib/fontawesome/templates/fontawesomeicons.html.twig", "/home/lenovo/Desktop/OSLBHO_Assignments/oslproject/web/modules/contrib/fontawesome/templates/fontawesomeicons.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14);
        static $filters = array("escape" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
