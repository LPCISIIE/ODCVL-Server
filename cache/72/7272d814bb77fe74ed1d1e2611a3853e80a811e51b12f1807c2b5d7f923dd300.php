<?php

/* Property/get.twig */
class __TwigTemplate_37202d5d1b709aa93dcadea3ff7103669fe9e070f5acf89643cb8501a65d14c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Property/get.twig", 1);
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
        <li class=\"active\">Propriétés</li>
    </ol>
    <div class=\"page-header\">
        <h2>Propriétés <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("property.add"), "html", null, true);
        echo "\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
    </div>
    <table class=\"table table-striped table-hover\">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th class=\"text-right\">Actions</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 22
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
            // line 23
            echo "            <tr>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
            echo "</td>
                <td class=\"text-right\">
                    <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("property.edit", array("id" => $this->getAttribute($context["property"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("property.delete", array("id" => $this->getAttribute($context["property"], "id", array()))), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        </tbody>
    </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "Property/get.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 36,  92 => 30,  86 => 27,  81 => 25,  77 => 24,  74 => 23,  57 => 22,  43 => 11,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li class=\"active\">Propriétés</li>
    </ol>
    <div class=\"page-header\">
        <h2>Propriétés <a href=\"{{ path_for('property.add') }}\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
    </div>
    <table class=\"table table-striped table-hover\">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th class=\"text-right\">Actions</th>
        </tr>
        </thead>
        <tbody>
        {% for property in properties %}
            <tr>
                <td>{{ loop.index }}</td>
                <td>{{ property.name }}</td>
                <td class=\"text-right\">
                    <a href=\"{{ path_for('property.edit', {'id': property.id}) }}\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"{{ path_for('property.delete', {'id': property.id}) }}\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}
", "Property/get.twig", "/var/www/ODCVL/src/App/Resources/views/Property/get.twig");
    }
}
