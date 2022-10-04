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

/* modules/contrib/fontawesome/templates/fontawesomeicon.html.twig */
class __TwigTemplate_9e654110536c68b504911fef3c2b8ac8 extends \Twig\Template
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
        // line 18
        echo "<div class=\"fontawesome-icon\">
  <";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tag"] ?? null), 19, $this->source), "html", null, true);
        echo " class=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["style"] ?? null), 19, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 19, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["settings"] ?? null), 19, $this->source), "html", null, true);
        echo "\" data-fa-transform=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["transforms"] ?? null), 19, $this->source), "html", null, true);
        echo "\" data-fa-mask=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["mask"] ?? null), 19, $this->source), "html", null, true);
        echo "\" style=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["css"] ?? null), 19, $this->source), "html", null, true);
        echo "\"></";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tag"] ?? null), 19, $this->source), "html", null, true);
        echo ">
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/fontawesome/templates/fontawesomeicon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 19,  39 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default implementation for Font Awesome Icon field.
 *
 * Available variables:
 * - tag: the HTML tag being used to create the icon.
 * - icon: the name of the icon being used for templating.
 * - style: the Font Awesome style for the icon.
 * - settings: the additional Font Awesome style settings.
 * - transforms: Font Awesome power transforms.
 * - mask: Font Awesome mask.
 * - css: Additional inline CSS styles (for duotone, etc).
 *
 * @ingroup themeable
 */
#}
<div class=\"fontawesome-icon\">
  <{{tag }} class=\"{{ style }} {{ name }} {{ settings }}\" data-fa-transform=\"{{ transforms }}\" data-fa-mask=\"{{ mask }}\" style=\"{{ css }}\"></{{ tag }}>
</div>
", "modules/contrib/fontawesome/templates/fontawesomeicon.html.twig", "/var/www/html/oslproject/web/modules/contrib/fontawesome/templates/fontawesomeicon.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 19);
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
