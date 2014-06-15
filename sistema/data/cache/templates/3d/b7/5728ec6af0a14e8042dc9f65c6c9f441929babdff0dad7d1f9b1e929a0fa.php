<?php

/* cms/cms/form */
class __TwigTemplate_3db75728ec6af0a14e8042dc9f65c6c9f441929babdff0dad7d1f9b1e929a0fa extends Twig_Template
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
        // line 18
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms|form");
        echo "\" method=\"post\" role=\"form\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    
                    ";
        // line 25
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formHidden")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "id"), "method"));
        echo "                    
                    ";
        // line 26
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formHidden")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "csrf"), "method"));
        echo "
                    
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"titulo\" class=\"control-label\">Titulo</label>
                                ";
        // line 32
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formElement")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "titulo"), "method"));
        echo "
                            </div>
                        </div>                        
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"texto\" class=\"control-label\">Texto</label>
                                ";
        // line 40
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formElement")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "texto"), "method"));
        echo "
                            </div>
                        </div>                        
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"metaDescricao\" class=\"control-label\">Meta Descrição</label>
                                ";
        // line 48
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formElement")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "metaDescricao"), "method"));
        echo "
                            </div>
                        </div>                        
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"metaPalavrasChave\" class=\"control-label\">Meta Palavras chave</label>
                                ";
        // line 56
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formElement")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "metaPalavrasChave"), "method"));
        echo "
                            </div>
                        </div>                        
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <div class=\"checkbox\">
                                    <label>
                                        ";
        // line 65
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formElement")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "visivel"), "method"));
        echo "
                                        Está página está visível.
                                    </label>
                                </div>
                            </div>
                        </div>                        
                    </div>

                </div>
                <div class=\"panel-footer\">
                    ";
        // line 75
        if ((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null)) {
            // line 76
            echo "                        <button id=\"salvar\" type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                    ";
        }
        // line 78
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

    // line 89
    public function block_inlineScript($context, array $blocks = array())
    {
        // line 90
        $this->displayParentBlock("inlineScript", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$(function() {
        \$('form').remoteform({
            onOkForwardTo: '";
        // line 94
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("backTo")->__invoke();
        echo "'
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "cms/cms/form";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 94,  151 => 90,  148 => 89,  136 => 78,  132 => 76,  130 => 75,  117 => 65,  105 => 56,  94 => 48,  83 => 40,  72 => 32,  63 => 26,  59 => 25,  52 => 21,  46 => 18,  41 => 15,  38 => 14,  30 => 9,);
    }
}
