<?php

/* filtros/filtros/form */
class __TwigTemplate_33ede1270bba14abcd53d16fac0a08612921bde6f35969abc11a4d1a59a456ea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout/layout");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'inlineScript' => array($this, 'block_inlineScript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "<div class=\"row\">
    <div class=\"col-md-12\">
        <form action=\"";
        // line 17
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros|form");
        echo "\" method=\"post\" role=\"form\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    
                    ";
        // line 24
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formHidden")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "csrf"), "method"));
        echo "
                    
                    <input type=\"hidden\" name=\"filtro[id]\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "filtro"), "method"), "get", array(0 => "id"), "method"), "getValue", array(), "method"), "html", null, true);
        echo "\" />
                    
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"filtro[nome]\" class=\"control-label\">Nome</label>
                                <input id=\"filtro[nome]\" name=\"filtro[nome]\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "filtro"), "method"), "get", array(0 => "nome"), "method"), "getValue", array(), "method"), "html", null, true);
        echo "\" class=\"form-control\" maxlength=\"50\">
                            </div>
                        </div>                        
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"filtro[pai]\" class=\"control-label\">Filtro</label>
                                ";
        // line 41
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formSelect")->__invoke($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "filtro"), "method"), "get", array(0 => "pai"), "method"));
        echo "
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        
                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"checkbox\">
                                    <input id=\"filtro[visivel]\" name=\"filtro[visivel]\" type=\"hidden\" value=\"0\">
                                    <label>
                                        <input id=\"filtro[visivel]\" name=\"filtro[visivel]\" type=\"checkbox\" value=\"1\" ";
        // line 53
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "filtro"), "method"), "get", array(0 => "visivel"), "method"), "getValue", array(), "method")) {
            echo "checked=\"checked\"";
        }
        echo ">
                                        Está página está visível.
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class=\"panel-footer\">
                    ";
        // line 63
        if ((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null)) {
            // line 64
            echo "                        <button id=\"salvar\" type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                    ";
        }
        // line 66
        echo "                    <a href=\"";
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("backTo")->__invoke();
        echo "\" class=\"btn btn-default\">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>
";
    }

    // line 77
    public function block_inlineScript($context, array $blocks = array())
    {
        // line 78
        $this->displayParentBlock("inlineScript", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$(function() {
        \$('form').remoteform({
            onOkForwardTo: '";
        // line 82
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("backTo")->__invoke();
        echo "'
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "filtros/filtros/form";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 82,  135 => 78,  132 => 77,  120 => 66,  116 => 64,  114 => 63,  99 => 53,  84 => 41,  72 => 32,  63 => 26,  58 => 24,  51 => 20,  45 => 17,  41 => 15,  38 => 14,  30 => 9,);
    }
}
