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

/* modules/custom/customtable/templates/mylist.html.twig */
class __TwigTemplate_e8abb616f081a087324209f971ba0cd4 extends \Twig\Template
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
        echo "<style>
.heading{
    color: #444444;
    margin: 15px 0 0 0;
    font-size: 32px;
    font-weight: 700;
    font-family: \"Nunito\", sans-serif;
    position: relative;
    left: 255px;
}
.description{
    font-weight: 600;
    font-family: \"Open Sans\", sans-serif;
    color: #444444;
    text-align:center;
}
.service-name{
    font-weight: 700;
    margin-bottom: 15px;
   font-size: 18px;
   font-family: \"Nunito\", sans-serif;
}
.card li{
    list-style: none;
    width: 30%;
}
.card ul{
    display: flex;
    flex-wrap: wrap;
    gap: 5%;
}
.service-description{
    font-size: 15px;
    line-height: 28px;
    margin-bottom: 0;
}
.card ul li{
    padding: 60px 30px;
    position: relative;
    overflow: hidden;
    background: #fff;
    box-shadow: 2px 0 35px 0 rgb(68 88 144 / 12%);
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
    z-index: 1;
    text-align: center;
    margin-bottom: 30px;
    /* margin-right: -1px; */
}
.card ul li:hover{


  box-shadow: 3px 7px 100px 2px rgba(107, 127, 139, 0.5);
}

img{
  margin:auto;
}
a{
  text-decoration:none;
}
</style>



<div class=\"main_container\">
    ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ourservices"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 68
            echo "        <div class=\"heading\"><h1>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["data"], "title", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
            echo "</h1></div>
        <div class=\"description\"> ";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["data"], "description", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
            echo " </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "</div>
<div class=\"card\">
 <ul>
    ";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cards"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 75
            echo "    <li>
       <img class =\"img\" src=\"";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["card"], "image", [], "any", false, false, true, 76), 76, $this->source)), "html", null, true);
            echo "\">
        <div class=\"service-name\">";
            // line 77
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["card"], "title", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            echo "</div>
        
        <div class=\"service-description\">";
            // line 79
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["card"], "description", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
            echo "</div>
        <a href=\"";
            // line 80
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["card"], "link", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            echo "\" class=\"service-link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["card"], "link", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            echo "</a>
    </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo " </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/customtable/templates/mylist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 83,  149 => 80,  145 => 79,  140 => 77,  136 => 76,  133 => 75,  129 => 74,  124 => 71,  116 => 69,  111 => 68,  107 => 67,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/customtable/templates/mylist.html.twig", "/var/www/html/customtable/web/modules/custom/customtable/templates/mylist.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 67);
        static $filters = array("escape" => 68);
        static $functions = array("file_url" => 76);

        try {
            $this->sandbox->checkSecurity(
                ['for'],
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
