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

/* themes/custom/bootstrap/templates/node--portfolios.html.twig */
class __TwigTemplate_aeeea3ee1ff28bb3aeba102d7f25c51d extends \Twig\Template
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
        echo "

<div class=\"portfolio\"> 

";
        // line 6
        echo "<a data-fancybox=\"gallery-a\" href=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_portfolioimage", [], "any", false, false, true, 6), "entity", [], "any", false, false, true, 6), "uri", [], "any", false, false, true, 6), "value", [], "any", false, false, true, 6), 6, $this->source)), "html", null, true);
        echo "\">
 <img src=\"";
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_portfolioimage", [], "any", false, false, true, 7), "entity", [], "any", false, false, true, 7), "uri", [], "any", false, false, true, 7), "value", [], "any", false, false, true, 7), 7, $this->source)), "html", null, true);
        echo "\" />
 </a>
</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom/bootstrap/templates/node--portfolios.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 7,  45 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

<div class=\"portfolio\"> 

{#{{ content.field_portfolioimage }}#}
<a data-fancybox=\"gallery-a\" href=\"{{ file_url(node.field_portfolioimage.entity.uri.value) }}\">
 <img src=\"{{ file_url(node.field_portfolioimage.entity.uri.value) }}\" />
 </a>
</div>", "themes/custom/bootstrap/templates/node--portfolios.html.twig", "/var/www/html/oslproject/web/themes/custom/bootstrap/templates/node--portfolios.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 6);
        static $functions = array("file_url" => 6);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['file_url']
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
