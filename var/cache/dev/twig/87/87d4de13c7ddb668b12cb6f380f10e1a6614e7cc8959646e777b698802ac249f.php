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

/* solicitud/solicitudes.html.twig */
class __TwigTemplate_ed59311f837766f661443cecc965d4b35f08368dba099716250ee3f971265078 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "solicitud/solicitudes.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "solicitud/solicitudes.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "solicitud/solicitudes.html.twig", 1);
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

        echo "Verificar Solicitudes";
        
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
        echo "    <h2 class=\"text-center\">Solicitudes</h2>
    <div class=\"row justify-content-md-center\">
    
        <div class=\"col-10\">

            <div class=\"text-center\">
                <div class=\"center-block\">
                    <a href=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("nueva-solicitud");
        echo "\" class=\"btn btn-success btn-lg\">Nueva solicitud</a>
                </div>
            </div>
            <br>
            <br>
            <br>

            <table class=\"table table-striped table-hover\" id=\"tablaSolicitudes\">
                <thead>
                    <tr>
                        <th class=\"text-center\">Ver</th>
                        <th class=\"text-center\">Nombre (PF)</th>                                    
                        <th class=\"text-center\">Razón Social (PJ)</th>                                    
                        <th class=\"text-center\">Dispositivo</th>
                        <th class=\"text-center\">Fechas</th>
                        <th class=\"text-center\">Estado</th>
                    </tr>
                </thead>
                <tbody>                                
                    ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["solicitudes"]) || array_key_exists("solicitudes", $context) ? $context["solicitudes"] : (function () { throw new RuntimeError('Variable "solicitudes" does not exist.', 32, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["solicitud"]) {
            // line 33
            echo "                        <tr>
                            <td class=\"text-center  align-middle\">
                            ";
            // line 35
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "usada", [], "any", false, false, false, 35)) {
                // line 36
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("verSolicitud", ["hash" => twig_get_attribute($this->env, $this->source, $context["solicitud"], "hash", [], "any", false, false, false, 36)]), "html", null, true);
                echo "\">
                                    <i class=\"align-middle\" data-feather=\"eye\"></i> ver</a>
                                    ";
            }
            // line 39
            echo "                            </td>

                            <td class=\"text-left\">
                                <ul>
                                    ";
            // line 43
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaFisica", [], "any", false, false, false, 43)) {
                // line 44
                echo "                                        <li>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaFisica", [], "any", false, false, false, 44), "apellido", [], "any", false, false, false, 44), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaFisica", [], "any", false, false, false, 44), "nombres", [], "any", false, false, false, 44), "html", null, true);
                echo "</li>
                                        ";
                // line 45
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaFisica", [], "any", false, false, false, 45), "cuitCuil", [], "any", false, false, false, 45)) {
                    // line 46
                    echo "                                            <li><b>CUIT: </b>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaFisica", [], "any", false, false, false, 46), "cuitCuil", [], "any", false, false, false, 46), "html", null, true);
                    echo "</li>
                                        ";
                }
                // line 48
                echo "                                    ";
            } else {
                // line 49
                echo "                                        <li>S/D</li>
                                    ";
            }
            // line 51
            echo "                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                <ul>
                                    ";
            // line 56
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaJuridica", [], "any", false, false, false, 56)) {
                // line 57
                echo "                                        <li>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaJuridica", [], "any", false, false, false, 57), "razonSocial", [], "any", false, false, false, 57), "html", null, true);
                echo "</li>
                                        ";
                // line 58
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaJuridica", [], "any", false, false, false, 58), "cuit", [], "any", false, false, false, 58)) {
                    // line 59
                    echo "                                            <li><b>CUIT: </b>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "personaJuridica", [], "any", false, false, false, 59), "cuit", [], "any", false, false, false, 59), "html", null, true);
                    echo "</li>
                                        ";
                }
                // line 61
                echo "                                    ";
            } else {
                // line 62
                echo "                                        <li>S/D</li>
                                    ";
            }
            // line 64
            echo "                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                ";
            // line 68
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "dispositivo", [], "any", false, false, false, 68)) {
                // line 69
                echo "                                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["solicitud"], "dispositivo", [], "any", false, false, false, 69), "nicname", [], "any", false, false, false, 69), "html", null, true);
                echo "
                                ";
            } else {
                // line 71
                echo "                                    S/D
                                ";
            }
            // line 73
            echo "                            </td>

                            <td class=\"text-left align-middle\">
                                <ul>
                                    <li><b>Invitación:</b> ";
            // line 77
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["solicitud"], "creacion", [], "any", false, false, false, 77), "d/m/Y"), "html", null, true);
            echo " </li>
                                    
                                    ";
            // line 79
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaUso", [], "any", false, false, false, 79)) {
                // line 80
                echo "                                        <li><b>uso:</b> ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaUso", [], "any", false, false, false, 80), "d/m/Y"), "html", null, true);
                echo " </li>
                                    ";
            }
            // line 82
            echo "                                    ";
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaAlta", [], "any", false, false, false, 82)) {
                // line 83
                echo "                                        <li><b>alta:</b> ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaAlta", [], "any", false, false, false, 83), "d/m/Y"), "html", null, true);
                echo " </li>
                                    ";
            }
            // line 85
            echo "
                                </ul>
                            </td>
                            <td class=\"text-left align-middle\">
                                ";
            // line 89
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaAlta", [], "any", false, false, false, 89)) {
                // line 90
                echo "                                    <span class=\"badge rounded-pill bg-success\">Alta</span>
                                ";
            }
            // line 92
            echo "                                
                                ";
            // line 93
            if (twig_get_attribute($this->env, $this->source, $context["solicitud"], "correccion", [], "any", false, false, false, 93)) {
                // line 94
                echo "                                    <span class=\"badge rounded-pill bg-warning\">Rechazado</span>
                                ";
            }
            // line 96
            echo "
                                ";
            // line 97
            if (((twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaAlta", [], "any", false, false, false, 97) == null) && (twig_get_attribute($this->env, $this->source, $context["solicitud"], "correccion", [], "any", false, false, false, 97) == null))) {
                // line 98
                echo "                                    <span class=\"badge rounded-pill bg-danger\">NECESITA ATENCIÓN!</span>
                                ";
            }
            // line 100
            echo "
                                ";
            // line 101
            if ((twig_get_attribute($this->env, $this->source, $context["solicitud"], "fechaUso", [], "any", false, false, false, 101) == null)) {
                // line 102
                echo "                                    <span class=\"badge rounded-pill bg-info\">Esperando datos</span>
                                ";
            }
            // line 104
            echo "                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['solicitud'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "                </tbody>
            </table>
            <br>
            <br>
            <br>
            <div class=\"text-center\">
                <div class=\"center-block\">
                    <a href=\"";
        // line 114
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("nueva-solicitud");
        echo "\" class=\"btn btn-success btn-lg\">Nueva solicitud</a>
                </div>
            </div>
            <br>
            <br>
            <br>.
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
        return "solicitud/solicitudes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  297 => 114,  288 => 107,  280 => 104,  276 => 102,  274 => 101,  271 => 100,  267 => 98,  265 => 97,  262 => 96,  258 => 94,  256 => 93,  253 => 92,  249 => 90,  247 => 89,  241 => 85,  235 => 83,  232 => 82,  226 => 80,  224 => 79,  219 => 77,  213 => 73,  209 => 71,  203 => 69,  201 => 68,  195 => 64,  191 => 62,  188 => 61,  182 => 59,  180 => 58,  175 => 57,  173 => 56,  166 => 51,  162 => 49,  159 => 48,  153 => 46,  151 => 45,  144 => 44,  142 => 43,  136 => 39,  129 => 36,  127 => 35,  123 => 33,  119 => 32,  97 => 13,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Verificar Solicitudes{% endblock %}

{% block body %}
    <h2 class=\"text-center\">Solicitudes</h2>
    <div class=\"row justify-content-md-center\">
    
        <div class=\"col-10\">

            <div class=\"text-center\">
                <div class=\"center-block\">
                    <a href=\"{{ path('nueva-solicitud') }}\" class=\"btn btn-success btn-lg\">Nueva solicitud</a>
                </div>
            </div>
            <br>
            <br>
            <br>

            <table class=\"table table-striped table-hover\" id=\"tablaSolicitudes\">
                <thead>
                    <tr>
                        <th class=\"text-center\">Ver</th>
                        <th class=\"text-center\">Nombre (PF)</th>                                    
                        <th class=\"text-center\">Razón Social (PJ)</th>                                    
                        <th class=\"text-center\">Dispositivo</th>
                        <th class=\"text-center\">Fechas</th>
                        <th class=\"text-center\">Estado</th>
                    </tr>
                </thead>
                <tbody>                                
                    {% for solicitud in solicitudes %}
                        <tr>
                            <td class=\"text-center  align-middle\">
                            {% if solicitud.usada %}
                                <a href=\"{{ path('verSolicitud', {'hash': solicitud.hash}) }}\">
                                    <i class=\"align-middle\" data-feather=\"eye\"></i> ver</a>
                                    {% endif %}
                            </td>

                            <td class=\"text-left\">
                                <ul>
                                    {% if solicitud.personaFisica %}
                                        <li>{{ solicitud.personaFisica.apellido }}, {{ solicitud.personaFisica.nombres }}</li>
                                        {% if solicitud.personaFisica.cuitCuil %}
                                            <li><b>CUIT: </b>{{ solicitud.personaFisica.cuitCuil }}</li>
                                        {% endif %}
                                    {% else %}
                                        <li>S/D</li>
                                    {% endif %}
                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                <ul>
                                    {% if solicitud.personaJuridica %}
                                        <li>{{ solicitud.personaJuridica.razonSocial }}</li>
                                        {% if solicitud.personaJuridica.cuit %}
                                            <li><b>CUIT: </b>{{ solicitud.personaJuridica.cuit }}</li>
                                        {% endif %}
                                    {% else %}
                                        <li>S/D</li>
                                    {% endif %}
                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                {% if solicitud.dispositivo %}
                                    {{ solicitud.dispositivo.nicname }}
                                {% else %}
                                    S/D
                                {% endif %}
                            </td>

                            <td class=\"text-left align-middle\">
                                <ul>
                                    <li><b>Invitación:</b> {{ solicitud.creacion|date(\"d/m/Y\") }} </li>
                                    
                                    {% if solicitud.fechaUso %}
                                        <li><b>uso:</b> {{ solicitud.fechaUso|date(\"d/m/Y\") }} </li>
                                    {% endif %}
                                    {% if solicitud.fechaAlta %}
                                        <li><b>alta:</b> {{ solicitud.fechaAlta|date(\"d/m/Y\") }} </li>
                                    {% endif %}

                                </ul>
                            </td>
                            <td class=\"text-left align-middle\">
                                {% if solicitud.fechaAlta %}
                                    <span class=\"badge rounded-pill bg-success\">Alta</span>
                                {% endif %}
                                
                                {% if solicitud.correccion %}
                                    <span class=\"badge rounded-pill bg-warning\">Rechazado</span>
                                {% endif %}

                                {% if solicitud.fechaAlta == null and solicitud.correccion == null %}
                                    <span class=\"badge rounded-pill bg-danger\">NECESITA ATENCIÓN!</span>
                                {% endif %}

                                {% if solicitud.fechaUso == null %}
                                    <span class=\"badge rounded-pill bg-info\">Esperando datos</span>
                                {% endif %}
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <div class=\"text-center\">
                <div class=\"center-block\">
                    <a href=\"{{ path('nueva-solicitud') }}\" class=\"btn btn-success btn-lg\">Nueva solicitud</a>
                </div>
            </div>
            <br>
            <br>
            <br>.
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

{% endblock %}", "solicitud/solicitudes.html.twig", "/var/www/html/intra/templates/solicitud/solicitudes.html.twig");
    }
}
