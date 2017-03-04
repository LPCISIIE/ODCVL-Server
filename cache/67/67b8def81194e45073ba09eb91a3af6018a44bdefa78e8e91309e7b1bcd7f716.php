<?php

/* Category/edit.twig */
class __TwigTemplate_19010c430a5795bfa475a8d58de1398120e736a9f27f0b8781676a29a391d31c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Category/edit.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"container\">
    <ol class=\"breadcrumb\">
        <li><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("home"), "html", null, true);
        echo "\">Accueil</a></li>
        <li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.get"), "html", null, true);
        echo "\">Catégories</a></li>
        <li class=\"active\">Modifier une catégorie</li>
    </ol>
    <div class=\"page-header\">
        <h2>Modifier une catégorie</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "group", array(0 => "name", 1 => $this->getAttribute(($context["category"] ?? null), "name", array()), 2 => "name", 3 => "Nom"), "method"), "html", null, true);
        echo "
            </div>
        </div>

        ";
        // line 21
        if ( !twig_test_empty(($context["categories"] ?? null))) {
            // line 22
            echo "            <div class=\"form-group";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError("parent_id")) {
                echo " has-error";
            }
            echo "\">
                <label for=\"parent_id\">Catégorie parente</label>
                <select name=\"parent_id\" id=\"parent_id\" class=\"form-control\">
                    <option value=\"0\">Choisissez une catégorie parente</option>
                    ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["parent"]) {
                // line 27
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["parent"], "id", array()), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($context["parent"], "id", array()) == $this->getAttribute(($context["category"] ?? null), "parent_id", array()))) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["parent"], "name", array()), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "                </select>
                <span class=\"help-block\">";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("parent_id"), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 33
        echo "
        ";
        // line 34
        if ( !twig_test_empty(($context["properties"] ?? null))) {
            // line 35
            echo "            <div ";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError("properties")) {
                echo "class=\"has-error\"";
            }
            echo ">
                <label>Propriétés</label>
                <table class=\"table\">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th class=\"text-center\">Requise</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["properties"] ?? null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                // line 48
                echo "                        ";
                $context["selected"] = $this->getAttribute($this->getAttribute(($context["category"] ?? null), "properties", array()), "contains", array(0 => $this->getAttribute($context["property"], "id", array())), "method");
                // line 49
                echo "                        ";
                $context["required"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["category"] ?? null), "properties", array()), "where", array(0 => "id", 1 => $this->getAttribute($context["property"], "id", array())), "method"), "first", array(), "method"), "pivot", array()), "required", array());
                // line 50
                echo "                        <tr>
                            <td>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
                echo "</td>
                            <td class=\"text-center\">
                                <input type=\"checkbox\" name=\"required[]\" value=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "id", array()), "html", null, true);
                echo "\"";
                if ((($context["selected"] ?? null) && ($context["required"] ?? null))) {
                    echo " checked";
                }
                echo ">
                            </td>
                            <td class=\"text-right\">
                                <div class=\"btn-group\" data-toggle=\"buttons\">
                                    <label class=\"btn btn-default btn-sm";
                // line 58
                if (($context["selected"] ?? null)) {
                    echo " active";
                }
                echo "\">
                                        <input type=\"checkbox\" name=\"properties[]\" value=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "id", array()), "html", null, true);
                echo "\" autocomplete=\"off\"";
                if (($context["selected"] ?? null)) {
                    echo " checked";
                }
                echo "> Associer
                                    </label>
                                </div>
                            </td>
                        </tr>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "                    </tbody>
                </table>
                <span class=\"help-block\">";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("properties"), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 70
        echo "
        ";
        // line 71
        echo $this->env->getExtension('App\TwigExtension\Csrf')->csrf();
        echo "
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Modifier\">
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "Category/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 71,  208 => 70,  202 => 67,  198 => 65,  174 => 59,  168 => 58,  157 => 54,  152 => 52,  148 => 51,  145 => 50,  142 => 49,  139 => 48,  122 => 47,  104 => 35,  102 => 34,  99 => 33,  93 => 30,  90 => 29,  75 => 27,  71 => 26,  61 => 22,  59 => 21,  52 => 17,  40 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'layout.twig' %}

{% block body %}

<div class=\"container\">
    <ol class=\"breadcrumb\">
        <li><a href=\"{{ path_for('home') }}\">Accueil</a></li>
        <li><a href=\"{{ path_for('category.get') }}\">Catégories</a></li>
        <li class=\"active\">Modifier une catégorie</li>
    </ol>
    <div class=\"page-header\">
        <h2>Modifier une catégorie</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                {{ form.group('name', category.name, 'name', 'Nom') }}
            </div>
        </div>

        {% if not categories is empty %}
            <div class=\"form-group{% if has_error('parent_id') %} has-error{% endif %}\">
                <label for=\"parent_id\">Catégorie parente</label>
                <select name=\"parent_id\" id=\"parent_id\" class=\"form-control\">
                    <option value=\"0\">Choisissez une catégorie parente</option>
                    {% for parent in categories %}
                        <option value=\"{{ parent.id }}\" {% if parent.id == category.parent_id %} selected{% endif %}>{{ parent.name }}</option>
                    {% endfor %}
                </select>
                <span class=\"help-block\">{{ error('parent_id') }}</span>
            </div>
        {% endif %}

        {% if not properties is empty %}
            <div {% if has_error('properties') %}class=\"has-error\"{% endif %}>
                <label>Propriétés</label>
                <table class=\"table\">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th class=\"text-center\">Requise</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for property in properties %}
                        {% set selected = category.properties.contains(property.id) %}
                        {% set required = category.properties.where('id', property.id).first().pivot.required %}
                        <tr>
                            <td>{{ loop.index }}</td>
                            <td>{{ property.name }}</td>
                            <td class=\"text-center\">
                                <input type=\"checkbox\" name=\"required[]\" value=\"{{ property.id }}\"{% if selected and required %} checked{% endif %}>
                            </td>
                            <td class=\"text-right\">
                                <div class=\"btn-group\" data-toggle=\"buttons\">
                                    <label class=\"btn btn-default btn-sm{% if selected %} active{% endif %}\">
                                        <input type=\"checkbox\" name=\"properties[]\" value=\"{{ property.id }}\" autocomplete=\"off\"{% if selected %} checked{% endif %}> Associer
                                    </label>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
                <span class=\"help-block\">{{ error('properties') }}</span>
            </div>
        {% endif %}

        {{ csrf() }}
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Modifier\">
    </form>
</div>

{% endblock %}
", "Category/edit.twig", "/var/www/ODCVL/src/App/Resources/views/Category/edit.twig");
    }
}
