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

/* menu/index.html.twig */
class __TwigTemplate_f357eb6245ca60b870cd9e1f8c06ec75f5d17582b0013127fd268959a3c47e19 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "menu/index.html.twig"));

        // line 1
        echo "<!-- INICIO NAVBAR -->
<nav class=\"navbar navbar-expand-lg navbar-light bgsedronar\">
<div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"#\">Sedronar</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    
    
    <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
        ";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), 0, [], "array", true, true, false, 11)) {
            // line 12
            echo "        <ul class=\"navbar-nav\">
        ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 13, $this->source); })()), 0, [], "array", false, false, false, 13));
            foreach ($context['_seq'] as $context["id_n0"] => $context["props_n0"]) {
                // line 14
                echo "            ";
                if ((twig_get_attribute($this->env, $this->source, $context["props_n0"], "link", [], "any", false, false, false, 14) == "")) {
                    // line 15
                    echo "               ";
                    $context["lnk"] = "#";
                    // line 16
                    echo "            ";
                } else {
                    // line 17
                    echo "                ";
                    $context["lnk"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "baseUrl", [], "any", false, false, false, 17) . "/") . twig_get_attribute($this->env, $this->source, $context["props_n0"], "link", [], "any", false, false, false, 17));
                    // line 18
                    echo "            ";
                }
                // line 19
                echo "
            <li class=\"nav-item ";
                // line 20
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 20), [], "array", true, true, false, 20)) {
                    echo "dropdown";
                }
                echo "\"  id=\"menu_";
                echo twig_escape_filter($this->env, $context["id_n0"], "html", null, true);
                echo "\">
                <a class=\"nav-link ";
                // line 21
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 21), [], "array", true, true, false, 21)) {
                    echo "dropdown-toggle";
                }
                echo "\" href=\"";
                echo twig_escape_filter($this->env, (isset($context["lnk"]) || array_key_exists("lnk", $context) ? $context["lnk"] : (function () { throw new RuntimeError('Variable "lnk" does not exist.', 21, $this->source); })()), "html", null, true);
                echo "\" id=\"navbarDropdownMenuLink\" role=\"button\" ";
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 21), [], "array", true, true, false, 21)) {
                    echo "data-bs-toggle=\"dropdown\"";
                }
                echo " aria-expanded=\"false\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["props_n0"], "nombre", [], "any", false, false, false, 21), "html", null, true);
                echo "</a>
                <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                    ";
                // line 23
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 23), [], "array", true, true, false, 23)) {
                    // line 24
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 24, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 24), [], "array", false, false, false, 24));
                    foreach ($context['_seq'] as $context["id_n1"] => $context["props_n1"]) {
                        // line 25
                        echo "                        
                        ";
                        // line 27
                        echo "                        ";
                        if ((twig_get_attribute($this->env, $this->source, $context["props_n1"], "divider", [], "array", false, false, false, 27) == 1)) {
                            echo "  
                            <li class=\"divider\"></li>
                        ";
                        }
                        // line 30
                        echo "                        <li>
                            ";
                        // line 31
                        $context["link"] = "#";
                        // line 32
                        echo "                            ";
                        if ((twig_get_attribute($this->env, $this->source, $context["props_n1"], "link", [], "any", true, true, false, 32) && (twig_get_attribute($this->env, $this->source, $context["props_n1"], "link", [], "any", false, false, false, 32) != ""))) {
                            echo "                                    
                              ";
                            // line 33
                            $context["link"] = twig_get_attribute($this->env, $this->source, $context["props_n1"], "link", [], "any", false, false, false, 33);
                            // line 34
                            echo "                            ";
                        }
                        // line 35
                        echo "                            <a class=\"dropdown-item\" href=\"";
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "request", [], "any", false, false, false, 35), "baseUrl", [], "any", false, false, false, 35) . "/") . (isset($context["link"]) || array_key_exists("link", $context) ? $context["link"] : (function () { throw new RuntimeError('Variable "link" does not exist.', 35, $this->source); })())), "html", null, true);
                        echo "\">
                                ";
                        // line 36
                        if ((twig_get_attribute($this->env, $this->source, $context["props_n1"], "icon", [], "array", false, false, false, 36) != "")) {
                            echo "<span class=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["props_n1"], "icon", [], "any", false, false, false, 36), "html", null, true);
                            echo "\"></span>";
                        }
                        echo " ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["props_n1"], "nombre", [], "any", false, false, false, 36), "html", null, true);
                        echo "
                            </a>
                        </li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['id_n1'], $context['props_n1'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 40
                    echo "                    ";
                }
                // line 41
                echo "                </ul>
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id_n0'], $context['props_n0'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "        </ul>
        ";
        }
        // line 46
        echo "
    </div>


    <hr class=\"d-md-none text-white-50\">
    <ul class=\"navbar-nav flex-row flex-wrap ms-md-auto justify-content-end\">

        <!--ALERTAS-->
        ";
        // line 54
        $context["alertcount"] = 8;
        // line 55
        echo "        ";
        if (array_key_exists("alertcount", $context)) {
            // line 56
            echo "            ";
            if (((isset($context["alertcount"]) || array_key_exists("alertcount", $context) ? $context["alertcount"] : (function () { throw new RuntimeError('Variable "alertcount" does not exist.', 56, $this->source); })()) > 0)) {
                // line 57
                echo "            ";
                // line 58
                echo "            <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"/alertas\"> <span class=\"badge bg-danger\">8</span> 
                <i class=\"bi bi-bell\"></i> </a>
            </li>
            ";
            }
            // line 62
            echo "        ";
        }
        // line 63
        echo "        <!--FIN:ALERTAS-->

        <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Rol-ADMIN</a>
            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                ";
        // line 69
        echo "                <li><a class=\"dropdown-item\" href=\"#\">Rol-USER</a></li>                
                <li><a class=\"dropdown-item\" href=\"#\">Rol-SYSADMIN</a></li>
            </ul>
        </li>
        <li class=\"nav-item dropdown\">
            ";
        // line 74
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 75
            echo "                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 75, $this->source); })()), "user", [], "any", false, false, false, 75), "html", null, true);
            echo "</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"";
            // line 77
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_password");
            echo "\">Cambio de password</a></li>
                    <li><a class=\"dropdown-item\" href=\"";
            // line 78
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("oauth_logout");
            echo "\">Desconectarse</a></li>
                </ul>
            ";
        } else {
            // line 81
            echo "                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Login</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"";
            // line 83
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
            echo "\">Ingresar</a></li>                    
                </ul>
            ";
        }
        // line 86
        echo "        </li>
    </ul>    
