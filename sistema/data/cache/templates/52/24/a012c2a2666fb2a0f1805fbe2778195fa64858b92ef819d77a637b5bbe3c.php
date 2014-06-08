<?php

/* filtros/filtros/index */
class __TwigTemplate_5224a012c2a2666fb2a0f1805fbe2778195fa64858b92ef819d77a637b5bbe3c extends Twig_Template
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
                    <h3 class=\"panel-title\">Filtros <small>(";
        // line 19
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["quantidade"]) ? $context["quantidade"] : null)), "html", null, true);
        echo ")</small></h3>
                </div>
                <div class=\"panel-body\">
                    <span class=\"glyphicon glyphicon-plus\"></span>
                    <a href=\"";
        // line 23
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros|form");
        echo "\" class=\"ink-button green push-right\">Novo filtro...</a>
                </div>
            </div>
            <form action=\"";
        // line 26
        echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros");
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
                            <span class=\"help-block\">Age no campo Nome.</span>
                        </div>
                    </div>
                    <div class=\"panel-footer\">
                        <button id=\"procurar\" type=\"submit\" class=\"btn btn-info\">Procurar</button>
                        ";
        // line 40
        if ((isset($context["emPesquisa"]) ? $context["emPesquisa"] : null)) {
            // line 41
            echo "                            <a href=\"";
            echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros");
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
                echo "                                    <tr id=\"filtro_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method"), "html", null, true);
                echo "\"  ";
                if (($this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "isVisivel", array(), "method") != 1)) {
                    echo "class=\"text-muted\"";
                }
                echo ">
                                        <td><a href=\"";
                // line 64
                echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros|form", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getNome", array(), "method"), "html", null, true);
                echo "</a></td>
                                        <td>
                                            
                                            <div class=\"dropdown\">
                                                <a data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs\" href=\"javascript:void(0);\"><span class=\"glyphicon glyphicon-cog\"></span> <b class=\"caret\"></b></a>
                                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dLabel\">

                                                    <li><a href=\"";
                // line 71
                echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros|form", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                echo "\"><span class=\"glyphicon glyphicon-edit\"></span> ";
                if ((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null)) {
                    echo "Editar";
                } else {
                    echo "Visualizar";
                }
                echo "</a></li>
                                                    
                                                    ";
                // line 73
                if ((isset($context["permiteAlterar"]) ? $context["permiteAlterar"] : null)) {
                    // line 74
                    echo "                                                        <li><a href=\"";
                    echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros|visivel", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                    echo "\" class=\"desativar\">";
                    if ($this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "isVisivel", array(), "method")) {
                        echo "<span class=\"glyphicon glyphicon-thumbs-down\"></span> Desa";
                    } else {
                        echo "<span class=\"glyphicon glyphicon-thumbs-up\"></span> A";
                    }
                    echo "tivar</a></a></li>
                                                        <li><a href=\"";
                    // line 75
                    echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("url")->__invoke("filtros|excluir", array("id" => $this->getAttribute((isset($context["registro"]) ? $context["registro"] : null), "getId", array(), "method")));
                    echo "\" class=\"excluir\"><span class=\"glyphicon glyphicon-remove\"></span> Excluir</a></a></li>
                                                    ";
                }
                // line 77
                echo "
                                                </ul>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['registro'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "                            </tbody>
                        </table>
                    ";
        } else {
            // line 87
            echo "                        <span class=\"text-muted\">Nenhum registro encontrado!</span>
                    ";
        }
        // line 89
        echo "                </div>
                ";
        // line 90
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["registros"]) ? $context["registros"] : null), "getPages", array(), "method"), "pagesInRange")) > 1)) {
            // line 91
            echo "                    <div class=\"panel-footer\">
                        ";
            // line 92
            echo $this->env->getExtension("zfc-twig")->getRenderer()->plugin("paginationControl")->__invoke((isset($context["registros"]) ? $context["registros"] : null), "Sliding", "shift.partial.paginator", array("route" => "filtros"));
            echo "
                    </div>
                ";
        }
        // line 95
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

    // line 119
    public function block_inlineScript($context, array $blocks = array())
    {
        // line 120
        echo "    ";
        $this->displayParentBlock("inlineScript", $context, $blocks);
        echo "
    <script type=\"text/javascript\">
        \$(function() {

        ";
        // line 124
        if (((!(isset($context["protegido"]) ? $context["protegido"] : null)) && (!(isset($context["inserindo"]) ? $context["inserindo"] : null)))) {
            // line 125
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
        // line 136
        echo "            });
    </script>
";
    }

    public function getTemplateName()
    {
        return "filtros/filtros/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 136,  242 => 125,  240 => 124,  232 => 120,  229 => 119,  203 => 95,  197 => 92,  194 => 91,  192 => 90,  189 => 89,  185 => 87,  180 => 84,  168 => 77,  163 => 75,  152 => 74,  150 => 73,  139 => 71,  127 => 64,  118 => 63,  114 => 62,  104 => 54,  102 => 53,  96 => 50,  87 => 43,  81 => 41,  79 => 40,  70 => 34,  59 => 26,  53 => 23,  46 => 19,  40 => 15,  37 => 14,  30 => 9,);
    }
}
