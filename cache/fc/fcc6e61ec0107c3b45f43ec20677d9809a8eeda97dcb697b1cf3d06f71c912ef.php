<?php

/* Item/get.twig */
class __TwigTemplate_214d66b8e2e394035715ff934651ed9a5545ccfca19aa4287136cfb1f2417089 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Item/get.twig", 1);
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
        <li class=\"active\">Articles</li>
    </ol>
    <div class=\"page-header\">
        <h2>Articles <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("item.add"), "html", null, true);
        echo "\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
    </div>
    <table class=\"table table-striped table-hover\">
        <thead>
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Produit</th>
            <th>Date d'achat</th>
            <th class=\"text-right\">Actions</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 25
            echo "            <tr>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "code", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "product", array()), "name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "purchased_at", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                <td class=\"text-right\">
                    <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("item.edit", array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("item.delete", array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "        </tbody>
    </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "Item/get.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 40,  102 => 34,  96 => 31,  91 => 29,  87 => 28,  83 => 27,  79 => 26,  76 => 25,  59 => 24,  43 => 11,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li class=\"active\">Articles</li>
    </ol>
    <div class=\"page-header\">
        <h2>Articles <a href=\"{{ path_for('item.add') }}\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
    </div>
    <table class=\"table table-striped table-hover\">
        <thead>
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Produit</th>
            <th>Date d'achat</th>
            <th class=\"text-right\">Actions</th>
        </tr>
        </thead>
        <tbody>
        {% for item in items %}
            <tr>
                <td>{{ loop.index }}</td>
                <td>{{ item.code }}</td>
                <td>{{ item.product.name }}</td>
                <td>{{ item.purchased_at|date('d/m/Y') }}</td>
                <td class=\"text-right\">
                    <a href=\"{{ path_for('item.edit', {'id': item.id}) }}\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"{{ path_for('item.delete', {'id': item.id}) }}\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}
", "Item/get.twig", "/var/www/ODCVL/src/App/Resources/views/Item/get.twig");
    }
}
