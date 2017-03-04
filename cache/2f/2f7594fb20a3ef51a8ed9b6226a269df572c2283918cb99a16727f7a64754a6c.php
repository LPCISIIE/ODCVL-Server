<?php

/* Product/get.twig */
class __TwigTemplate_57320abde3ccaf084009848dda379848755b1820c6c763fc8e625513e0619025 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Product/get.twig", 1);
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
        <li class=\"active\">Produits</li>
    </ol>
    <div class=\"page-header\">
        <h2>Produits <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("product.add"), "html", null, true);
        echo "\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
    </div>
    <table class=\"table table-striped table-hover\">
        <thead>
        <tr>
            <th>ID</th>
            <th>Catégories</th>
            <th>Nom</th>
            <th class=\"text-right\">Actions</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 24
            echo "            <tr>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($context["product"], "categories", array()), "pluck", array(0 => "name"), "method"), ", "), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo "</td>
                <td class=\"text-right\">
                    <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("product.edit", array("id" => $this->getAttribute($context["product"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("product.delete", array("id" => $this->getAttribute($context["product"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "        </tbody>
    </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "Product/get.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 38,  84 => 32,  78 => 29,  73 => 27,  69 => 26,  65 => 25,  62 => 24,  58 => 23,  43 => 11,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li class=\"active\">Produits</li>
    </ol>
    <div class=\"page-header\">
        <h2>Produits <a href=\"{{ path_for('product.add') }}\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
    </div>
    <table class=\"table table-striped table-hover\">
        <thead>
        <tr>
            <th>ID</th>
            <th>Catégories</th>
            <th>Nom</th>
            <th class=\"text-right\">Actions</th>
        </tr>
        </thead>
        <tbody>
        {% for product in products %}
            <tr>
                <td>{{ product.id }}</td>
                <td>{{ product.categories.pluck('name')|join(', ') }}</td>
                <td>{{ product.name }}</td>
                <td class=\"text-right\">
                    <a href=\"{{ path_for('product.edit', {'id': product.id}) }}\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"{{ path_for('product.delete', {'id': product.id}) }}\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}
", "Product/get.twig", "/var/www/ODCVL/src/App/Resources/views/Product/get.twig");
    }
}
