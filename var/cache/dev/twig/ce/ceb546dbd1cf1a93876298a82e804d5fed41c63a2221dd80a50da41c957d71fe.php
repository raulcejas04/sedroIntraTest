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

/* main_content.html.twig */
class __TwigTemplate_08e3e883712b73f82798db9d21126fcaeaa10b47bd860c77926720f8b34dd00b extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main_content.html.twig"));

        // line 1
        echo "<h1 class=\"h2\">Dashboard</h1>
<div class=\"btn-toolbar mb-2 mb-md-0\">
    <div class=\"btn-group me-2\">
        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Share</button>
        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Export</button>
    </div>
    <button type=\"button\" class=\"btn btn-sm btn-outline-secondary dropdown-toggle\">
        <span data-feather=\"calendar\"></span>
        This week
    </button>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "main_content.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h1 class=\"h2\">Dashboard</h1>
<div class=\"btn-toolbar mb-2 mb-md-0\">
    <div class=\"btn-group me-2\">
        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Share</button>
        <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Export</button>
    </div>
    <button type=\"button\" class=\"btn btn-sm btn-outline-secondary dropdown-toggle\">
        <span data-feather=\"calendar\"></span>
        This week
    </button>
</div>
", "main_content.html.twig", "/home/ntbdesa/www/sedronar/sedroIntra/templates/main_content.html.twig");
    }
}
