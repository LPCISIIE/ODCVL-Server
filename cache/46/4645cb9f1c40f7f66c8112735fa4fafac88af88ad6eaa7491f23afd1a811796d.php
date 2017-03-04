<?php

/* Product/add.twig */
class __TwigTemplate_44a8e5c6f16153ce1845467bc07fcae5f14c7dcf8ffe7b109d3f92fe98134442 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Product/add.twig", 1);
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
        echo "\">Home</a></li>
        <li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("product.get"), "html", null, true);
        echo "\">Products</a></li>
        <li class=\"active\">Add product</li>
    </ol>
    <div class=\"page-header\">
        <h2>Add product</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "group", array(0 => "name", 1 => null, 2 => "name", 3 => "Name"), "method"), "html", null, true);
        echo "
            </div>
        </div>

        <div class=\"row\">
            <div class=\"form-group col-md-4";
        // line 22
        if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError("category_id")) {
            echo " has-error";
        }
        echo "\">
                <label for=\"category_id\">Category</label>
                <select name=\"category_id\" id=\"category_id\" class=\"form-control\">
                    <option value=\"0\">Choose category</option>
                    ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 27
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                </select>
                <span class=\"help-block\">";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("category_id"), "html", null, true);
        echo "</span>
            </div>
        </div>

        ";
        // line 34
        if ( !twig_test_empty(($context["properties"] ?? null))) {
            // line 35
            echo "            <div class=\"form-group";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError("properties")) {
                echo " has-error";
            }
            echo "\">
                <div class=\"row\">
                    <label class=\"col-xs-12\">Properties</label>
                </div>
                <div class=\"btn-group\" data-toggle=\"buttons\">
                    ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["properties"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                // line 41
                echo "                        <label class=\"btn btn-default\">
                            <input type=\"checkbox\" name=\"properties[]\" value=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "id", array()), "html", null, true);
                echo "\" autocomplete=\"off\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
                echo "
                        </label>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "                </div>
                <span class=\"help-block\">";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("properties"), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 49
        echo "
        ";
        // line 50
        echo $this->env->getExtension('App\TwigExtension\Csrf')->csrf();
        echo "
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Create\">
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "Product/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 50,  134 => 49,  128 => 46,  125 => 45,  114 => 42,  111 => 41,  107 => 40,  96 => 35,  94 => 34,  87 => 30,  84 => 29,  73 => 27,  69 => 26,  60 => 22,  52 => 17,  40 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li><a href=\"{{ path_for('home') }}\">Home</a></li>
        <li><a href=\"{{ path_for('product.get') }}\">Products</a></li>
        <li class=\"active\">Add product</li>
    </ol>
    <div class=\"page-header\">
        <h2>Add product</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-6\">
                {{ form.group('name', null, 'name', 'Name') }}
            </div>
        </div>

        <div class=\"row\">
            <div class=\"form-group col-md-4{% if has_error('category_id') %} has-error{% endif %}\">
                <label for=\"category_id\">Category</label>
                <select name=\"category_id\" id=\"category_id\" class=\"form-control\">
                    <option value=\"0\">Choose category</option>
                    {% for category in categories %}
                        <option value=\"{{ category.id }}\">{{ category.name }}</option>
                    {% endfor %}
                </select>
                <span class=\"help-block\">{{ error('category_id') }}</span>
            </div>
        </div>

        {% if not properties is empty %}
            <div class=\"form-group{% if has_error('properties') %} has-error{% endif %}\">
                <div class=\"row\">
                    <label class=\"col-xs-12\">Properties</label>
                </div>
                <div class=\"btn-group\" data-toggle=\"buttons\">
                    {% for property in properties %}
                        <label class=\"btn btn-default\">
                            <input type=\"checkbox\" name=\"properties[]\" value=\"{{ property.id }}\" autocomplete=\"off\"> {{ property.name }}
                        </label>
                    {% endfor %}
                </div>
                <span class=\"help-block\">{{ error('properties') }}</span>
            </div>
        {% endif %}

        {{ csrf() }}
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Create\">
    </form>
</div>

{% endblock %}
", "Product/add.twig", "/var/www/ODCVL/src/App/Resources/views/Product/add.twig");
    }
}
