<?php

/* usuarios/usuarios/form */
class __TwigTemplate_f66fe74a6c74889ad44549b220e3edb28905192d3381450daf071a7435e7c2f8 extends Twig_Template
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
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("usuarios|form");
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
        // line 23
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("formHidden")->__invoke($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "csrf"), "method"));
        echo "
                    <input type=\"hidden\" name=\"usuario[id]\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "usuario"), "method"), "get", array(0 => "id"), "method"), "getValue", array(), "method"), "html", null, true);
        echo "\" />
                    <div class=\"row\">
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"usuario[nome]\" class=\"control-label\">Nome</label>
                                <input id=\"usuario[nome]\" name=\"usuario[nome]\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "usuario"), "method"), "get", array(0 => "nome"), "method"), "getValue", array(), "method"), "html", null, true);
        echo "\" class=\"form-control\" maxlength=\"50\">
                            </div>
                        </div>
                        <div class=\"col-md-8\">
                            <div class=\"form-group\">
                                <label for=\"usuario[email]\" class=\"control-label\">Email</label>
                                <input id=\"usuario[email]\" name=\"usuario[email]\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "usuario"), "method"), "get", array(0 => "email"), "method"), "getValue", array(), "method"), "html", null, true);
        echo "\" autocomplete=\"off\" class=\"form-control\" maxlength=\"50\">
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">
                        
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"usuario[senha]\" class=\"control-label\">Senha</label>
                                <input id=\"usuario[senha]\" name=\"usuario[senha]\" type=\"password\" autocomplete=\"off\" class=\"form-control\" maxlength=\"50\">
                            </div>
                        </div>
                        <div class=\"col-md-4\">
                            <div class=\"form-group\">
                                <label for=\"usuario[senha2]\" class=\"control-label\">Repetir a senha</label>
                                <input id=\"usuario[senha2]\" name=\"usuario[senha2]\" type=\"password\" autocomplete=\"off\" class=\"form-control\" maxlength=\"50\">
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"form-group\">
                                <div class=\"checkbox\">
                                    <input id=\"usuario[visivel]\" name=\"usuario[visivel]\" type=\"hidden\" value=\"0\">
                                    <label>
                                        <input id=\"usuario[visivel]\" name=\"usuario[visivel]\" type=\"checkbox\" value=\"1\" ";
        // line 61
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "usuario"), "method"), "get", array(0 => "visivel"), "method"), "getValue", array(), "method")) {
            echo "checked=\"checked\"";
        }
        echo ">
                                        Este usuário está visível e pode logar-se no sistema.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=\"panel-footer\">
                    ";
        // line 71
        if ((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null)) {
            // line 72
            echo "                        <button id=\"salvar\" type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                    ";
        }
        // line 74
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

    // line 85
    public function block_inlineScript($context, array $blocks = array())
    {
        // line 86
        $this->displayParentBlock("inlineScript", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$(function() {
        \$('form').remoteform({
            onOkForwardTo: '";
        // line 90
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("backTo")->__invoke();
        echo "'
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "usuarios/usuarios/form";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 90,  143 => 86,  140 => 85,  128 => 74,  124 => 72,  122 => 71,  107 => 61,  78 => 35,  69 => 29,  61 => 24,  57 => 23,  51 => 20,  45 => 17,  41 => 15,  38 => 14,  30 => 9,);
    }
}
