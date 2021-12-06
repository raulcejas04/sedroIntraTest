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

/* emails/blanqueoDePassword.html.twig */
class __TwigTemplate_863cb53eb579cb40a1d9b04fc5b857b10aa76bb8820b4dc14f6dc50e5cfb0345 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/blanqueoDePassword.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/blanqueoDePassword.html.twig"));

        // line 1
        ob_start();
        // line 2
        echo "<style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
      
    }
    </style>
  <div class=\"\" style=\"background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;\">    
    <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;\">
      <tr>
        <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top;\">&nbsp;</td>
        <td class=\"container\" style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;\">
          <div class=\"content\" style=\"display: block; Margin: 0 auto; max-width: 580px; padding: 10px;\">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role=\"presentation\" class=\"main\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;\">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class=\"wrapper\" style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; padding: 20px;\">
                  <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;\">
                    <tr>
                      <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top;\">
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            <b>Hola ";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 109, $this->source); })()), "html", null, true);
        echo "</b>
                        </p>
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            Hemos recibido la solicitud de blanqueo de contraseña
                        </p>
                        <p>Éstos son sus nuevos datos de acceso al panel de administración</p>
                        <ul>
                            <li><b>Usuario: </b>";
        // line 116
        echo twig_escape_filter($this->env, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 116, $this->source); })()), "html", null, true);
        echo "</li>
                            <li><b>Contraseña: </b>";
        // line 117
        echo twig_escape_filter($this->env, (isset($context["password"]) || array_key_exists("password", $context) ? $context["password"] : (function () { throw new RuntimeError('Variable "password" does not exist.', 117, $this->source); })()), "html", null, true);
        echo "</li>
                        </ul>

                        <p>
                            Recuerde que esta contraseña es temporal y debe cambiarse al ingresar al panel de administración.
                        </p>

                        <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; \">
                          <tbody>
                            <tr>
                              <td align=\"left\" style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;\">
                                <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;\">
                                  <tbody>
                                    <tr>
                                      <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;\">
                                        <a href=\"";
        // line 132
        echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 132, $this->source); })()), "html", null, true);
        echo "\" target=\"_blank\" style=\"display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;\">
                                            mi panel de administración
                                        </a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            Si su navegador no muestra el botón correctamente, copie y pegue el siguiente enlace en la barra de su navegador web
                        </p>
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            ";
        // line 147
        echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 147, $this->source); })()), "html", null, true);
        echo "
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class=\"footer\" style=\"clear: both; Margin-top: 10px; text-align: center; width: 100%;\">
              <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;\">
                <tr>
                  <td class=\"content-block\" style=\"font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;\">
                    <span class=\"apple-link\" style=\"color: #999999; font-size: 12px; text-align: center;\">
                        SEDRONAR
                    </span>
                    <br>Este email es enviado automáticamente por el sistema de SEDRONAR, <br>por favor <b>no responda este email</b>.
                    ";
        // line 171
        echo "                  </td>
                </tr>
                
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top;\">&nbsp;</td>
      </tr>
    </table>
</div>
";
        $___internal_1ca59605c9e469d7f49bd215b2131ed474cf4e2a1a97886f47a3c53e14d38bff_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo Twig\Extra\CssInliner\twig_inline_css($___internal_1ca59605c9e469d7f49bd215b2131ed474cf4e2a1a97886f47a3c53e14d38bff_);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/blanqueoDePassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 1,  227 => 171,  204 => 147,  186 => 132,  168 => 117,  164 => 116,  154 => 109,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% apply inline_css %}
<style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
      
    }
    </style>
  <div class=\"\" style=\"background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;\">    
    <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;\">
      <tr>
        <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top;\">&nbsp;</td>
        <td class=\"container\" style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;\">
          <div class=\"content\" style=\"display: block; Margin: 0 auto; max-width: 580px; padding: 10px;\">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role=\"presentation\" class=\"main\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;\">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class=\"wrapper\" style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; padding: 20px;\">
                  <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;\">
                    <tr>
                      <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top;\">
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            <b>Hola {{ name }}</b>
                        </p>
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            Hemos recibido la solicitud de blanqueo de contraseña
                        </p>
                        <p>Éstos son sus nuevos datos de acceso al panel de administración</p>
                        <ul>
                            <li><b>Usuario: </b>{{ user }}</li>
                            <li><b>Contraseña: </b>{{ password }}</li>
                        </ul>

                        <p>
                            Recuerde que esta contraseña es temporal y debe cambiarse al ingresar al panel de administración.
                        </p>

                        <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; \">
                          <tbody>
                            <tr>
                              <td align=\"left\" style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;\">
                                <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;\">
                                  <tbody>
                                    <tr>
                                      <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;\">
                                        <a href=\"{{ url }}\" target=\"_blank\" style=\"display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;\">
                                            mi panel de administración
                                        </a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            Si su navegador no muestra el botón correctamente, copie y pegue el siguiente enlace en la barra de su navegador web
                        </p>
                        <p style=\"font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;\">
                            {{ url }}
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class=\"footer\" style=\"clear: both; Margin-top: 10px; text-align: center; width: 100%;\">
              <table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;\">
                <tr>
                  <td class=\"content-block\" style=\"font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;\">
                    <span class=\"apple-link\" style=\"color: #999999; font-size: 12px; text-align: center;\">
                        SEDRONAR
                    </span>
                    <br>Este email es enviado automáticamente por el sistema de SEDRONAR, <br>por favor <b>no responda este email</b>.
                    {# //TODO: agregar un email de contacto de SEDRONAR 
                        <br><b>contacto: </b> 
                        <a target=\"_blank\" href=\"mailto:contacto@sedronar.gob.ar\">contacto@sedronar.gob.ar</a>
                    #}
                  </td>
                </tr>
                
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style=\"font-family: sans-serif; font-size: 14px; vertical-align: top;\">&nbsp;</td>
      </tr>
    </table>
</div>
{% endapply %}", "emails/blanqueoDePassword.html.twig", "/var/www/html/intra/templates/emails/blanqueoDePassword.html.twig");
    }
}
