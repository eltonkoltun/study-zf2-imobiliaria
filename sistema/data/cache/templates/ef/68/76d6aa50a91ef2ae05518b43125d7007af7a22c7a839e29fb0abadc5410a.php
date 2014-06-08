<?php

/* cms/cms/index */
class __TwigTemplate_ef6876d6aa50a91ef2ae05518b43125d7007af7a22c7a839e29fb0abadc5410a extends Twig_Template
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
        echo " - Usuários";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"row\">
        <div class=\"col-md-3\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Páginas Editáveis <small>(";
        // line 19
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["quantidade"]) ? $context["quantidade"] : null)), "html", null, true);
        echo ")</small></h3>
                </div>
                <div class=\"panel-body\">
                    <span class=\"glyphicon glyphicon-plus\"></span>
                    <a href=\"";
        // line 23
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms|form");
        echo "\" class=\"ink-button green push-right\">Nova Página...</a>
                </div>
            </div>
            <form action=\"";
        // line 26
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms");
        echo "\" method=\"get\" role=\"form\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">Procurar</h3>
                    </div>
                    <div class=\"panel-body\">
                        <div class=\"form-group\">
                            <label for=\"por\" class=\"control-label\">Por</label>
                            <input id=\"por\" name=\"por\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "get", array(0 => "por"), "method"), "getValue", array(), "method"), "html", null, true);
        echo "\" class=\"form-control\">
                            <span class=\"help-block\">Age nos campos Nome e Login.</span>
                        </div>
                    </div>
                    <div class=\"panel-footer\">
                        <button id=\"procurar\" type=\"submit\" class=\"btn btn-info\">Procurar</button>
                        ";
        // line 40
        if ((isset($context["emPesquisa"]) ? $context["emPesquisa"] : null)) {
            // line 41
            echo "                            <a href=\"";
            echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms");
            echo "\" class=\"btn btn-default\">Limpar filtro</a>
                        ";
        }
        // line 43
        echo "                    </div>
                </div>
            </form>
        </div>
        <div class=\"col-md-9\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 50
        echo (isset($context["tituloGrid"]) ? $context["tituloGrid"] : null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    ";
        // line 53
        if (twig_length_filter($this->env, (isset($context["registros"]) ? $context["registros"] : null))) {
            // line 54
            echo "                        <table id=\"rotas\" class=\"table\">
                            <thead>
                                <tr>
                                    <th class=\"col-md-4\">Nome</th>
                                    <th class=\"col-md-1\">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["registros"]) ? $context["registros"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["registro"]) {
                // line 63
                echo "                                    <tr id=\"cms_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method"), "html", null, true);
                echo "\"  ";
                if (($this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "isVisivel", array(), "method") != 1)) {
                    echo "class=\"text-muted\"";
                }
                echo ">
                                        <td><a href=\"";
                // line 64
                echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms|form", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getTitulo", array(), "method"), "html", null, true);
                echo "</a></td>
                                        <td>
                                            
                                            <div class=\"dropdown\">
                                                <a data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs\" href=\"javascript:void(0);\"><span class=\"glyphicon glyphicon-cog\"></span> <b class=\"caret\"></b></a>
                                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dLabel\">

                                                    <li><a href=\"";
                // line 71
                echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms|form", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                echo "\"><span class=\"glyphicon glyphicon-edit\"></span> ";
                if ((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null)) {
                    echo "Editar";
                } else {
                    echo "Visualizar";
                }
                echo "</a></li>
                                                    
                                                    ";
                // line 73
                if (((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null) && ($this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "isFixa", array(), "method") != 1))) {
                    // line 74
                    echo "                                                        <li><a href=\"";
                    echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms|visivel", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                    echo "\" class=\"desativar\">";
                    if ($this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "isVisivel", array(), "method")) {
                        echo "<span class=\"glyphicon glyphicon-thumbs-down\"></span> Desa";
                    } else {
                        echo "<span class=\"glyphicon glyphicon-thumbs-up\"></span> A";
                    }
                    echo "tivar</a></a></li>
                                                        <li><a href=\"";
                    // line 75
                    echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("cms|excluir", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                    echo "\" class=\"excluir\"><span class=\"glyphicon glyphicon-remove\"></span> Excluir</a></a></li>
                                                    ";
                }
                // line 77
                echo "                                                </ul>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['registro'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "                            </tbody>
                        </table>
                    ";
        } else {
            // line 86
            echo "                        <span class=\"text-muted\">Nenhum registro encontrado!</span>
                    ";
        }
        // line 88
        echo "                </div>
                ";
        // line 89
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["registros"]) ? $context["registros"] : null), "getPages", array(), "method"), "pagesInRange")) > 1)) {
            // line 90
            echo "                    <div class=\"panel-footer\">
                        ";
            // line 91
            echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("paginationControl")->__invoke((isset($context["registros"]) ? $context["registros"] : null), "Sliding", "shift.partial.paginator", array("route" => "cms"));
            echo "
                    </div>
                ";
        }
        // line 94
        echo "            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class=\"modal fade\" id=\"destativar\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                    <h4 class=\"modal-title\" id=\"myModalLabel\">Atenção</h4>
                </div>
                <div class=\"modal-body\">
                    ...
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
                    <a href=\"\" class=\"btn btn-primary\">Continuar</a>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 118
    public function block_inlineScript($context, array $blocks = array())
    {
        // line 119
        echo "    ";
        $this->displayParentBlock("inlineScript", $context, $blocks);
        echo "
    <script type=\"text/javascript\">
        \$(function() {

        ";
        // line 123
        if (((!(isset($context["protegido"]) ? $context["protegido"] : null)) && (!(isset($context["inserindo"]) ? $context["inserindo"] : null)))) {
            // line 124
            echo "                \$('.desativar, .excluir').click(function() {

                    situacao = \$(this).text();
                    situacao = situacao.toLowerCase();
                    \$('.modal-body').html(\"Deseja \" + situacao + \" este registro?\");
                    \$('.btn-primary').attr(\"href\", \$(this).attr('href'));
                    \$('#destativar').modal('toggle');
                    return false;

                });
        ";
        }
        // line 135
        echo "            });
    </script>
";
    }

    public function getTemplateName()
    {
        return "cms/cms/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 135,  241 => 124,  239 => 123,  231 => 119,  228 => 118,  202 => 94,  196 => 91,  193 => 90,  191 => 89,  188 => 88,  184 => 86,  179 => 83,  168 => 77,  163 => 75,  152 => 74,  150 => 73,  139 => 71,  127 => 64,  118 => 63,  114 => 62,  104 => 54,  102 => 53,  96 => 50,  87 => 43,  81 => 41,  79 => 40,  70 => 34,  59 => 26,  53 => 23,  46 => 19,  40 => 15,  37 => 14,  30 => 9,);
    }
}