</div>
</nav>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "menu/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 86,  238 => 83,  234 => 81,  228 => 78,  224 => 77,  218 => 75,  216 => 74,  209 => 69,  202 => 63,  199 => 62,  193 => 58,  191 => 57,  188 => 56,  185 => 55,  183 => 54,  173 => 46,  169 => 44,  161 => 41,  158 => 40,  142 => 36,  137 => 35,  134 => 34,  132 => 33,  127 => 32,  125 => 31,  122 => 30,  115 => 27,  112 => 25,  107 => 24,  105 => 23,  90 => 21,  82 => 20,  79 => 19,  76 => 18,  73 => 17,  70 => 16,  67 => 15,  64 => 14,  60 => 13,  57 => 12,  55 => 11,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- INICIO NAVBAR -->
<nav class=\"navbar navbar-expand-lg navbar-light bgsedronar\">
<div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"#\">Sedronar</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    
    
    <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
        {% if items[0] is defined %}
        <ul class=\"navbar-nav\">
        {% for id_n0, props_n0 in items[0] %}
            {%  if props_n0.link =='' %}
               {%  set lnk = \"#\"  %}
            {%  else  %}
                {%  set lnk = app.request.baseUrl ~ '/' ~ props_n0.link  %}
            {%  endif %}

            <li class=\"nav-item {% if items[props_n0['id']] is defined %}dropdown{% endif%}\"  id=\"menu_{{id_n0}}\">
                <a class=\"nav-link {% if items[props_n0['id']] is defined %}dropdown-toggle{% endif%}\" href=\"{{ lnk }}\" id=\"navbarDropdownMenuLink\" role=\"button\" {% if items[props_n0['id']] is defined %}data-bs-toggle=\"dropdown\"{% endif%} aria-expanded=\"false\">{{ props_n0.nombre }}</a>
                <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                    {% if items[props_n0['id']] is defined %}
                    {% for id_n1, props_n1 in items[props_n0['id']] %}
                        
                        {#{% if props_n1['activo'] is defined  and props_n1['activo'] %}#}
                        {% if props_n1['divider'] == 1 %}  
                            <li class=\"divider\"></li>
                        {% endif%}
                        <li>
                            {% set link = \"#\" %}
                            {% if props_n1.link is defined and props_n1.link!= \"\" %}                                    
                              {% set link = props_n1.link %}
                            {% endif %}
                            <a class=\"dropdown-item\" href=\"{{ app.request.baseUrl ~ '/' ~ link }}\">
                                {% if props_n1['icon']!='' %}<span class=\"{{props_n1.icon}}\"></span>{% endif %} {{props_n1.nombre}}
                            </a>
                        </li>
                    {% endfor %}
                    {% endif %}
                </ul>
            </li>
        {% endfor %}
        </ul>
        {% endif %}

    </div>


    <hr class=\"d-md-none text-white-50\">
    <ul class=\"navbar-nav flex-row flex-wrap ms-md-auto justify-content-end\">

        <!--ALERTAS-->
        {% set alertcount = 8 %}
        {% if alertcount is defined %}
            {% if alertcount>0 %}
            {# TODO: hacer funcionar las notificaciones #}
            <li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"/alertas\"> <span class=\"badge bg-danger\">8</span> 
                <i class=\"bi bi-bell\"></i> </a>
            </li>
            {% endif%}
        {% endif%}
        <!--FIN:ALERTAS-->

        <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Rol-ADMIN</a>
            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                {# TODO: Hacer que se muestren las opciones de acuerdo al rol del usuario (jugar con la herencia de roles en security.yaml) #}
                <li><a class=\"dropdown-item\" href=\"#\">Rol-USER</a></li>                
                <li><a class=\"dropdown-item\" href=\"#\">Rol-SYSADMIN</a></li>
            </ul>
        </li>
        <li class=\"nav-item dropdown\">
            {% if is_granted('IS_AUTHENTICATED_FULLY') %}
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">{{ app.user }}</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"{{ path('change_password') }}\">Cambio de password</a></li>
                    <li><a class=\"dropdown-item\" href=\"{{ path('oauth_logout') }}\">Desconectarse</a></li>
                </ul>
            {% else %}
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarUser\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Login</a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <li><a class=\"dropdown-item\" href=\"{{ path('dashboard') }}\">Ingresar</a></li>                    
                </ul>
            {% endif %}
        </li>
    </ul>    
</div>
</nav>
", "menu/index.html.twig", "/home/ntbdesa/www/sedronar/sedroIntra/templates/menu/index.html.twig");
    }
}
