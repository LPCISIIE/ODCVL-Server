<?php

/* Product/edit.twig */
class __TwigTemplate_2ea0dd6bb7c7be0d579705d4b343d030d6ab0ceb7a8fc18b1eea57f572d3965b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Product/edit.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("product.get"), "html", null, true);
        echo "\">Produits</a></li>
        <li class=\"active\">Modifier un produit</li>
    </ol>
    <div class=\"page-header\">
        <h2>Modifier un produit</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "group", array(0 => "name", 1 => $this->getAttribute(($context["product"] ?? null), "name", array()), 2 => "name", 3 => "Nom"), "method"), "html", null, true);
        echo "
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-4\">
                <div class=\"form-group";
        // line 23
        if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError("category_id")) {
            echo " has-error";
        }
        echo "\">
                    <label for=\"category_id\">Catégorie</label>
                    <select name=\"category_id\" id=\"category_id\" class=\"form-control\">
                        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 27
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
            echo "\" ";
            if ($this->getAttribute($this->getAttribute(($context["product"] ?? null), "categories", array()), "contains", array(0 => $this->getAttribute($context["category"], "id", array())), "method")) {
                echo " selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                    </select>
                    <span class=\"help-block\">";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("category_id"), "html", null, true);
        echo "</span>
                </div>
            </div>
        </div>

        ";
        // line 35
        if ( !twig_test_empty(($context["properties"] ?? null))) {
            // line 36
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
            // line 48
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
                // line 49
                echo "                        ";
                $context["selected"] = $this->getAttribute($this->getAttribute(($context["product"] ?? null), "properties", array()), "contains", array(0 => $this->getAttribute($context["property"], "id", array())), "method");
                // line 50
                echo "                        ";
                $context["required"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["product"] ?? null), "properties", array()), "where", array(0 => "id", 1 => $this->getAttribute($context["property"], "id", array())), "method"), "first", array(), "method"), "pivot", array()), "required", array());
                // line 51
                echo "                        <tr>
                            <td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                            <td>";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
                echo "</td>
                            <td class=\"text-center\">
                                <input type=\"checkbox\" name=\"required[]\" value=\"";
                // line 55
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
                // line 59
                if (($context["selected"] ?? null)) {
                    echo " active";
                }
                echo "\">
                                        <input type=\"checkbox\" name=\"properties[]\" value=\"";
                // line 60
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
            // line 66
            echo "                    </tbody>
                </table>
                <span class=\"help-block\">";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("properties"), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 71
        echo "
        ";
        // line 72
        echo $this->env->getExtension('App\TwigExtension\Csrf')->csrf();
        echo "
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Modifier\">
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "Product/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 72,  205 => 71,  199 => 68,  195 => 66,  171 => 60,  165 => 59,  154 => 55,  149 => 53,  145 => 52,  142 => 51,  139 => 50,  136 => 49,  119 => 48,  101 => 36,  99 => 35,  91 => 30,  88 => 29,  73 => 27,  69 => 26,  61 => 23,  52 => 17,  40 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li><a href=\"{{ path_for('product.get') }}\">Produits</a></li>
        <li class=\"active\">Modifier un produit</li>
    </ol>
    <div class=\"page-header\">
        <h2>Modifier un produit</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                {{ form.group('name', product.name, 'name', 'Nom') }}
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-4\">
                <div class=\"form-group{% if has_error('category_id') %} has-error{% endif %}\">
                    <label for=\"category_id\">Catégorie</label>
                    <select name=\"category_id\" id=\"category_id\" class=\"form-control\">
                        {% for category in categories %}
                            <option value=\"{{ category.id }}\" {% if product.categories.contains(category.id) %} selected{% endif %}>{{ category.name }}</option>
                        {% endfor %}
                    </select>
                    <span class=\"help-block\">{{ error('category_id') }}</span>
                </div>
            </div>
        </div>

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
                        {% set selected = product.properties.contains(property.id) %}
                        {% set required = product.properties.where('id', property.id).first().pivot.required %}
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
", "Product/edit.twig", "/var/www/ODCVL/src/App/Resources/views/Product/edit.twig");
    }
}
