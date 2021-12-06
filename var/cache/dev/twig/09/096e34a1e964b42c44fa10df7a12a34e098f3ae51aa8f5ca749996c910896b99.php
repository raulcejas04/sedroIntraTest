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

/* footer.html.twig */
class __TwigTemplate_545607d506ba850c924137b41450354a19094e4ee19ec0e5a4253b1f979a40db extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "footer.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "footer.html.twig"));

        // line 1
        echo "<footer class=\"bd-footer bgsedronar\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4 contacto\">
            <h3 class=\"titulo\">Contacto</h3>
            <h4 class=\"subtitulo\">Sedronar</h4>
            <h6><a href=\"https://www.sedronar.gov.ar\" target=\"_blank\">https://www.sedronar.gov.ar</a></h6>
            <h6><a href=\"tel: +54 (011) 4320-1200\" target=\"_blank\"> +54 (011) 4320-1200</a></h6>
            <h6><a href=\"mailto:info@sedronar.gov.ar\" target=\"_blank\">info@sedronar.gov.ar</a></h6>
            </div>

            <div class=\"col-md social footerbgsedronar\">
            </div>

            <div class=\"col-12 mt-5\">
                <a href=\"#\" class=\"footer-subir\" title=\"Volver arriba\"><img src=\"/img/arriba.png\" alt=\"Volver arriba\"></a>
            </div>
        </div>
    </div>
</footer>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer class=\"bd-footer bgsedronar\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-4 contacto\">
            <h3 class=\"titulo\">Contacto</h3>
            <h4 class=\"subtitulo\">Sedronar</h4>
            <h6><a href=\"https://www.sedronar.gov.ar\" target=\"_blank\">https://www.sedronar.gov.ar</a></h6>
            <h6><a href=\"tel: +54 (011) 4320-1200\" target=\"_blank\"> +54 (011) 4320-1200</a></h6>
            <h6><a href=\"mailto:info@sedronar.gov.ar\" target=\"_blank\">info@sedronar.gov.ar</a></h6>
            </div>

            <div class=\"col-md social footerbgsedronar\">
            </div>

            <div class=\"col-12 mt-5\">
                <a href=\"#\" class=\"footer-subir\" title=\"Volver arriba\"><img src=\"/img/arriba.png\" alt=\"Volver arriba\"></a>
            </div>
        </div>
    </div>
</footer>
", "footer.html.twig", "/var/www/html/intra/templates/footer.html.twig");
    }
}
