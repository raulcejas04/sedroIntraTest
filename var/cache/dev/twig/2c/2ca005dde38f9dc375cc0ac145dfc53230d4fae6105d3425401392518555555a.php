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
        echo "<div class=\"m-6\">
    <nav class=\"navbar navbar-expand-lg navbar-light bgsedronar\">
        <div class=\"container-fluid\">
             <a class=\"navbar-brand\" href=\"#\" style=\"margin-right: auto;\" aria-label=\"SEDRONAR Presidencia de la Nación\"> 
              <img alt=\"sedronar\" src=\"../img/logoSedronar.png\" height=\"40px\"> 
          </a> 
          <a class=\"navbar-brand\"  href=\"#\" aria-label=\"Jefatura de Gabinete de Ministros Argentina\"> 
              <img alt=\"Jefatura de Gabinete de Ministros Argentina\" src=\"../img/jefgabinetearg.png\" height=\"50px\"> 
          </a> 
            <button type=\"button\" class=\"navbar-toggler navbar-dark\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarCollapse\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                <div class=\"navbar-nav \">

                    ";
        // line 16
        if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), 0, [], "array", true, true, false, 16)) {
            // line 17
            echo "            
                        ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 18, $this->source); })()), 0, [], "array", false, false, false, 18));
            foreach ($context['_seq'] as $context["id_n0"] => $context["props_n0"]) {
                // line 19
                echo "                            ";
                if ((twig_get_attribute($this->env, $this->source, $context["props_n0"], "link", [], "any", false, false, false, 19) == "")) {
                    // line 20
                    echo "                            ";
                    $context["lnk"] = "#";
                    // line 21
                    echo "                            ";
                } else {
                    // line 22
                    echo "                                ";
                    $context["lnk"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "request", [], "any", false, false, false, 22), "baseUrl", [], "any", false, false, false, 22) . "/") . twig_get_attribute($this->env, $this->source, $context["props_n0"], "link", [], "any", false, false, false, 22));
                    // line 23
                    echo "                            ";
                }
                // line 24
                echo "

                        <div class=\"nav-item ";
                // line 26
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 26), [], "array", true, true, false, 26)) {
                    echo "dropdown";
                }
                echo "\">
                            <a href=\"";
                // line 27
                echo twig_escape_filter($this->env, (isset($context["lnk"]) || array_key_exists("lnk", $context) ? $context["lnk"] : (function () { throw new RuntimeError('Variable "lnk" does not exist.', 27, $this->source); })()), "html", null, true);
                echo "\" class=\"text-white nav-link ";
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 27), [], "array", true, true, false, 27)) {
                    echo "dropdown-toggle";
                }
                echo "\" ";
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 27), [], "array", true, true, false, 27)) {
                    echo " data-bs-toggle=\"dropdown\" ";
                }
                echo "  >";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["props_n0"], "nombre", [], "any", false, false, false, 27), "html", null, true);
                echo "</a>
                            <div class=\"dropdown-menu bgsedronar\">

                            ";
                // line 30
                if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 30), [], "array", true, true, false, 30)) {
                    // line 31
                    echo "                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 31, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["props_n0"], "id", [], "array", false, false, false, 31), [], "array", false, false, false, 31));
                    foreach ($context['_seq'] as $context["id_n1"] => $context["props_n1"]) {
                        // line 32
                        echo "                            
                                    ";
                        // line 33
                        $context["link"] = "#";
                        // line 34
                        echo "                                    ";
                        if ((twig_get_attribute($this->env, $this->source, $context["props_n1"], "link", [], "any", true, true, false, 34) && (twig_get_attribute($this->env, $this->source, $context["props_n1"], "link", [], "any", false, false, false, 34) != ""))) {
                            echo "                                    
                                    ";
                            // line 35
                            $context["link"] = twig_get_attribute($this->env, $this->source, $context["props_n1"], "link", [], "any", false, false, false, 35);
                            // line 36
                            echo "                                    ";
                        }
                        // line 37
                        echo "                                    <a href=\"";
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "request", [], "any", false, false, false, 37), "baseUrl", [], "any", false, false, false, 37) . "/") . (isset($context["link"]) || array_key_exists("link", $context) ? $context["link"] : (function () { throw new RuntimeError('Variable "link" does not exist.', 37, $this->source); })())), "html", null, true);
                        echo "\" class=\"dropdown-item text-white\"> ";
                        if ((twig_get_attribute($this->env, $this->source, $context["props_n1"], "icon", [], "array", false, false, false, 37) != "")) {
                            echo "<span class=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["props_n1"], "icon", [], "any", false, false, false, 37), "html", null, true);
                            echo "\"></span>";
                        }
                        echo " ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["props_n1"], "nombre", [], "any", false, false, false, 37), "html", null, true);
                        echo "</a>
                                
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['id_n1'], $context['props_n1'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 40
                    echo "                            ";
                }
                // line 41
                echo "                            </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id_n0'], $context['props_n0'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "            
                    ";
        }
        // line 46
        echo "                </div>


