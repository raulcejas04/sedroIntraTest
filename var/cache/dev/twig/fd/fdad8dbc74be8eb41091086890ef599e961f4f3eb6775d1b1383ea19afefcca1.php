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
<nav id=\"sidebarMenu\" class=\"col-md-3 col-lg-2 d-md-block bgsedronar sidebar collapse\">
<div class=\"position-sticky pt-3\">

    <ul class=\"nav flex-column text-white w-100\">
        <li>
          <a href=\"#submenu0\" data-bs-toggle=\"collapse\" class=\"nav-link px-0 align-middle text-white\">
              <i class=\"fs-4 bi bi-person-circle\"></i> Diego
                    <span class=\"badge bg-danger\" style=\"margin-left: 30px;\">8</span><i class=\"bi bi-bell\" style=\"color: white; margin-left: 6px;\"> 
              </i>
          </a>
          <ul class=\"collapse nav flex-column ms-1\" id=\"submenu0\" data-bs-parent=\"#menu\">
                
              <li class=\"w-100\">
                  <a href=\"#\" class=\"dropdown-item text-white\"> Cambio de Clave </a>
              </li>
              <li>
                  <a href=\"#\" class=\"dropdown-item text-white\"> Salir </a>
              </li>
          </ul>
        </li>

        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["opcionesLateral"]) || array_key_exists("opcionesLateral", $context) ? $context["opcionesLateral"] : (function () { throw new RuntimeError('Variable "opcionesLateral" does not exist.', 23, $this->source); })()));
        foreach ($context['_seq'] as $context["id"] => $context["prop"]) {
            // line 24
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["prop"], "link", [], "any", false, false, false, 24) == "")) {
                // line 25
                echo "               ";
                $context["lnk"] = "#";
                // line 26
                echo "            ";
            } else {
                // line 27
                echo "                ";
                $context["lnk"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "request", [], "any", false, false, false, 27), "baseUrl", [], "any", false, false, false, 27) . "/") . twig_get_attribute($this->env, $this->source, $context["prop"], "link", [], "any", false, false, false, 27));
                // line 28
                echo "            ";
            }
            // line 29
            echo "        <li class=\"nav-item\">
            <a class=\"nav-link px-0 align-middle text-white\" href=\"";
            // line 30
            echo twig_escape_filter($this->env, (isset($context["lnk"]) || array_key_exists("lnk", $context) ? $context["lnk"] : (function () { throw new RuntimeError('Variable "lnk" does not exist.', 30, $this->source); })()), "html", null, true);
            echo "\"><span data-feather=\"opside_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["prop"], "id", [], "any", false, false, false, 30), "html", null, true);
            echo "\"></span>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["prop"], "name", [], "any", false, false, false, 30), "html", null, true);
            echo "</a>
        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['prop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
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
        return array (  102 => 33,  89 => 30,  86 => 29,  83 => 28,  80 => 27,  77 => 26,  74 => 25,  71 => 24,  67 => 23,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- INICIO SIDEBAR -->
<nav id=\"sidebarMenu\" class=\"col-md-3 col-lg-2 d-md-block bgsedronar sidebar collapse\">
<div class=\"position-sticky pt-3\">

    <ul class=\"nav flex-column text-white w-100\">
        <li>
          <a href=\"#submenu0\" data-bs-toggle=\"collapse\" class=\"nav-link px-0 align-middle text-white\">
              <i class=\"fs-4 bi bi-person-circle\"></i> Diego
                    <span class=\"badge bg-danger\" style=\"margin-left: 30px;\">8</span><i class=\"bi bi-bell\" style=\"color: white; margin-left: 6px;\"> 
              </i>
          </a>
          <ul class=\"collapse nav flex-column ms-1\" id=\"submenu0\" data-bs-parent=\"#menu\">
                
              <li class=\"w-100\">
                  <a href=\"#\" class=\"dropdown-item text-white\"> Cambio de Clave </a>
              </li>
              <li>
                  <a href=\"#\" class=\"dropdown-item text-white\"> Salir </a>
              </li>
          </ul>
        </li>

        {% for id, prop in opcionesLateral %}
            {%  if prop.link =='' %}
               {%  set lnk = \"#\"  %}
            {%  else  %}
                {%  set lnk = app.request.baseUrl ~ '/' ~ prop.link  %}
            {%  endif %}
        <li class=\"nav-item\">
            <a class=\"nav-link px-0 align-middle text-white\" href=\"{{lnk}}\"><span data-feather=\"opside_{{prop.id}}\"></span>{{prop.name}}</a>
        </li>
        {% endfor %}
    </ul>
</div>
</nav>
<!-- FIN SIDEBAR -->", "sidebar.html.twig", "/var/www/html/intra/templates/sidebar.html.twig");
    }
}
