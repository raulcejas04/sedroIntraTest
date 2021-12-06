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

/* @SimpleThingsEntityAudit/Audit/view_entity.html.twig */
class __TwigTemplate_f6ebc9ed2c972717dc78c96c167458d9dd6b7acad9a5463fb35c8760322361e7 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/view_entity.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/view_entity.html.twig"));

        $this->parent = $this->loadTemplate("@SimpleThingsEntityAudit/layout.html.twig", "@SimpleThingsEntityAudit/Audit/view_entity.html.twig", 1);
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
        echo "<h1>Change history for ";
        echo twig_escape_filter($this->env, (isset($context["className"]) || array_key_exists("className", $context) ? $context["className"] : (function () { throw new RuntimeError('Variable "className" does not exist.', 4, $this->source); })()), "html", null, true);
        echo " with identifiers of ";
        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 4, $this->source); })()), "html", null, true);
        echo "</h1>

<p><a href=\"";
        // line 6
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("simple_things_entity_audit_home");
        echo "\">Home</a></p>

<form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("simple_things_entity_audit_compare", ["className" => (isset($context["className"]) || array_key_exists("className", $context) ? $context["className"] : (function () { throw new RuntimeError('Variable "className" does not exist.', 8, $this->source); })()), "id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 8, $this->source); })())]), "html", null, true);
        echo "\" method=\"get\">
<table>
    <thead>
    <tr>
        <th colspan=\"3\">&nbsp;</th>
        <th colspan=\"2\">Compare</th>
    </tr>
    <tr>
        <th>Revision</th>
        <th>Date</th>
        <th>User</th>
        <th>Old</th>
        <th>New</th>
    </tr>
    </thead>
    <tbody>

";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["revisions"]) || array_key_exists("revisions", $context) ? $context["revisions"] : (function () { throw new RuntimeError('Variable "revisions" does not exist.', 25, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["revision"]) {
            // line 26
            echo "    <tr>
        <td><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("simple_things_entity_audit_viewentity_detail", ["rev" => twig_get_attribute($this->env, $this->source, $context["revision"], "rev", [], "any", false, false, false, 27), "className" => (isset($context["className"]) || array_key_exists("className", $context) ? $context["className"] : (function () { throw new RuntimeError('Variable "className" does not exist.', 27, $this->source); })()), "id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 27, $this->source); })())]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["revision"], "rev", [], "any", false, false, false, 27), "html", null, true);
            echo "</a></td>
        <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["revision"], "timestamp", [], "any", false, false, false, 28), "r"), "html", null, true);
            echo "</td>
        <td>";
            // line 29
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["revision"], "username", [], "any", true, true, false, 29)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["revision"], "username", [], "any", false, false, false, 29), "Anonymous")) : ("Anonymous")), "html", null, true);
            echo "</td>

        <td><input type=\"radio\" name=\"oldRev\" value=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["revision"], "rev", [], "any", false, false, false, 31), "html", null, true);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 31) == 2)) {
                echo " checked=\"checked\"";
            }
            echo " /></td>
        <td><input type=\"radio\" name=\"newRev\" value=\"";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["revision"], "rev", [], "any", false, false, false, 32), "html", null, true);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 32) == 1)) {
                echo " checked=\"checked\"";
            }
            echo " /></td>
    </tr>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['revision'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    </tbody>
</table>

    <input type=\"submit\" value=\"Compare Revisions\" />
</form>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SimpleThingsEntityAudit/Audit/view_entity.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 35,  144 => 32,  136 => 31,  131 => 29,  127 => 28,  121 => 27,  118 => 26,  101 => 25,  81 => 8,  76 => 6,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@SimpleThingsEntityAudit/layout.html.twig\" %}

{% block simplethings_entityaudit_content %}
<h1>Change history for {{ className }} with identifiers of {{ id }}</h1>

<p><a href=\"{{ path('simple_things_entity_audit_home') }}\">Home</a></p>

<form action=\"{{ path('simple_things_entity_audit_compare', { 'className': className, 'id': id }) }}\" method=\"get\">
<table>
    <thead>
    <tr>
        <th colspan=\"3\">&nbsp;</th>
        <th colspan=\"2\">Compare</th>
    </tr>
    <tr>
        <th>Revision</th>
        <th>Date</th>
        <th>User</th>
        <th>Old</th>
        <th>New</th>
    </tr>
    </thead>
    <tbody>

{% for revision in revisions %}
    <tr>
        <td><a href=\"{{ path('simple_things_entity_audit_viewentity_detail', { 'rev': revision.rev, 'className': className, 'id': id })}}\">{{ revision.rev }}</a></td>
        <td>{{ revision.timestamp | date('r') }}</td>
        <td>{{ revision.username|default('Anonymous') }}</td>

        <td><input type=\"radio\" name=\"oldRev\" value=\"{{ revision.rev }}\"{% if loop.index == 2 %} checked=\"checked\"{% endif %} /></td>
        <td><input type=\"radio\" name=\"newRev\" value=\"{{ revision.rev }}\"{% if loop.index == 1 %} checked=\"checked\"{% endif %} /></td>
    </tr>
{% endfor %}
    </tbody>
</table>

    <input type=\"submit\" value=\"Compare Revisions\" />
</form>

{% endblock simplethings_entityaudit_content %}
", "@SimpleThingsEntityAudit/Audit/view_entity.html.twig", "/var/www/html/intra/vendor/sonata-project/entity-audit-bundle/src/Resources/views/Audit/view_entity.html.twig");
    }
}
