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

/* @SimpleThingsEntityAudit/Audit/index.html.twig */
class __TwigTemplate_cdbebcf7c5812108ef758df15ebad0ecaa273d7cf0c24553bbf88c4ff3ad2771 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/index.html.twig"));

        $this->parent = $this->loadTemplate("@SimpleThingsEntityAudit/layout.html.twig", "@SimpleThingsEntityAudit/Audit/index.html.twig", 1);
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
        echo "<h1>Revisions</h1>

<ul>
";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["revisions"]) || array_key_exists("revisions", $context) ? $context["revisions"] : (function () { throw new RuntimeError('Variable "revisions" does not exist.', 7, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["revision"]) {
            // line 8
            echo "    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("simple_things_entity_audit_viewrevision", ["rev" => twig_get_attribute($this->env, $this->source, $context["revision"], "rev", [], "any", false, false, false, 8)]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["revision"], "timestamp", [], "any", false, false, false, 8), "r"), "html", null, true);
            echo " -- ";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["revision"], "username", [], "any", true, true, false, 8)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["revision"], "username", [], "any", false, false, false, 8), "Anonymous")) : ("Anonymous")), "html", null, true);
            echo "</a></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['revision'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SimpleThingsEntityAudit/Audit/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 10,  77 => 8,  73 => 7,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@SimpleThingsEntityAudit/layout.html.twig\" %}

{% block simplethings_entityaudit_content %}
<h1>Revisions</h1>

<ul>
{% for revision in revisions %}
    <li><a href=\"{{ path('simple_things_entity_audit_viewrevision', { 'rev': revision.rev }) }}\">{{ revision.timestamp|date('r') }} -- {{ revision.username|default('Anonymous') }}</a></li>
{% endfor %}
</ul>
{% endblock simplethings_entityaudit_content %}
", "@SimpleThingsEntityAudit/Audit/index.html.twig", "/var/www/html/intra/vendor/sonata-project/entity-audit-bundle/src/Resources/views/Audit/index.html.twig");
    }
}
