<?php

/* Category/add.twig */
class __TwigTemplate_6c3d7c31d3faee45cf520c45d97759132653cbeab83c23860e0d91bf6c1b2f58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Category/add.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.get"), "html", null, true);
        echo "\">Categories</a></li>
        <li class=\"active\">Add category</li>
    </ol>
    <div class=\"page-header\">
        <h2>Add category</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "group", array(0 => "name", 1 => null, 2 => "name", 3 => "Name"), "method"), "html", null, true);
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
                <label for=\"parent_id\">Parent category</label>
                <select name=\"parent_id\" id=\"parent_id\" class=\"form-control\">
                    <option value=\"0\">Choose parent category</option>
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
            echo "            <div class=\"form-group";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError("properties")) {
                echo " has-error";
            }
            echo "\">
                <label>Properties</label>
                <div class=\"btn-group\" data-toggle=\"buttons\">
                    ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["properties"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
                // line 39
                echo "                        <label class=\"btn btn-default\">
                            <input type=\"checkbox\" name=\"properties[]\" value=\"";
                // line 40
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
            // line 43
            echo "                </div>
                <span class=\"help-block\">";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError("properties"), "html", null, true);
            echo "</span>
            </div>
        ";
        }
        // line 47
        echo "
        ";
        // line 48
        echo $this->env->getExtension('App\TwigExtension\Csrf')->csrf();
        echo "
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Create\">
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "Category/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 48,  136 => 47,  130 => 44,  127 => 43,  116 => 40,  113 => 39,  109 => 38,  100 => 35,  98 => 34,  95 => 33,  89 => 30,  86 => 29,  75 => 27,  71 => 26,  61 => 22,  59 => 21,  52 => 17,  40 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li><a href=\"{{ path_for('category.get') }}\">Categories</a></li>
        <li class=\"active\">Add category</li>
    </ol>
    <div class=\"page-header\">
        <h2>Add category</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                {{ form.group('name', null, 'name', 'Name') }}
            </div>
        </div>

        {% if not categories is empty %}
            <div class=\"form-group{% if has_error('parent_id') %} has-error{% endif %}\">
                <label for=\"parent_id\">Parent category</label>
                <select name=\"parent_id\" id=\"parent_id\" class=\"form-control\">
                    <option value=\"0\">Choose parent category</option>
                    {% for category in categories %}
                        <option value=\"{{ category.id }}\">{{ category.name }}</option>
                    {% endfor %}
                </select>
                <span class=\"help-block\">{{ error('parent_id') }}</span>
            </div>
        {% endif %}

        {% if not properties is empty %}
            <div class=\"form-group{% if has_error('properties') %} has-error{% endif %}\">
                <label>Properties</label>
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
", "Category/add.twig", "/var/www/ODCVL/src/App/Resources/views/Category/add.twig");
    }
}