<!-- ///////////////// -->
               

            <div class=\"navbar-nav ms-auto\">
                <div class=\"nav-item dropdown\">
                ";
        // line 54
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 55
            echo "                    <a href=\"#\" class=\"text-white nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\"><i class=\"fs-4 bi bi-person-circle\"></i> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "user", [], "any", false, false, false, 55), "html", null, true);
            echo " Diego Castaño</a>
                    <div class=\"dropdown-menu bgsedronar\">
                        <a href=\"";
            // line 57
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("change_password");
            echo "\" class=\"text-white dropdown-item\">Cambio de clave</a>
                        <div class=\"dropdown-divider\"></div>
                         <a href=\"";
            // line 59
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("misDatos");
            echo "\" class=\"text-white dropdown-item\">Mis datos</a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"";
            // line 61
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("oauth_logout");
            echo "\" class=\"dropdown-item text-white\">Desconectarse</a>
                    </div>
                ";
        } else {
            // line 64
            echo "                    <a href=\"#\" class=\"text-white nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\">Login</a>
                    <div class=\"dropdown-menu bgsedronar\">
                        <a href=\"";
            // line 66
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
            echo "\" class=\"text-white dropdown-item\">Ingresar</a>
                    </div>
                ";
        }
        // line 69
        echo "                </div>
            </div>

        </div>
    </nav>
</div>
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
        return array (  209 => 69,  203 => 66,  199 => 64,  193 => 61,  188 => 59,  183 => 57,  177 => 55,  175 => 54,  165 => 46,  161 => 44,  153 => 41,  150 => 40,  132 => 37,  129 => 36,  127 => 35,  122 => 34,  120 => 33,  117 => 32,  112 => 31,  110 => 30,  94 => 27,  88 => 26,  84 => 24,  81 => 23,  78 => 22,  75 => 21,  72 => 20,  69 => 19,  65 => 18,  62 => 17,  60 => 16,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"m-6\">
    <nav class=\"navbar navbar-expand-lg navbar-light bgsedronar\">
        <div class=\"container-fluid\">
             <a class=\"navbar-brand\" href=\"#\" style=\"margin-right: auto;\" aria-label=\"SEDRONAR Presidencia de la Nación\"> 
              <img alt=\"sedronar\" src=\"../img/logoSedronar.png\" height=\"40px\"> 
          </a> 
          <a class=\"navbar-brand\"  href=\"#\" aria-label=\"Jefatura de Gabinete de Ministros Argentina\"> 
              <img alt=\"Jefatura de Gabinete de Ministros Argentina\" src=\"../img/jefgabinetearg.png\" height=\"50px\"> 
          </a> 
            <button type=\"button\" class=\"navbar-toggler navbar-dark\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarCollapse\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                <div class=\"navbar-nav \">

                    {% if items[0] is defined %}
            
                        {% for id_n0, props_n0 in items[0] %}
                            {%  if props_n0.link =='' %}
                            {%  set lnk = \"#\"  %}
                            {%  else  %}
                                {%  set lnk = app.request.baseUrl ~ '/' ~ props_n0.link  %}
                            {%  endif %}


                        <div class=\"nav-item {% if items[props_n0['id']] is defined %}dropdown{% endif %}\">
                            <a href=\"{{ lnk }}\" class=\"text-white nav-link {% if items[props_n0['id']] is defined %}dropdown-toggle{% endif %}\" {% if items[props_n0['id']] is defined %} data-bs-toggle=\"dropdown\" {% endif %}  >{{ props_n0.nombre }}</a>
                            <div class=\"dropdown-menu bgsedronar\">

                            {% if items[props_n0['id']] is defined %}
                                {% for id_n1, props_n1 in items[props_n0['id']] %}
                            
                                    {% set link = \"#\" %}
                                    {% if props_n1.link is defined and props_n1.link!= \"\" %}                                    
                                    {% set link = props_n1.link %}
                                    {% endif %}
                                    <a href=\"{{ app.request.baseUrl ~ '/' ~ link }}\" class=\"dropdown-item text-white\"> {% if props_n1['icon']!='' %}<span class=\"{{props_n1.icon}}\"></span>{% endif %} {{props_n1.nombre}}</a>
                                
                                {% endfor %}
                            {% endif %}
                            </div>
                            </div>
                        {% endfor %}
            
                    {% endif %}
                </div>


<!-- ///////////////// -->
               

            <div class=\"navbar-nav ms-auto\">
                <div class=\"nav-item dropdown\">
                {% if is_granted('IS_AUTHENTICATED_FULLY') %}
                    <a href=\"#\" class=\"text-white nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\"><i class=\"fs-4 bi bi-person-circle\"></i> {{ app.user }} Diego Castaño</a>
                    <div class=\"dropdown-menu bgsedronar\">
                        <a href=\"{{ path('change_password') }}\" class=\"text-white dropdown-item\">Cambio de clave</a>
                        <div class=\"dropdown-divider\"></div>
                         <a href=\"{{ path('misDatos') }}\" class=\"text-white dropdown-item\">Mis datos</a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"{{ path('oauth_logout') }}\" class=\"dropdown-item text-white\">Desconectarse</a>
                    </div>
                {% else %}
                    <a href=\"#\" class=\"text-white nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\">Login</a>
                    <div class=\"dropdown-menu bgsedronar\">
                        <a href=\"{{ path('dashboard') }}\" class=\"text-white dropdown-item\">Ingresar</a>
                    </div>
                {% endif %}
                </div>
            </div>

        </div>
    </nav>
</div>
", "menu/index.html.twig", "/var/www/html/intra/templates/menu/index.html.twig");
    }
}
