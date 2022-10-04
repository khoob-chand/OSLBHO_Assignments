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

/* themes/custom/bootstrap/templates/page.html.twig */
class __TwigTemplate_aef3b4a4f93238188c5dff408c1624fa extends \Twig\Template
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
        // line 53
        echo "<div id=\"load\"></div>
<div id=\"page-wrapper\">
  <div id=\"page\">
    <header id=\"header\" class=\"header\" role=\"banner\">
      <div class=\"section layout-container clearfix\">
        ";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "secondary_menu", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
        echo "
        ";
        // line 59
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
        echo "
        ";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
        echo "
      </div>
    </header>
    ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 63)) {
            // line 64
            echo "      <div class=\"highlighted\">
        <aside class=\"layout-container section clearfix\" role=\"complementary\">
          ";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 66), 66, $this->source), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 70
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 70)) {
            // line 71
            echo "      <div class=\"featured-top\">
        <aside class=\"featured-top__inner section layout-container clearfix\" role=\"complementary\">
          ";
            // line 73
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 77
        echo "    <div id=\"main-wrapper\" class=\"layout-main-wrapper layout-container clearfix\">
      <div id=\"main\" class=\"layout-main clearfix\">
        ";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
        echo "
        <main id=\"content\" class=\"column main-content\" role=\"main\">
          <section class=\"section\">
            <a id=\"main-content\" tabindex=\"-1\"></a>
            ";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
        echo "
          </section>
        </main>
        ";
        // line 86
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 86)) {
            // line 87
            echo "          <div id=\"sidebar-first\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              ";
            // line 89
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
            echo "
            </aside>
          </div>
        ";
        }
        // line 93
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 93)) {
            // line 94
            echo "          <div id=\"sidebar-second\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              ";
            // line 96
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 96), 96, $this->source), "html", null, true);
            echo "
            </aside>
          </div>
        ";
        }
        // line 100
        echo "      </div>
    </div>
    ";
        // line 102
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_first", [], "any", false, false, true, 102) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_second", [], "any", false, false, true, 102)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_third", [], "any", false, false, true, 102))) {
            // line 103
            echo "      <div class=\"featured-bottom\">
        <aside class=\"layout-container clearfix\" role=\"complementary\">
          ";
            // line 105
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_first", [], "any", false, false, true, 105), 105, $this->source), "html", null, true);
            echo "
          ";
            // line 106
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_second", [], "any", false, false, true, 106), 106, $this->source), "html", null, true);
            echo "
          ";
            // line 107
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom_third", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 111
        echo "    <footer class=\"site-footer\">
      <div class=\"layout-container\">
        ";
        // line 113
        if ((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 113) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 113)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 113)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 113))) {
            // line 114
            echo "          <div class=\"site-footer__top clearfix\">
            ";
            // line 115
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
            echo "
            ";
            // line 116
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
            echo "
            ";
            // line 117
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 117), 117, $this->source), "html", null, true);
            echo "
            ";
            // line 118
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 118), 118, $this->source), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 121
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 121)) {
            // line 122
            echo "          <div class=\"site-footer__bottom\">
            ";
            // line 123
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 123), 123, $this->source), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 126
        echo "      </div>
    </footer>
  </div>
</div>
<button onclick=\"topFunction()\" id=\"myBtn\" title=\"Go to top\"> &uarr;</button>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bootstrap/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 126,  189 => 123,  186 => 122,  183 => 121,  177 => 118,  173 => 117,  169 => 116,  165 => 115,  162 => 114,  160 => 113,  156 => 111,  149 => 107,  145 => 106,  141 => 105,  137 => 103,  135 => 102,  131 => 100,  124 => 96,  120 => 94,  117 => 93,  110 => 89,  106 => 87,  104 => 86,  98 => 83,  91 => 79,  87 => 77,  80 => 73,  76 => 71,  73 => 70,  66 => 66,  62 => 64,  60 => 63,  54 => 60,  50 => 59,  46 => 58,  39 => 53,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Bartik's theme implementation to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template normally located in the
 * core/modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.highlighted: Items for the highlighted region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.featured_top: Items for the featured top region.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.featured_bottom_first: Items for the first featured bottom region.
 * - page.featured_bottom_second: Items for the second featured bottom region.
 * - page.featured_bottom_third: Items for the third featured bottom region.
 * - page.footer_first: Items for the first footer column.
 * - page.footer_second: Items for the second footer column.
 * - page.footer_third: Items for the third footer column.
 * - page.footer_fourth: Items for the fourth footer column.
 * - page.footer_fifth: Items for the fifth footer column.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}
<div id=\"load\"></div>
<div id=\"page-wrapper\">
  <div id=\"page\">
    <header id=\"header\" class=\"header\" role=\"banner\">
      <div class=\"section layout-container clearfix\">
        {{ page.secondary_menu }}
        {{ page.header }}
        {{ page.primary_menu }}
      </div>
    </header>
    {% if page.highlighted %}
      <div class=\"highlighted\">
        <aside class=\"layout-container section clearfix\" role=\"complementary\">
          {{ page.highlighted }}
        </aside>
      </div>
    {% endif %}
    {% if page.featured_top %}
      <div class=\"featured-top\">
        <aside class=\"featured-top__inner section layout-container clearfix\" role=\"complementary\">
          {{ page.featured_top }}
        </aside>
      </div>
    {% endif %}
    <div id=\"main-wrapper\" class=\"layout-main-wrapper layout-container clearfix\">
      <div id=\"main\" class=\"layout-main clearfix\">
        {{ page.breadcrumb }}
        <main id=\"content\" class=\"column main-content\" role=\"main\">
          <section class=\"section\">
            <a id=\"main-content\" tabindex=\"-1\"></a>
            {{ page.content }}
          </section>
        </main>
        {% if page.sidebar_first %}
          <div id=\"sidebar-first\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              {{ page.sidebar_first }}
            </aside>
          </div>
        {% endif %}
        {% if page.sidebar_second %}
          <div id=\"sidebar-second\" class=\"column sidebar\">
            <aside class=\"section\" role=\"complementary\">
              {{ page.sidebar_second }}
            </aside>
          </div>
        {% endif %}
      </div>
    </div>
    {% if page.featured_bottom_first or page.featured_bottom_second or page.featured_bottom_third %}
      <div class=\"featured-bottom\">
        <aside class=\"layout-container clearfix\" role=\"complementary\">
          {{ page.featured_bottom_first }}
          {{ page.featured_bottom_second }}
          {{ page.featured_bottom_third }}
        </aside>
      </div>
    {% endif %}
    <footer class=\"site-footer\">
      <div class=\"layout-container\">
        {% if page.footer_first or page.footer_second or page.footer_third or page.footer_fourth %}
          <div class=\"site-footer__top clearfix\">
            {{ page.footer_first }}
            {{ page.footer_second }}
            {{ page.footer_third }}
            {{ page.footer_fourth }}
          </div>
        {% endif %}
        {% if page.footer_fifth %}
          <div class=\"site-footer__bottom\">
            {{ page.footer_fifth }}
          </div>
        {% endif %}
      </div>
    </footer>
  </div>
</div>
<button onclick=\"topFunction()\" id=\"myBtn\" title=\"Go to top\"> &uarr;</button>
", "themes/custom/bootstrap/templates/page.html.twig", "/var/www/html/oslproject/web/themes/custom/bootstrap/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 63);
        static $filters = array("escape" => 58);
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
