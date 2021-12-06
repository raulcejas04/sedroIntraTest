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

/* solicitud/verSolicitud.html.twig */
class __TwigTemplate_ffb9e4a431017f67b708e895be9d61fb4c63a26688a882d913441c5a67c77335 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "solicitud/verSolicitud.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "solicitud/verSolicitud.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "solicitud/verSolicitud.html.twig", 1);
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

        echo "Mostrar Solicitud";
        
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
        echo "    <h2 class=\"text-center\">Solicitud: </h2>
    <div class=\"row justify-content-md-center\">    
        <div class=\"col-8\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Solicitud de alta: dispositivo <b>";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 11, $this->source); })()), "dispositivo", [], "any", false, false, false, 11), "nicname", [], "any", false, false, false, 11), "html", null, true);
        echo "</b></h4>              
                </div>
                    <h3>Datos: Persona Física</h3>
                    <ul>
                        <li><b>Nombres: </b>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 15, $this->source); })()), "personaFisica", [], "any", false, false, false, 15), "apellido", [], "any", false, false, false, 15), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 15, $this->source); })()), "personaFisica", [], "any", false, false, false, 15), "nombres", [], "any", false, false, false, 15), "html", null, true);
        echo "</li>
                        <li><b>DNI: </b>(";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 16, $this->source); })()), "personaFisica", [], "any", false, false, false, 16), "tipoDocumento", [], "any", false, false, false, 16), "tipoDocumento", [], "any", false, false, false, 16), "html", null, true);
        echo ") ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 16, $this->source); })()), "personaFisica", [], "any", false, false, false, 16), "nroDoc", [], "any", false, false, false, 16), "html", null, true);
        echo "</li>                     
                        <li><b>CUIT: </b>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 17, $this->source); })()), "personaFisica", [], "any", false, false, false, 17), "cuitCuil", [], "any", false, false, false, 17), "html", null, true);
        echo "</li>
                        <li><b>Fecha de Nacimiento: </b>";
        // line 18
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 18, $this->source); })()), "personaFisica", [], "any", false, false, false, 18), "fechaNac", [], "any", false, false, false, 18), "d-m-Y"), "html", null, true);
        echo "</li>
                        <li><b>Sexo: </b>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 19, $this->source); })()), "personaFisica", [], "any", false, false, false, 19), "sexo", [], "any", false, false, false, 19), "descripcion", [], "any", false, false, false, 19), "html", null, true);
        echo "</li>
                        <li><b>Estado Civil: </b>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 20, $this->source); })()), "personaFisica", [], "any", false, false, false, 20), "estadoCivil", [], "any", false, false, false, 20), "estadoCivil", [], "any", false, false, false, 20), "html", null, true);
        echo "</li>
                        <li><b>Nacionalidad: </b>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 21, $this->source); })()), "personaFisica", [], "any", false, false, false, 21), "nacionalidad", [], "any", false, false, false, 21), "pais", [], "any", false, false, false, 21), "html", null, true);
        echo "</li>
                    </ul>
                    <br>
                    <h3>Datos: Persona Jurídica</h3>
                    <ul>
                        <li><b>razón Social: </b>";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 26, $this->source); })()), "personaJuridica", [], "any", false, false, false, 26), "razonSocial", [], "any", false, false, false, 26), "html", null, true);
        echo "</li>
                        <li><b>CUIT: </b>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 27, $this->source); })()), "personaJuridica", [], "any", false, false, false, 27), "cuit", [], "any", false, false, false, 27), "html", null, true);
        echo "</li>
                        <li><b>Alta: </b> ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 28, $this->source); })()), "personaJuridica", [], "any", false, false, false, 28), "fechaAlta", [], "any", false, false, false, 28)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 28, $this->source); })()), "personaJuridica", [], "any", false, false, false, 28), "fechaAlta", [], "any", false, false, false, 28), "d-m-Y"), "html", null, true);
        } else {
            echo " S/D ";
        }
        echo "</li>
                        <li><b>Baja: </b> ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 29, $this->source); })()), "personaJuridica", [], "any", false, false, false, 29), "fechaBaja", [], "any", false, false, false, 29)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 29, $this->source); })()), "personaJuridica", [], "any", false, false, false, 29), "fechaBaja", [], "any", false, false, false, 29), "d-m-Y"), "html", null, true);
        } else {
            echo " S/D ";
        }
        echo "</li>
                    </ul>
                    <br>
                    <h3>Datos: Dispositivo</h3>
                    <ul>
                        <li><b>Dispositivo: </b>";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 34, $this->source); })()), "dispositivo", [], "any", false, false, false, 34), "nicname", [], "any", false, false, false, 34), "html", null, true);
        echo "</li>
                        <li><b>Alta: </b> ";
        // line 35
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 35, $this->source); })()), "dispositivo", [], "any", false, false, false, 35), "fechaAlta", [], "any", false, false, false, 35)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 35, $this->source); })()), "dispositivo", [], "any", false, false, false, 35), "fechaAlta", [], "any", false, false, false, 35), "d-m-Y"), "html", null, true);
        } else {
            echo " S/D ";
        }
        echo "</li>
                        <li><b>Baja: </b> ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 36, $this->source); })()), "dispositivo", [], "any", false, false, false, 36), "fechaBaja", [], "any", false, false, false, 36)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 36, $this->source); })()), "dispositivo", [], "any", false, false, false, 36), "fechaBaja", [], "any", false, false, false, 36), "d-m-Y"), "html", null, true);
        } else {
            echo " S/D ";
        }
        echo "</li>
                    </ul>
                    <br>
                    <h3>Status: </h3>
                    

                    <br><br><br>.
                    ";
        // line 43
        if (((twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 43, $this->source); })()), "fechaAlta", [], "any", false, false, false, 43) == null) || (twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 43, $this->source); })()), "correccion", [], "any", false, false, false, 43) == null))) {
            // line 44
            echo "                        <div class=\"row\">
                            <div class=\"col-6\">
                                <div class=\"text-center\">
                                    <div class=\"center-block\">
                                        <a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("aceptarSolicitud", ["hash" => twig_get_attribute($this->env, $this->source, (isset($context["solicitud"]) || array_key_exists("solicitud", $context) ? $context["solicitud"] : (function () { throw new RuntimeError('Variable "solicitud" does not exist.', 48, $this->source); })()), "hash", [], "any", false, false, false, 48)]), "html", null, true);
            echo "\" class=\"btn btn-lg btn-success\">Aceptar Solicitud</a>
                                    </div>
                                </div>
                            </div>
    
                            <div class=\"col-6\">
                                <div class=\"text-center\">
                                    <div class=\"center-block\">
                                        <a href=\"#\" class=\"btn btn-lg btn-danger\">Rechazar Solicitud</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
        }
        // line 62
        echo "                    <br><br><br>.

                </div>
            </div>            
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "solicitud/verSolicitud.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 62,  204 => 48,  198 => 44,  196 => 43,  181 => 36,  172 => 35,  168 => 34,  155 => 29,  146 => 28,  142 => 27,  138 => 26,  130 => 21,  126 => 20,  122 => 19,  118 => 18,  114 => 17,  108 => 16,  102 => 15,  95 => 11,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mostrar Solicitud{% endblock %}

