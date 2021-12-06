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

/* personas_fisicas_juridicas/lista.html.twig */
class __TwigTemplate_bae86f26719cfe5aeb363e9e680db0cf064e414c0b740a9e29db87c30c2f991c extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "personas_fisicas_juridicas/lista.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "personas_fisicas_juridicas/lista.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "personas_fisicas_juridicas/lista.html.twig", 1);
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

        echo "Lista de personas";
        
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
        echo "    <h1 class=\"text-center\">Lista de personas</h1>
    <div class=\"row justify-content-md-center\">
        <table class=\"table table-striped table-hover\" id=\"tablaSolicitudes\">
                <thead>
                    <tr>
                        <th class=\"text-center\">Ver</th>
                        <th class=\"text-center\">Nombre (PF)</th>                                    
                        <th class=\"text-center\">Razón Social (PJ)</th>                                    
                        <th class=\"text-center\">Dispositivos</th>                        
                    </tr>
                </thead>
                <tbody>                                
                    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pfs"]) || array_key_exists("pfs", $context) ? $context["pfs"] : (function () { throw new RuntimeError('Variable "pfs" does not exist.', 18, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["pf"]) {
            // line 19
            echo "                        <tr>
                            <td class=\"text-center  align-middle\">
                                <a href=\"#\">
                                    <i class=\"align-middle\" data-feather=\"eye\"></i>ver</a>
                            </td>

                            <td class=\"text-left\">
                                <ul>
                                    
                                    <li>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pf"], "apellido", [], "any", false, false, false, 28), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pf"], "nombres", [], "any", false, false, false, 28), "html", null, true);
            echo "</li>
                                    
                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                <ul>
                                    ";
            // line 35
            if (twig_get_attribute($this->env, $this->source, $context["pf"], "relaciones", [], "any", false, false, false, 35)) {
                // line 36
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["pf"], "relaciones", [], "any", false, false, false, 36));
                foreach ($context['_seq'] as $context["_key"] => $context["relacion"]) {
                    // line 37
                    echo "                                            <li>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["relacion"], "personaJuridica", [], "any", false, false, false, 37), "razonSocial", [], "any", false, false, false, 37), "html", null, true);
                    echo "</li>
                                        
                                            ";
                    // line 39
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["relacion"], "personaJuridica", [], "any", false, false, false, 39), "cuit", [], "any", false, false, false, 39)) {
                        // line 40
                        echo "                                                <li><b>CUIT: </b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["relacion"], "personaJuridica", [], "any", false, false, false, 40), "cuit", [], "any", false, false, false, 40), "html", null, true);
                        echo "</li>
                                            ";
                    }
                    // line 42
                    echo "                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['relacion'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "                                    ";
            } else {
                // line 44
                echo "                                        <li>S/D</li>
                                    ";
            }
            // line 46
            echo "                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                ";
            // line 56
            echo "                                S/D
                            </td>

                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pf'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                </tbody>
            </table>
    </div>
    <br>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "personas_fisicas_juridicas/lista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 61,  169 => 56,  163 => 46,  159 => 44,  156 => 43,  150 => 42,  144 => 40,  142 => 39,  136 => 37,  131 => 36,  129 => 35,  117 => 28,  106 => 19,  102 => 18,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Lista de personas{% endblock %}

{% block body %}
    <h1 class=\"text-center\">Lista de personas</h1>
    <div class=\"row justify-content-md-center\">
        <table class=\"table table-striped table-hover\" id=\"tablaSolicitudes\">
                <thead>
                    <tr>
                        <th class=\"text-center\">Ver</th>
                        <th class=\"text-center\">Nombre (PF)</th>                                    
                        <th class=\"text-center\">Razón Social (PJ)</th>                                    
                        <th class=\"text-center\">Dispositivos</th>                        
                    </tr>
                </thead>
                <tbody>                                
                    {% for pf in pfs %}
                        <tr>
                            <td class=\"text-center  align-middle\">
                                <a href=\"#\">
                                    <i class=\"align-middle\" data-feather=\"eye\"></i>ver</a>
                            </td>

                            <td class=\"text-left\">
                                <ul>
                                    
                                    <li>{{ pf.apellido }}, {{ pf.nombres }}</li>
                                    
                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                <ul>
                                    {% if pf.relaciones %}
                                        {% for relacion in pf.relaciones %}
                                            <li>{{ relacion.personaJuridica.razonSocial }}</li>
                                        
                                            {% if relacion.personaJuridica.cuit %}
                                                <li><b>CUIT: </b>{{ relacion.personaJuridica.cuit }}</li>
                                            {% endif %}
                                        {% endfor %}
                                    {% else %}
                                        <li>S/D</li>
                                    {% endif %}
                                </ul>
                            </td>

                            <td class=\"text-left align-middle\">
                                {#{% if solicitud.dispositivo %}
                                    {{ solicitud.dispositivo.nicname }}
                                {% else %}
                                    S/D
                                {% endif %}
                                #}
                                S/D
                            </td>

                        </tr>
                    {% endfor %}
                </tbody>
            </table>
    </div>
    <br>
</div>
{% endblock %}
", "personas_fisicas_juridicas/lista.html.twig", "/var/www/html/intra/templates/personas_fisicas_juridicas/lista.html.twig");
    }
}
