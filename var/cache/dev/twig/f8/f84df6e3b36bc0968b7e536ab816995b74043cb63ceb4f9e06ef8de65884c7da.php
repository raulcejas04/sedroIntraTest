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

/* topmenu.html.twig */
class __TwigTemplate_333e7ddd66ee258820a7ef41dc4027b1424083b8968d560f4c2e50325ceeb7d8 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "topmenu.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "topmenu.html.twig"));

        // line 1
        echo "<!-- INICIO NAVBAR -->
<nav class=\"navbar navbar-expand-lg navbar-light bgsedronar\">
    <div class=\"container-fluid\">
        <a class=\"navbar-brand\" href=\"#\">Sedronar</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
            <ul class=\"navbar-nav\">
                <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Home</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Features</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Pricing</a></li>
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Dropdown link</a>
                    <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                        <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <hr class=\"d-md-none text-white-50\">
        <ul class=\"navbar-nav flex-row flex-wrap ms-md-auto justify-content-end\">

            <!--ALERTAS-->
            ";
        // line 28
        $context["alertcount"] = 8;
        // line 29
        echo "            ";
        if (array_key_exists("alertcount", $context)) {
            // line 30
            echo "                ";
            if (((isset($context["alertcount"]) || array_key_exists("alertcount", $context) ? $context["alertcount"] : (function () { throw new RuntimeError('Variable "alertcount" does not exist.', 30, $this->source); })()) > 0)) {
                // line 31
                echo "                <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"/alertas\"> <span class=\"badge bg-danger\">8</span> <i class=\"bi bi-bell\"></i> </a></li>
                ";
            }
            // line 33
            echo "            ";
        }
        // line 34
        echo "            <!--FIN:ALERTAS-->

            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Rol-ADMIN</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"#\">Rol-USER</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Rol-SYSADMIN</a></li>
                </ul>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">RCejas</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"#\">Cambio de password</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Desconectarse</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
<!-- FIN NAVBAR -->
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "topmenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 34,  84 => 33,  80 => 31,  77 => 30,  74 => 29,  72 => 28,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- INICIO NAVBAR -->
<nav class=\"navbar navbar-expand-lg navbar-light bgsedronar\">
    <div class=\"container-fluid\">
        <a class=\"navbar-brand\" href=\"#\">Sedronar</a>
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
            <ul class=\"navbar-nav\">
                <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Home</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Features</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Pricing</a></li>
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Dropdown link</a>
                    <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                        <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                        <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <hr class=\"d-md-none text-white-50\">
        <ul class=\"navbar-nav flex-row flex-wrap ms-md-auto justify-content-end\">

            <!--ALERTAS-->
            {% set alertcount = 8 %}
            {% if alertcount is defined %}
                {% if alertcount>0 %}
                <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"/alertas\"> <span class=\"badge bg-danger\">8</span> <i class=\"bi bi-bell\"></i> </a></li>
                {% endif%}
            {% endif%}
            <!--FIN:ALERTAS-->

            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Rol-ADMIN</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"#\">Rol-USER</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Rol-SYSADMIN</a></li>
                </ul>
            </li>
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">RCejas</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"#\">Cambio de password</a></li>
                    <li><a class=\"dropdown-item\" href=\"#\">Desconectarse</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
<!-- FIN NAVBAR -->
", "topmenu.html.twig", "/var/www/html/intra/templates/topmenu.html.twig");
    }
}
