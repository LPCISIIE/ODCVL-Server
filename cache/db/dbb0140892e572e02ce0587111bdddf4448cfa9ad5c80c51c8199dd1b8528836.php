<?php

/* Property/edit.twig */
class __TwigTemplate_69da87c7bed3217ce79435d9f18e28d462ca2070deb343e67b8b48d9167c2473 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Property/edit.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("property.get"), "html", null, true);
        echo "\">Properties</a></li>
        <li class=\"active\">Edit property</li>
    </ol>
    <div class=\"page-header\">
        <h2>Edit property</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "group", array(0 => "name", 1 => $this->getAttribute(($context["property"] ?? null), "name", array()), 2 => "name", 3 => "Name"), "method"), "html", null, true);
        echo "
            </div>
        </div>

        ";
        // line 21
        echo $this->env->getExtension('App\TwigExtension\Csrf')->csrf();
        echo "
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Edit\">
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "Property/edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  52 => 17,  40 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li><a href=\"{{ path_for('property.get') }}\">Properties</a></li>
        <li class=\"active\">Edit property</li>
    </ol>
    <div class=\"page-header\">
        <h2>Edit property</h2>
    </div>
    <form action=\"\" method=\"POST\">
        <div class=\"row\">
            <div class=\"col-md-4\">
                {{ form.group('name', property.name, 'name', 'Name') }}
            </div>
        </div>

        {{ csrf() }}
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Edit\">
    </form>
</div>

{% endblock %}
", "Property/edit.twig", "/var/www/ODCVL/src/App/Resources/views/Property/edit.twig");
    }
}
