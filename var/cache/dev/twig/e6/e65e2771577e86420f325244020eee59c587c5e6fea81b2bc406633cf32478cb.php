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

/* @SimpleThingsEntityAudit/Audit/view_revision.html.twig */
class __TwigTemplate_50e8065cf6f3daacd2f035e4f4571f08d8cc519a18bada65f980ab8c3ae6194f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'simplethings_entityaudit_content' => [$this, 'block_simplethings_entityaudit_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@SimpleThingsEntityAudit/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/view_revision.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/view_revision.html.twig"));

        $this->parent = $this->loadTemplate("@SimpleThingsEntityAudit/layout.html.twig", "@SimpleThingsEntityAudit/Audit/view_revision.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_simplethings_entityaudit_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "simplethings_entityaudit_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "simplethings_entityaudit_content"));

        // line 4
        echo "<h1>Entities changed in revision ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["revision"]) || array_key_exists("revision", $context) ? $context["revision"] : (function () { throw new RuntimeError('Variable "revision" does not exist.', 4, $this->source); })()), "rev", [], "any", false, false, false, 4), "html", null, true);
        echo "</h1>

<p><a href=\"";
        // line 6
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("simple_things_entity_audit_home");
        echo "\">Home</a></p>

<table>
    <thead><tr>
        <th>Class Name</th>
        <th>Identifiers</th>
        <th>Revision Type</th>
    </tr></thead>
    <tbody>
";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["changedEntities"]) || array_key_exists("changedEntities", $context) ? $context["changedEntities"] : (function () { throw new RuntimeError('Variable "changedEntities" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["changedEntity"]) {
            // line 16
            echo "    <tr>
        <td><a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("simple_things_entity_audit_viewentity_detail", ["rev" => twig_get_attribute($this->env, $this->source, (isset($context["revision"]) || array_key_exists("revision", $context) ? $context["revision"] : (function () { throw new RuntimeError('Variable "revision" does not exist.', 17, $this->source); })()), "rev", [], "any", false, false, false, 17), "className" => twig_get_attribute($this->env, $this->source, $context["changedEntity"], "className", [], "any", false, false, false, 17), "id" => twig_join_filter(twig_get_attribute($this->env, $this->source, $context["changedEntity"], "id", [], "any", false, false, false, 17), ",")]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["changedEntity"], "className", [], "any", false, false, false, 17), "html", null, true);
            echo "</a></td>
        <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_join_filter(twig_get_attribute($this->env, $this->source, $context["changedEntity"], "id", [], "any", false, false, false, 18), ", "), "html", null, true);
            echo "</td>
        <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["changedEntity"], "revisionType", [], "any", false, false, false, 19), "html", null, true);
            echo "</td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['changedEntity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    </tbody>
</table>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SimpleThingsEntityAudit/Audit/view_revision.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 22,  103 => 19,  99 => 18,  93 => 17,  90 => 16,  86 => 15,  74 => 6,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@SimpleThingsEntityAudit/layout.html.twig\" %}

{% block simplethings_entityaudit_content %}
<h1>Entities changed in revision {{ revision.rev }}</h1>

<p><a href=\"{{ path('simple_things_entity_audit_home') }}\">Home</a></p>

<table>
    <thead><tr>
        <th>Class Name</th>
        <th>Identifiers</th>
        <th>Revision Type</th>
    </tr></thead>
    <tbody>
{% for changedEntity in changedEntities %}
    <tr>
        <td><a href=\"{{ path('simple_things_entity_audit_viewentity_detail', { 'rev': revision.rev, 'className': changedEntity.className, 'id': changedEntity.id | join(',') }) }}\">{{ changedEntity.className }}</a></td>
        <td>{{ changedEntity.id | join(', ') }}</td>
        <td>{{ changedEntity.revisionType }}</td>
    </tr>
{% endfor %}
    </tbody>
</table>

{% endblock simplethings_entityaudit_content %}
", "@SimpleThingsEntityAudit/Audit/view_revision.html.twig", "/var/www/html/intra/vendor/sonata-project/entity-audit-bundle/src/Resources/views/Audit/view_revision.html.twig");
    }
}
