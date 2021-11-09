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

/* acciones_extranet/usuariosExtranet.html.twig */
class __TwigTemplate_f1758ea0f439c5c709818c32a2f160d371d84a9c6bbe0153c146ee65c06b9bc3 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "acciones_extranet/usuariosExtranet.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "acciones_extranet/usuariosExtranet.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "acciones_extranet/usuariosExtranet.html.twig", 1);
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
        echo "    <h2 class=\"m-t-2\">Usuarios en la Extranet</h2>
    <div class=\"row justify-content-md-center\">
    
        <div class=\"col-10\">

            <table class=\"table table-responsive-poncho\">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>                                    
                        <th>Activo</th>                                    
                        <th>Acciones</th>                        
                    </tr>
                </thead>
                <tbody>                                
                    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["usuarios"]) || array_key_exists("usuarios", $context) ? $context["usuarios"] : (function () { throw new RuntimeError('Variable "usuarios" does not exist.', 22, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["usuario"]) {
            // line 23
            echo "                        <tr>
                            <td class=\"align-middle\">
                                ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "username", [], "any", false, false, false, 25), "html", null, true);
            echo "
                            </td>

                            <td class=\"align-middle\">
                                ";
            // line 29
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "lastName", [], "any", false, false, false, 29)), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "firstName", [], "any", false, false, false, 29), "html", null, true);
            echo "
                            </td>

                            <td class=\"align-middle\">
                                ";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["usuario"], "email", [], "any", false, false, false, 33), "html", null, true);
            echo "
                            </td>

                            <td class=\"align-middle\">
                                ";
            // line 37
            if ((twig_get_attribute($this->env, $this->source, $context["usuario"], "enabled", [], "any", false, false, false, 37) == true)) {
                // line 38
                echo "                                    <span class=\"badge rounded-pill bg-success\">Activo</span>
                                ";
            } else {
                // line 40
                echo "                                    <span class=\"badge rounded-pill bg-warning\">Deshabilitado</span>
                                ";
            }
            // line 42
            echo "                            </td>

                            <td class=\"align-middle\">
                                ";
            // line 45
            if ((twig_get_attribute($this->env, $this->source, $context["usuario"], "enabled", [], "any", false, false, false, 45) == true)) {
                // line 46
                echo "                                    <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("deshabilitar_usuario", ["id" => twig_get_attribute($this->env, $this->source, $context["usuario"], "id", [], "any", false, false, false, 46)]), "html", null, true);
                echo "\" class=\"btn btn-danger\">Desactivar</a>
                                ";
            } else {
                // line 48
                echo "                                    <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("rehabilitar_usuario", ["id" => twig_get_attribute($this->env, $this->source, $context["usuario"], "id", [], "any", false, false, false, 48)]), "html", null, true);
                echo "\" class=\"btn btn-danger\">Reactivar</a>
                                ";
            }
            // line 50
            echo "                                
                                <br>
                                <a href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("blanquear_password_usuario", ["id" => twig_get_attribute($this->env, $this->source, $context["usuario"], "id", [], "any", false, false, false, 52)]), "html", null, true);
            echo "\" class=\"btn btn-primary\">Blanquear Clave</a>
                                
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usuario'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                </tbody>
            </table>
            
            <br>.
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

<script>
    \$(document).ready(function () {

    });
</script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "acciones_extranet/usuariosExtranet.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 57,  170 => 52,  166 => 50,  160 => 48,  154 => 46,  152 => 45,  147 => 42,  143 => 40,  139 => 38,  137 => 37,  130 => 33,  121 => 29,  114 => 25,  110 => 23,  106 => 22,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Verificar Solicitudes{% endblock %}

{% block body %}
    <h2 class=\"m-t-2\">Usuarios en la Extranet</h2>
    <div class=\"row justify-content-md-center\">
    
        <div class=\"col-10\">

            <table class=\"table table-responsive-poncho\">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>                                    
                        <th>Activo</th>                                    
                        <th>Acciones</th>                        
                    </tr>
                </thead>
                <tbody>                                
                    {% for usuario in usuarios %}
                        <tr>
                            <td class=\"align-middle\">
                                {{ usuario.username }}
                            </td>

                            <td class=\"align-middle\">
                                {{ usuario.lastName|upper }}, {{ usuario.firstName }}
                            </td>

                            <td class=\"align-middle\">
                                {{ usuario.email }}
                            </td>

                            <td class=\"align-middle\">
                                {% if usuario.enabled == true %}
                                    <span class=\"badge rounded-pill bg-success\">Activo</span>
                                {% else %}
                                    <span class=\"badge rounded-pill bg-warning\">Deshabilitado</span>
                                {% endif %}
                            </td>

                            <td class=\"align-middle\">
                                {% if usuario.enabled == true %}
                                    <a href=\"{{ path('deshabilitar_usuario', {id: usuario.id} )}}\" class=\"btn btn-danger\">Desactivar</a>
                                {% else %}
                                    <a href=\"{{ path('rehabilitar_usuario', {id: usuario.id} )}}\" class=\"btn btn-danger\">Reactivar</a>
                                {% endif %}
                                
                                <br>
                                <a href=\"{{ path('blanquear_password_usuario', {id: usuario.id} )}}\" class=\"btn btn-primary\">Blanquear Clave</a>
                                
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
            
            <br>.
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

<script>
    \$(document).ready(function () {

    });
</script>

{% endblock %}

", "acciones_extranet/usuariosExtranet.html.twig", "/home/ntbdesa/www/sedronar/sedroIntra/templates/acciones_extranet/usuariosExtranet.html.twig");
    }
}
