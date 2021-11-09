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

/* sidebar.html.twig */
class __TwigTemplate_cbcfaa05a8b23695f7ef53e0f9b20fbc77f0b2bc61df7373edc6298dd764415c extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sidebar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sidebar.html.twig"));

        // line 1
        echo "<!-- INICIO SIDEBAR -->
<nav id=\"sidebarMenu\" class=\"col-md-3 col-lg-2 d-md-block bgsedronar-gris1C sidebar collapse\">
<div class=\"position-sticky pt-3\">
    <ul class=\"nav flex-column\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["opcionesLateral"]) || array_key_exists("opcionesLateral", $context) ? $context["opcionesLateral"] : (function () { throw new RuntimeError('Variable "opcionesLateral" does not exist.', 5, $this->source); })()));
        foreach ($context['_seq'] as $context["id"] => $context["prop"]) {
            // line 6
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["prop"], "link", [], "any", false, false, false, 6) == "")) {
                // line 7
                echo "               ";
                $context["lnk"] = "#";
                // line 8
                echo "            ";
            } else {
                // line 9
                echo "                ";
                $context["lnk"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "request", [], "any", false, false, false, 9), "baseUrl", [], "any", false, false, false, 9) . "/") . twig_get_attribute($this->env, $this->source, $context["prop"], "link", [], "any", false, false, false, 9));
                // line 10
                echo "            ";
            }
            // line 11
            echo "        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["lnk"]) || array_key_exists("lnk", $context) ? $context["lnk"] : (function () { throw new RuntimeError('Variable "lnk" does not exist.', 12, $this->source); })()), "html", null, true);
            echo "\"><span data-feather=\"opside_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["prop"], "id", [], "any", false, false, false, 12), "html", null, true);
            echo "\"></span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["prop"], "name", [], "any", false, false, false, 12), "html", null, true);
            echo "</a>
        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['prop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </ul>
</div>
</nav>
<!-- FIN SIDEBAR -->";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 15,  71 => 12,  68 => 11,  65 => 10,  62 => 9,  59 => 8,  56 => 7,  53 => 6,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- INICIO SIDEBAR -->
<nav id=\"sidebarMenu\" class=\"col-md-3 col-lg-2 d-md-block bgsedronar-gris1C sidebar collapse\">
<div class=\"position-sticky pt-3\">
    <ul class=\"nav flex-column\">
        {% for id, prop in opcionesLateral %}
            {%  if prop.link =='' %}
               {%  set lnk = \"#\"  %}
            {%  else  %}
                {%  set lnk = app.request.baseUrl ~ '/' ~ prop.link  %}
            {%  endif %}
        <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{lnk}}\"><span data-feather=\"opside_{{prop.id}}\"></span>{{prop.name}}</a>
        </li>
        {% endfor %}
    </ul>
</div>
</nav>
<!-- FIN SIDEBAR -->", "sidebar.html.twig", "/home/ntbdesa/www/sedronar/sedroIntra/templates/sidebar.html.twig");
    }
}
