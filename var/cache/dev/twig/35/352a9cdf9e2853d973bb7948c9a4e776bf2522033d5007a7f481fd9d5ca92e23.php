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

/* usuario/misDatos.html.twig */
class __TwigTemplate_b270d1acf364429c50b25b38609fbe84075e19e6abb56235a93fa31f5ef92611 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "usuario/misDatos.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "usuario/misDatos.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "usuario/misDatos.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Mis Datos";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <style>
        .example-wrapper {
            margin: 0 auto;
            max-width: 800px;
            width: 95%;
            font: 18px/1.5 sans-serif;
        }
        .example-wrapper code {
            background: #F5F5F5;
            padding: 2px 6px;
        }
    </style>

    <div class=\"example-wrapper\">
        <h6>Mis Datos<h6/>
            <strong>Usuario:</strong>
            <p>";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "user", [], "any", false, false, false, 22), "username", [], "any", false, false, false, 22), "html", null, true);
        echo "</p>

            <strong>Correo:</strong>
            <p>";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 25, $this->source); })()), "user", [], "any", false, false, false, 25), "email", [], "any", false, false, false, 25), "html", null, true);
        echo "</p>

            ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "personaFisica", [], "any", false, false, false, 27)) {
            // line 28
            echo "                ";
            $context["personaFisica"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "user", [], "any", false, false, false, 28), "personaFisica", [], "any", false, false, false, 28);
            // line 29
            echo "                <strong>Nombre y Apellido:</strong>
                <p>";
            // line 30
            echo twig_escape_filter($this->env, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 30, $this->source); })()), "html", null, true);
            echo "</p>

                <strong>Documento:</strong>
                <p>";
            // line 33
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 33, $this->source); })()), "tipoDocumento", [], "any", false, false, false, 33) . " ") . twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 33, $this->source); })()), "nroDoc", [], "any", false, false, false, 33)), "html", null, true);
            echo "</p>

                <strong>CUIT/CUIL:</strong>
                <p>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 36, $this->source); })()), "cuitCuil", [], "any", false, false, false, 36), "html", null, true);
            echo "</p>

                <strong>Fecha de Nacimiento:</strong>
                <p>";
            // line 39
            ((twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 39, $this->source); })()), "fechaNac", [], "any", false, false, false, 39)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 39, $this->source); })()), "fechaNac", [], "any", false, false, false, 39), "d-m-Y"), "html", null, true))) : (print ("Sin datos")));
            echo "</p>

                <strong>Sexo:</strong>
                <p>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 42, $this->source); })()), "sexo", [], "any", false, false, false, 42), "descripcion", [], "any", false, false, false, 42), "html", null, true);
            echo "</p>

                <strong>Estado Civil:</strong>
                <p>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 45, $this->source); })()), "estadoCivil", [], "any", false, false, false, 45), "html", null, true);
            echo "</p>

                <strong>Nacionalidad:</strong>
                <p>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["personaFisica"]) || array_key_exists("personaFisica", $context) ? $context["personaFisica"] : (function () { throw new RuntimeError('Variable "personaFisica" does not exist.', 48, $this->source); })()), "nacionalidad", [], "any", false, false, false, 48), "html", null, true);
            echo "</p>
            ";
        }
        // line 50
        echo "
            <strong>Roles:</strong>
            ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "user", [], "any", false, false, false, 52), "roles", [], "any", false, false, false, 52));
        foreach ($context['_seq'] as $context["_key"] => $context["rol"]) {
            // line 53
            echo "                <br/>
                ";
            // line 54
            echo twig_escape_filter($this->env, $context["rol"], "html", null, true);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rol'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "            <br/>
            <br/>
            <strong>Grupos:</strong>
            ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 59, $this->source); })()), "user", [], "any", false, false, false, 59), "grupos", [], "any", false, false, false, 59));
        foreach ($context['_seq'] as $context["_key"] => $context["grupo"]) {
            // line 60
            echo "                <br/>
                ";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["grupo"], "nombre", [], "any", false, false, false, 61), "html", null, true);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grupo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "usuario/misDatos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 63,  197 => 61,  194 => 60,  190 => 59,  185 => 56,  177 => 54,  174 => 53,  170 => 52,  166 => 50,  161 => 48,  155 => 45,  149 => 42,  143 => 39,  137 => 36,  131 => 33,  125 => 30,  122 => 29,  119 => 28,  117 => 27,  112 => 25,  106 => 22,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mis Datos{% endblock %}

{% block body %}
    <style>
        .example-wrapper {
            margin: 0 auto;
            max-width: 800px;
            width: 95%;
            font: 18px/1.5 sans-serif;
        }
        .example-wrapper code {
            background: #F5F5F5;
            padding: 2px 6px;
        }
    </style>

    <div class=\"example-wrapper\">
        <h6>Mis Datos<h6/>
            <strong>Usuario:</strong>
            <p>{{ app.user.username }}</p>

            <strong>Correo:</strong>
            <p>{{ app.user.email }}</p>

            {% if app.user.personaFisica %}
                {% set personaFisica = app.user.personaFisica %}
                <strong>Nombre y Apellido:</strong>
                <p>{{ personaFisica }}</p>

                <strong>Documento:</strong>
                <p>{{ personaFisica.tipoDocumento~ ' '~personaFisica.nroDoc }}</p>

                <strong>CUIT/CUIL:</strong>
                <p>{{ personaFisica.cuitCuil}}</p>

                <strong>Fecha de Nacimiento:</strong>
                <p>{{ personaFisica.fechaNac? personaFisica.fechaNac|date('d-m-Y'):'Sin datos'}}</p>

                <strong>Sexo:</strong>
                <p>{{ personaFisica.sexo.descripcion}}</p>

                <strong>Estado Civil:</strong>
                <p>{{ personaFisica.estadoCivil}}</p>

                <strong>Nacionalidad:</strong>
                <p>{{ personaFisica.nacionalidad}}</p>
            {% endif %}

            <strong>Roles:</strong>
            {% for rol in app.user.roles %}
                <br/>
                {{ rol }}
            {% endfor %}
            <br/>
            <br/>
            <strong>Grupos:</strong>
            {% for grupo in app.user.grupos %}
                <br/>
                {{ grupo.nombre }}
            {% endfor %}
    </div>
{% endblock %}
", "usuario/misDatos.html.twig", "/var/www/html/intra/templates/usuario/misDatos.html.twig");
    }
}
