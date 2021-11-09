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

/* flashAlerts.html.twig */
class __TwigTemplate_d112a79270a40148ca4e6eb1c9500cbf68796d454aa0ecdf88bb826cbf99d411 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "flashAlerts.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "flashAlerts.html.twig"));

        // line 1
        $context["showMessages"] = false;
        // line 2
        $context["msgSuccess"] = twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2, $this->source); })()), "flashes", [0 => "success"], "method", false, false, false, 2);
        // line 3
        $context["msgWarning"] = twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 3, $this->source); })()), "flashes", [0 => "warning"], "method", false, false, false, 3);
        // line 4
        $context["msgDanger"] = twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "flashes", [0 => "danger"], "method", false, false, false, 4);
        // line 5
        $context["msgInfo"] = twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 5, $this->source); })()), "flashes", [0 => "info"], "method", false, false, false, 5);
        // line 6
        echo "
";
        // line 7
        if ((twig_length_filter($this->env, (isset($context["msgSuccess"]) || array_key_exists("msgSuccess", $context) ? $context["msgSuccess"] : (function () { throw new RuntimeError('Variable "msgSuccess" does not exist.', 7, $this->source); })())) > 0)) {
            $context["showMessages"] = true;
        }
        // line 8
        if ((twig_length_filter($this->env, (isset($context["msgWarning"]) || array_key_exists("msgWarning", $context) ? $context["msgWarning"] : (function () { throw new RuntimeError('Variable "msgWarning" does not exist.', 8, $this->source); })())) > 0)) {
            $context["showMessages"] = true;
        }
        // line 9
        if ((twig_length_filter($this->env, (isset($context["msgDanger"]) || array_key_exists("msgDanger", $context) ? $context["msgDanger"] : (function () { throw new RuntimeError('Variable "msgDanger" does not exist.', 9, $this->source); })())) > 0)) {
            $context["showMessages"] = true;
        }
        // line 10
        if ((twig_length_filter($this->env, (isset($context["msgInfo"]) || array_key_exists("msgInfo", $context) ? $context["msgInfo"] : (function () { throw new RuntimeError('Variable "msgInfo" does not exist.', 10, $this->source); })())) > 0)) {
            $context["showMessages"] = true;
        }
        // line 11
        echo "     
";
        // line 12
        if ((isset($context["showMessages"]) || array_key_exists("showMessages", $context) ? $context["showMessages"] : (function () { throw new RuntimeError('Variable "showMessages" does not exist.', 12, $this->source); })())) {
            // line 13
            echo "<div class=\"clearfix\"></div>
<div class=\"row\">
    ";
            // line 15
            if ((twig_length_filter($this->env, (isset($context["msgSuccess"]) || array_key_exists("msgSuccess", $context) ? $context["msgSuccess"] : (function () { throw new RuntimeError('Variable "msgSuccess" does not exist.', 15, $this->source); })())) > 0)) {
                // line 16
                echo "        <div class=\"alert alert-success\" role=\"alert\">";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["msgSuccess"]) || array_key_exists("msgSuccess", $context) ? $context["msgSuccess"] : (function () { throw new RuntimeError('Variable "msgSuccess" does not exist.', 16, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    echo "- ";
                    echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</div>
    ";
            }
            // line 18
            echo "
    ";
            // line 19
            if ((twig_length_filter($this->env, (isset($context["msgWarning"]) || array_key_exists("msgWarning", $context) ? $context["msgWarning"] : (function () { throw new RuntimeError('Variable "msgWarning" does not exist.', 19, $this->source); })())) > 0)) {
                // line 20
                echo "        <div class=\"alert alert-warning\" role=\"alert\">";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["msgWarning"]) || array_key_exists("msgWarning", $context) ? $context["msgWarning"] : (function () { throw new RuntimeError('Variable "msgWarning" does not exist.', 20, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    echo "- ";
                    echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</div>
    ";
            }
            // line 22
            echo "
    ";
            // line 23
            if ((twig_length_filter($this->env, (isset($context["msgDanger"]) || array_key_exists("msgDanger", $context) ? $context["msgDanger"] : (function () { throw new RuntimeError('Variable "msgDanger" does not exist.', 23, $this->source); })())) > 0)) {
                // line 24
                echo "        <div class=\"alert alert-danger\" role=\"alert\">";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["msgDanger"]) || array_key_exists("msgDanger", $context) ? $context["msgDanger"] : (function () { throw new RuntimeError('Variable "msgDanger" does not exist.', 24, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    echo "- ";
                    echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</div>
    ";
            }
            // line 26
            echo "
    ";
            // line 27
            if ((twig_length_filter($this->env, (isset($context["msgInfo"]) || array_key_exists("msgInfo", $context) ? $context["msgInfo"] : (function () { throw new RuntimeError('Variable "msgInfo" does not exist.', 27, $this->source); })())) > 0)) {
                // line 28
                echo "        <div class=\"alert alert-info\" role=\"alert\">";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["msgInfo"]) || array_key_exists("msgInfo", $context) ? $context["msgInfo"] : (function () { throw new RuntimeError('Variable "msgInfo" does not exist.', 28, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    echo "- ";
                    echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                    echo "<br>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</div>
    ";
            }
            // line 30
            echo "</div>
<div class=\"clearfix\"></div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "flashAlerts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 30,  143 => 28,  141 => 27,  138 => 26,  123 => 24,  121 => 23,  118 => 22,  103 => 20,  101 => 19,  98 => 18,  83 => 16,  81 => 15,  77 => 13,  75 => 12,  72 => 11,  68 => 10,  64 => 9,  60 => 8,  56 => 7,  53 => 6,  51 => 5,  49 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set showMessages = false  %}
{% set msgSuccess = app.flashes('success')   %}
{% set msgWarning = app.flashes('warning')   %}
{% set msgDanger = app.flashes('danger')   %}
{% set msgInfo = app.flashes('info')   %}

{% if msgSuccess|length>0 %}{% set showMessages = true  %}{% endif %}
{% if msgWarning|length>0 %}{% set showMessages = true  %}{% endif %}
{% if msgDanger|length>0 %}{% set showMessages = true  %}{% endif %}
{% if msgInfo|length>0 %}{% set showMessages = true  %}{% endif %}
     
{% if showMessages %}
<div class=\"clearfix\"></div>
<div class=\"row\">
    {% if msgSuccess|length>0 %}
        <div class=\"alert alert-success\" role=\"alert\">{% for message in msgSuccess %}- {{ message }}<br>{% endfor %}</div>
    {% endif  %}

    {% if msgWarning|length>0 %}
        <div class=\"alert alert-warning\" role=\"alert\">{% for message in msgWarning %}- {{ message }}<br>{% endfor %}</div>
    {% endif  %}

    {% if msgDanger|length>0 %}
        <div class=\"alert alert-danger\" role=\"alert\">{% for message in msgDanger %}- {{ message }}<br>{% endfor %}</div>
    {% endif  %}

    {% if msgInfo|length>0 %}
        <div class=\"alert alert-info\" role=\"alert\">{% for message in msgInfo %}- {{ message }}<br>{% endfor %}</div>
    {% endif  %}
</div>
<div class=\"clearfix\"></div>
{% endif  %}", "flashAlerts.html.twig", "/home/ntbdesa/www/sedronar/sedroIntra/templates/flashAlerts.html.twig");
    }
}
