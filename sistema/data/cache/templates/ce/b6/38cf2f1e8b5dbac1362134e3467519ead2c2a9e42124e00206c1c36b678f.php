<?php

/* layout/layout */
class __TwigTemplate_ceb638cf2f1e8b5dbac1362134e3467519ead2c2a9e42124e00206c1c36b678f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'style' => array($this, 'block_style'),
            'headScript' => array($this, 'block_headScript'),
            'content' => array($this, 'block_content'),
            'inlineScript' => array($this, 'block_inlineScript'),
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
        ";
        // line 7
        $this->displayBlock('meta', $context, $blocks);
        // line 8
        echo "        <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link href=\"";
        // line 9
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/bootstrap/css/bootstrap.min.css");
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"";
        // line 10
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/css/estilos.css");
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"";
        // line 11
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/css/colorbox/colorbox.css");
        echo "\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\">
        ";
        // line 12
        $this->displayBlock('style', $context, $blocks);
        // line 13
        echo "        <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
            <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
        <![endif]-->
        <script type=\"text/javascript\" src=\"";
        // line 17
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/jquery/jquery-1.10.2.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 18
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/jquery/jquery-ui-1.10.4.custom.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 19
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/bootstrap/js/bootstrap.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 20
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/js/jquery.remoteform.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 21
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/js/jquery.maskedinput.min.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 22
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/js/jquery.maskMoney.js");
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 23
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("basePath")->__invoke("/assets/application/js/colorbox/jquery.colorbox-min.js");
        echo "\"></script>
        ";
        // line 24
        $this->displayBlock('headScript', $context, $blocks);
        // line 25
        echo "    </head>
    <body class=\"";
        // line 26
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("bodyClass")->__invoke();
        echo "\">
        <div id=\"wrap\">
            <div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                <div class=\"container\">
                    <span class=\"promocao\">No Loop - Imobiliária</span>
                    ";
        // line 31
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->env->getExtension("zfc-twig")->getRenderer()->plugin("navigation")->__invoke("application.navigation"), "menu", array(), "method"), "setUlClass", array(0 => "nav navbar-nav"), "method"), "setPartial", array(0 => "shift.partial.bootstrap_menu"), "method");
        echo "
                </div>
            </div>
            <div class=\"container\">
                <div id=\"flash\">";
        // line 35
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("flash")->__invoke();
        echo "</div>
                ";
        // line 37
        echo "                ";
        $this->displayBlock('content', $context, $blocks);
        // line 38
        echo "            </div>
        </div>
        <div id=\"footer\">
            <div class=\"container\">
                <p class=\"text-muted\">
                    <span><strong>";
        // line 43
        echo twig_escape_filter($this->env, twig_constant("APP_NAME"), "html", null, true);
        echo "</strong> - No Loop &copy; 2014</span>
                    <span class=\"pull-right\"><strong>";
        // line 44
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("nomeUsuarioLogado")->__invoke();
        echo "</strong> - v";
        echo twig_escape_filter($this->env, twig_constant("APP_VERSION"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('usedMemory')->twigUsedMemory(), "html", null, true);
        echo "</span>
                </p>
            </div>
        </div>
        ";
        // line 48
        $this->displayBlock('inlineScript', $context, $blocks);
        // line 49
        echo "        ";
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("highlight")->__invoke();
        echo "
        ";
        // line 51
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

    // line 7
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, twig_constant("APP_NAME"), "html", null, true);
    }

    // line 12
    public function block_style($context, array $blocks = array())
    {
    }

    // line 24
    public function block_headScript($context, array $blocks = array())
    {
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        echo (isset($context["content"]) ? $context["content"] : null);
    }

    // line 48
    public function block_inlineScript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout/layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 48,  185 => 37,  180 => 24,  175 => 12,  169 => 8,  164 => 7,  144 => 51,  139 => 49,  137 => 48,  126 => 44,  122 => 43,  115 => 38,  112 => 37,  108 => 35,  101 => 31,  93 => 26,  90 => 25,  88 => 24,  84 => 23,  80 => 22,  76 => 21,  72 => 20,  68 => 19,  64 => 18,  60 => 17,  54 => 13,  52 => 12,  48 => 11,  44 => 10,  40 => 9,  35 => 8,  33 => 7,  25 => 1,);
    }
}
