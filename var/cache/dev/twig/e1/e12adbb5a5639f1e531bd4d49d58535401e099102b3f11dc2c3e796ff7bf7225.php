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

/* @SimpleThingsEntityAudit/Audit/compare.html.twig */
class __TwigTemplate_42f6bc98665db7ee245bfe121737024f40e500d1799df5eac9c0122e75123703 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/compare.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SimpleThingsEntityAudit/Audit/compare.html.twig"));

        // line 17
        $macros["helper"] = $this->macros["helper"] = $this;
        // line 1
        $this->parent = $this->loadTemplate("@SimpleThingsEntityAudit/layout.html.twig", "@SimpleThingsEntityAudit/Audit/compare.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 19
    public function block_simplethings_entityaudit_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "simplethings_entityaudit_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "simplethings_entityaudit_content"));

        // line 20
        echo "<h1>Comparing ";
        echo twig_escape_filter($this->env, (isset($context["className"]) || array_key_exists("className", $context) ? $context["className"] : (function () { throw new RuntimeError('Variable "className" does not exist.', 20, $this->source); })()), "html", null, true);
        echo " with identifiers of ";
        echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 20, $this->source); })()), "html", null, true);
        echo " between revisions ";
        echo twig_escape_filter($this->env, (isset($context["oldRev"]) || array_key_exists("oldRev", $context) ? $context["oldRev"] : (function () { throw new RuntimeError('Variable "oldRev" does not exist.', 20, $this->source); })()), "html", null, true);
        echo " and ";
        echo twig_escape_filter($this->env, (isset($context["newRev"]) || array_key_exists("newRev", $context) ? $context["newRev"] : (function () { throw new RuntimeError('Variable "newRev" does not exist.', 20, $this->source); })()), "html", null, true);
        echo "</h1>

<table>
    <thead><tr>
        <th>Field</th>
        <th>Deleted</th>
        <th>Same</th>
        <th>Updated</th>
    </tr></thead>
    <tbody>
    ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diff"]) || array_key_exists("diff", $context) ? $context["diff"] : (function () { throw new RuntimeError('Variable "diff" does not exist.', 30, $this->source); })()));
        foreach ($context['_seq'] as $context["field"] => $context["value"]) {
            // line 31
            echo "    <tr>
        <td>";
            // line 32
            echo twig_escape_filter($this->env, $context["field"], "html", null, true);
            echo "</td>
        <td>
            ";
            // line 34
            echo twig_call_macro($macros["helper"], "macro_showValue", [twig_get_attribute($this->env, $this->source, $context["value"], "old", [], "any", false, false, false, 34)], 34, $context, $this->getSourceContext());
            echo "
        </td>
        <td>
            ";
            // line 37
            echo twig_call_macro($macros["helper"], "macro_showValue", [twig_get_attribute($this->env, $this->source, $context["value"], "same", [], "any", false, false, false, 37)], 37, $context, $this->getSourceContext());
            echo "
        </td>
        <td>
            ";
            // line 40
            echo twig_call_macro($macros["helper"], "macro_showValue", [twig_get_attribute($this->env, $this->source, $context["value"], "new", [], "any", false, false, false, 40)], 40, $context, $this->getSourceContext());
            echo "
        </td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['field'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "    </tbody>
</table>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 3
    public function macro_showValue($__value__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "value" => $__value__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "showValue"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "showValue"));

            // line 4
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "timestamp", [], "any", true, true, false, 4)) {
                // line 5
                echo "        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 5, $this->source); })()), "m/d/Y"), "html", null, true);
                echo "
    ";
            } elseif (twig_test_iterable(            // line 6
(isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 6, $this->source); })()))) {
                // line 7
                echo "        <ul>
        ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 8, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                    // line 9
                    echo "            <li>";
                    echo twig_escape_filter($this->env, $context["element"], "html", null, true);
                    echo "</li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "        </ul>
    ";
            } else {
                // line 13
                echo "        ";
                echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 13, $this->source); })()), "html", null, true);
                echo "
    ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@SimpleThingsEntityAudit/Audit/compare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 13,  183 => 11,  174 => 9,  170 => 8,  167 => 7,  165 => 6,  160 => 5,  157 => 4,  138 => 3,  125 => 44,  115 => 40,  109 => 37,  103 => 34,  98 => 32,  95 => 31,  91 => 30,  71 => 20,  61 => 19,  50 => 1,  48 => 17,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@SimpleThingsEntityAudit/layout.html.twig\" %}

{% macro showValue(value) %}
    {% if value.timestamp is defined %}
        {{ value|date('m/d/Y') }}
    {% elseif value is iterable %}
        <ul>
        {% for element in value %}
            <li>{{ element }}</li>
        {% endfor %}
        </ul>
    {% else %}
        {{ value }}
    {% endif %}
{% endmacro %}

{% import _self as helper %}

{% block simplethings_entityaudit_content %}
<h1>Comparing {{ className }} with identifiers of {{ id }} between revisions {{ oldRev }} and {{ newRev }}</h1>

<table>
    <thead><tr>
        <th>Field</th>
        <th>Deleted</th>
        <th>Same</th>
        <th>Updated</th>
    </tr></thead>
    <tbody>
    {% for field, value in diff %}
    <tr>
        <td>{{ field }}</td>
        <td>
            {{ helper.showValue(value.old) }}
        </td>
        <td>
            {{ helper.showValue(value.same) }}
        </td>
        <td>
            {{ helper.showValue(value.new) }}
        </td>
    </tr>
    {% endfor %}
    </tbody>
</table>

{% endblock simplethings_entityaudit_content %}
", "@SimpleThingsEntityAudit/Audit/compare.html.twig", "/var/www/html/intra/vendor/sonata-project/entity-audit-bundle/src/Resources/views/Audit/compare.html.twig");
    }
}
