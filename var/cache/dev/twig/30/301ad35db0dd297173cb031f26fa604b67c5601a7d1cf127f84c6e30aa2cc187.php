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

/* menuitem/show.html.twig */
class __TwigTemplate_c6b1d1ed80d0ff0c6e6ee248fa9316cebce9b094d3ed31cf4c5ca6fd42f5f880 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menuitem/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menuitem/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "menuitem/show.html.twig", 1);
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

        echo "Menuitem";
        
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
        echo "    <h1>Menuitem</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Rolecompany</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 16, $this->source); })()), "rolecompany", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 20, $this->source); })()), "name", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nametree</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 24, $this->source); })()), "nametree", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Icon</th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 28, $this->source); })()), "icon", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Link</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 32, $this->source); })()), "link", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Active</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 36, $this->source); })()), "active", [], "any", false, false, false, 36), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Orderlist1</th>
                <td>";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 40, $this->source); })()), "orderlist1", [], "any", false, false, false, 40), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Orderlist</th>
                <td>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 44, $this->source); })()), "orderlist", [], "any", false, false, false, 44), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>TypeId</th>
                <td>";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 48, $this->source); })()), "typeId", [], "any", false, false, false, 48), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Availablesel</th>
                <td>";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 52, $this->source); })()), "availablesel", [], "any", false, false, false, 52), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Module</th>
                <td>";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 56, $this->source); })()), "module", [], "any", false, false, false, 56), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Action</th>
                <td>";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 60, $this->source); })()), "action", [], "any", false, false, false, 60), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Divider</th>
                <td>";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 64, $this->source); })()), "divider", [], "any", false, false, false, 64), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>FechaEliminacion</th>
                <td>";
        // line 68
        ((twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 68, $this->source); })()), "fechaEliminacion", [], "any", false, false, false, 68)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 68, $this->source); })()), "fechaEliminacion", [], "any", false, false, false, 68), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 73
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("menuitem_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("menuitem_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["menuitem"]) || array_key_exists("menuitem", $context) ? $context["menuitem"] : (function () { throw new RuntimeError('Variable "menuitem" does not exist.', 75, $this->source); })()), "id", [], "any", false, false, false, 75)]), "html", null, true);
        echo "\">edit</a>

    ";
        // line 77
        echo twig_include($this->env, $context, "menuitem/_delete_form.html.twig");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "menuitem/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 77,  207 => 75,  202 => 73,  194 => 68,  187 => 64,  180 => 60,  173 => 56,  166 => 52,  159 => 48,  152 => 44,  145 => 40,  138 => 36,  131 => 32,  124 => 28,  117 => 24,  110 => 20,  103 => 16,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Menuitem{% endblock %}

{% block body %}
    <h1>Menuitem</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ menuitem.id }}</td>
            </tr>
            <tr>
                <th>Rolecompany</th>
                <td>{{ menuitem.rolecompany }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ menuitem.name }}</td>
            </tr>
            <tr>
                <th>Nametree</th>
                <td>{{ menuitem.nametree }}</td>
            </tr>
            <tr>
                <th>Icon</th>
                <td>{{ menuitem.icon }}</td>
            </tr>
            <tr>
                <th>Link</th>
                <td>{{ menuitem.link }}</td>
            </tr>
            <tr>
                <th>Active</th>
                <td>{{ menuitem.active }}</td>
            </tr>
            <tr>
                <th>Orderlist1</th>
                <td>{{ menuitem.orderlist1 }}</td>
            </tr>
            <tr>
                <th>Orderlist</th>
                <td>{{ menuitem.orderlist }}</td>
            </tr>
            <tr>
                <th>TypeId</th>
                <td>{{ menuitem.typeId }}</td>
            </tr>
            <tr>
                <th>Availablesel</th>
                <td>{{ menuitem.availablesel }}</td>
            </tr>
            <tr>
                <th>Module</th>
                <td>{{ menuitem.module }}</td>
            </tr>
            <tr>
                <th>Action</th>
                <td>{{ menuitem.action }}</td>
            </tr>
            <tr>
                <th>Divider</th>
                <td>{{ menuitem.divider }}</td>
            </tr>
            <tr>
                <th>FechaEliminacion</th>
                <td>{{ menuitem.fechaEliminacion ? menuitem.fechaEliminacion|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('menuitem_index') }}\">back to list</a>

    <a href=\"{{ path('menuitem_edit', {'id': menuitem.id}) }}\">edit</a>

    {{ include('menuitem/_delete_form.html.twig') }}
{% endblock %}
", "menuitem/show.html.twig", "/var/www/html/intra/templates/menuitem/show.html.twig");
    }
}
