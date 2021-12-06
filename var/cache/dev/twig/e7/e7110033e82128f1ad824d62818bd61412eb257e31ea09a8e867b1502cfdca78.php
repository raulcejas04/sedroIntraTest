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

/* menu/sidebarcontrol.html.twig */
class __TwigTemplate_1df5ce45b5f75e8cd860376aecfa4fd6854fb27b3aefc9bcc4eaded530ac8571 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/sidebarcontrol.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/sidebarcontrol.html.twig"));

        // line 1
        echo "<nav class=\"bd-subnavbar py-2 bgsedronar-gris1C\" aria-label=\"Secondary navigation\">
    <div class=\"container-fluid d-flex align-items-md-center\">        
";
        // line 16
        echo "        <button class=\"btn bd-sidebar-toggle d-md-none py-0 px-1 ms-3 order-3 collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#sidebarMenu\" aria-controls=\"sidebarMenu\" aria-expanded=\"false\" aria-label=\"Toggle docs navigation\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"bi bi-expand\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
            <title>Expand</title>
            <path fill-rule=\"evenodd\" d=\"M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zM7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10z\"></path>
            </svg>

            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"bi bi-collapse\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
            <title>Collapse</title>
            <path fill-rule=\"evenodd\" d=\"M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zm7-8a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 4.293V.5A.5.5 0 0 1 8 0zm-.5 11.707l-1.146 1.147a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 11.707V15.5a.5.5 0 0 1-1 0v-3.793z\"></path>
            </svg>
        </button>
    </div>
</nav>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "menu/sidebarcontrol.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  47 => 16,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"bd-subnavbar py-2 bgsedronar-gris1C\" aria-label=\"Secondary navigation\">
    <div class=\"container-fluid d-flex align-items-md-center\">        
{#        <form class=\"bd-search position-relative me-auto\">
        {% if listaDispositivos is defined and listaDispositivos|length>0 %}
            <select id=\"seldispositivo\" name=\"seldispositivo\" class=\"form-select form-control\" aria-label=\"Default select example\">
                {% for item in listaDispositivos %}
                <option id=\"{{ item['id']}}\">{{ item['name'] }}</option>
                {% endfor %}
            </select>
        {% else %}
            **NO existe dispositivo asociado **
        {% endif %}
            
        <span class=\"algolia-autocomplete\" style=\"position: relative; display: inline-block; direction: ltr;\"><input type=\"search\" class=\"form-control ds-input\" id=\"search-input\" placeholder=\"Search docs...\" aria-label=\"Search docs for...\" autocomplete=\"off\" data-bd-docs-version=\"5.1\" spellcheck=\"false\" role=\"combobox\" aria-autocomplete=\"list\" aria-expanded=\"false\" aria-owns=\"algolia-autocomplete-listbox-0\" style=\"position: relative; vertical-align: top;\" dir=\"auto\"><pre aria-hidden=\"true\" style=\"position: absolute; visibility: hidden; white-space: pre; font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;\"></pre><span class=\"ds-dropdown-menu\" style=\"position: absolute; top: 100%; z-index: 100; display: none; left: 0px; right: auto;\" role=\"listbox\" id=\"algolia-autocomplete-listbox-0\"><div class=\"ds-dataset-1\"></div></span></span>
        </form>
#}        <button class=\"btn bd-sidebar-toggle d-md-none py-0 px-1 ms-3 order-3 collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#sidebarMenu\" aria-controls=\"sidebarMenu\" aria-expanded=\"false\" aria-label=\"Toggle docs navigation\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"bi bi-expand\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
            <title>Expand</title>
            <path fill-rule=\"evenodd\" d=\"M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zM7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10z\"></path>
            </svg>

            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" class=\"bi bi-collapse\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
            <title>Collapse</title>
            <path fill-rule=\"evenodd\" d=\"M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zm7-8a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 4.293V.5A.5.5 0 0 1 8 0zm-.5 11.707l-1.146 1.147a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 11.707V15.5a.5.5 0 0 1-1 0v-3.793z\"></path>
            </svg>
        </button>
    </div>
</nav>
", "menu/sidebarcontrol.html.twig", "/var/www/html/intra/templates/menu/sidebarcontrol.html.twig");
    }
}