{% block body %}
    <h2 class=\"text-center\">Solicitud: </h2>
    <div class=\"row justify-content-md-center\">    
        <div class=\"col-8\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Solicitud de alta: dispositivo <b>{{ solicitud.dispositivo.nicname }}</b></h4>              
                </div>
                    <h3>Datos: Persona Física</h3>
                    <ul>
                        <li><b>Nombres: </b>{{ solicitud.personaFisica.apellido }}, {{ solicitud.personaFisica.nombres }}</li>
                        <li><b>DNI: </b>({{ solicitud.personaFisica.tipoDocumento.tipoDocumento }}) {{ solicitud.personaFisica.nroDoc }}</li>                     
                        <li><b>CUIT: </b>{{ solicitud.personaFisica.cuitCuil }}</li>
                        <li><b>Fecha de Nacimiento: </b>{{ solicitud.personaFisica.fechaNac|date(\"d-m-Y\") }}</li>
                        <li><b>Sexo: </b>{{ solicitud.personaFisica.sexo.descripcion }}</li>
                        <li><b>Estado Civil: </b>{{ solicitud.personaFisica.estadoCivil.estadoCivil }}</li>
                        <li><b>Nacionalidad: </b>{{ solicitud.personaFisica.nacionalidad.pais }}</li>
                    </ul>
                    <br>
                    <h3>Datos: Persona Jurídica</h3>
                    <ul>
                        <li><b>razón Social: </b>{{ solicitud.personaJuridica.razonSocial }}</li>
                        <li><b>CUIT: </b>{{ solicitud.personaJuridica.cuit }}</li>
                        <li><b>Alta: </b> {% if solicitud.personaJuridica.fechaAlta %} {{ solicitud.personaJuridica.fechaAlta|date(\"d-m-Y\") }}{% else %} S/D {% endif %}</li>
                        <li><b>Baja: </b> {% if solicitud.personaJuridica.fechaBaja %} {{ solicitud.personaJuridica.fechaBaja|date(\"d-m-Y\") }}{% else %} S/D {% endif %}</li>
                    </ul>
                    <br>
                    <h3>Datos: Dispositivo</h3>
                    <ul>
                        <li><b>Dispositivo: </b>{{ solicitud.dispositivo.nicname }}</li>
                        <li><b>Alta: </b> {% if solicitud.dispositivo.fechaAlta %} {{ solicitud.dispositivo.fechaAlta|date(\"d-m-Y\") }}{% else %} S/D {% endif %}</li>
                        <li><b>Baja: </b> {% if solicitud.dispositivo.fechaBaja %} {{ solicitud.dispositivo.fechaBaja|date(\"d-m-Y\") }}{% else %} S/D {% endif %}</li>
                    </ul>
                    <br>
                    <h3>Status: </h3>
                    

                    <br><br><br>.
                    {% if solicitud.fechaAlta == null or solicitud.correccion == null %}
                        <div class=\"row\">
                            <div class=\"col-6\">
                                <div class=\"text-center\">
                                    <div class=\"center-block\">
                                        <a href=\"{{ path('aceptarSolicitud', {'hash': solicitud.hash} ) }}\" class=\"btn btn-lg btn-success\">Aceptar Solicitud</a>
                                    </div>
                                </div>
                            </div>
    
                            <div class=\"col-6\">
                                <div class=\"text-center\">
                                    <div class=\"center-block\">
                                        <a href=\"#\" class=\"btn btn-lg btn-danger\">Rechazar Solicitud</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {% endif %}
                    <br><br><br>.

                </div>
            </div>            
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

{% endblock %}", "solicitud/verSolicitud.html.twig", "/var/www/html/intra/templates/solicitud/verSolicitud.html.twig");
    }
}
