<?php

/* usuarios/login/login */
class __TwigTemplate_d5bcbd291670b0eee28c10dda2a49a74d89f9bb2208ac81714b5f75103ee1219 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-br\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"google-site-verification\" content=\"-p5kWsP3u8LWKAfKGitQH7h8dGiChlxA5A9vBco6WUI\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Login - ";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("APP_NAME"), "html", null, true);
        echo "</title>
        <link href=\"";
        // line 8
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/bootstrap/css/bootstrap.min.css");
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"";
        // line 9
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/css/estilos.css");
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\">
        <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
            <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
        <![endif]-->
        <script type=\"text/javascript\" src=\"";
        // line 14
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/jquery/jquery-1.10.2.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 15
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/jquery/jquery-ui-1.10.4.custom.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 16
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/bootstrap/js/bootstrap.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 17
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/js/jquery.remoteform.js");
        echo "\"></script>
    </head>
    <body class=\"pagina-login\">
        <div id=\"wrap\">
            <div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                <div class=\"container\">No Loop - Imobiliária</div>
            </div>
            <div class=\"container\">
                <div id=\"flash\">";
        // line 25
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("flash")->__invoke();
        echo "</div>
                ";
        // line 27
        echo "                <div class=\"row\">
                    <div class=\"col-md-4 col-md-offset-4\">
                        <form action=\"";
        // line 29
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("login");
        echo "\" method=\"post\" role=\"form\">
                            ";
        // line 30
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formHidden")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "csrf"), "method"));
        echo "
                            <div class=\"panel panel-default\">
                                <div class=\"panel-heading\">
                                    <h3 class=\"panel-title\">Login</h3>
                                </div>
                                <div class=\"pagina-body\">
                                    <div class=\"form-group\">
                                        <label for=\"usuario[email]\" class=\"control-label\">Usuário:</label>
                                        <input id=\"usuario[email]\" name=\"usuario[email]\" autocomplete=\"off\" class=\"form-control\" maxlength=\"50\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"usuario[senha]\" class=\"control-label\">Senha</label>
                                        <input id=\"usuario[senha]\" name=\"usuario[senha]\" type=\"password\" autocomplete=\"off\" class=\"form-control\" maxlength=\"50\">
                                    </div>
                                    <div class=\"form-group\">
                                        <button id=\"salvar\" type=\"submit\" class=\"btn btn-primary\">Entrar</button>
                                    </div>
                                </div>
                                <div class=\"panel-footer\">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                ";
        // line 56
        echo "            </div>
        </div>
        <div id=\"footer\">
            <div class=\"container\">
                <p class=\"text-muted\">
                    <span><strong>";
        // line 61
        echo twig_escape_filter($this->env, twig_constant("APP_NAME"), "html", null, true);
        echo "</strong> - No Loop &copy; 2014</span>
                    <span class=\"pull-right\">v";
        // line 62
        echo twig_escape_filter($this->env, twig_constant("APP_VERSION"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('usedMemory')->twigUsedMemory(), "html", null, true);
        echo "</span>
                </p>
            </div>
        </div>
        <script type=\"text/javascript\">
            \$(function() {
                \$('form').remoteform({
                    onOkForwardTo: '";
        // line 69
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke();
        echo "'
                });
            });
        </script>
        ";
        // line 74
        echo "        <script type=\"text/javascript\">
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-43561241-13', 'promomaespersonnalite2014.com.br');
            ga('send', 'pageview');
        </script>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "usuarios/login/login";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 74,  129 => 69,  117 => 62,  113 => 61,  106 => 56,  78 => 30,  74 => 29,  70 => 27,  66 => 25,  55 => 17,  51 => 16,  47 => 15,  43 => 14,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
