<?php

/* Category/get.twig */
class __TwigTemplate_2f4ad29dc403eed900c90cbf5bab54a94bbbdeb9670ecce0ce9edc94331dce82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Category/get.twig", 1);
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
        <li class=\"active\">Catégories</li>
    </ol>
    <div class=\"page-header\">
        <h2>Catégories <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.add"), "html", null, true);
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
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 23
            echo "            <tr>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</td>
                <td class=\"text-right\">
                    <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.edit", array("id" => $this->getAttribute($context["category"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.delete", array("id" => $this->getAttribute($context["category"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
                </td>
            </tr>
            ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "subCategories", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["sub_category"]) {
                // line 36
                echo "                <tr>
                    <td></td>
                    <td>
                        <span class=\"sub-category\">";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($context["sub_category"], "name", array()), "html", null, true);
                echo "</span>
                    </td>
                    <td class=\"text-right\">
                        <a href=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.edit", array("id" => $this->getAttribute($context["sub_category"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-default btn-sm\" title=\"Edit\">
                            <span class=\"glyphicon glyphicon-pencil\"></span>
                        </a>
                        <a href=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.delete", array("id" => $this->getAttribute($context["sub_category"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
                            <span class=\"glyphicon glyphicon-remove\"></span>
                        </a>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "        </tbody>
    </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "Category/get.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 52,  133 => 51,  121 => 45,  115 => 42,  109 => 39,  104 => 36,  100 => 35,  92 => 30,  86 => 27,  81 => 25,  77 => 24,  74 => 23,  57 => 22,  43 => 11,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
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
        <li class=\"active\">Catégories</li>
    </ol>
    <div class=\"page-header\">
        <h2>Catégories <a href=\"{{ path_for('category.add') }}\" class=\"btn btn-default pull-right\">Ajouter</a></h2>
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
        {% for category in categories %}
            <tr>
                <td>{{ loop.index }}</td>
                <td>{{ category.name }}</td>
                <td class=\"text-right\">
                    <a href=\"{{ path_for('category.edit', {'id': category.id}) }}\" class=\"btn btn-default btn-sm\" title=\"Modifier\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                    </a>
                    <a href=\"{{ path_for('category.delete', {'id': category.id}) }}\" class=\"btn btn-danger btn-sm\" title=\"Supprimer\">
                        <span class=\"glyphicon glyphicon-remove\"></span>
                    </a>
                </td>
            </tr>
            {% for sub_category in category.subCategories %}
                <tr>
                    <td></td>
                    <td>
                        <span class=\"sub-category\">{{ sub_category.name }}</span>
                    </td>
                    <td class=\"text-right\">
                        <a href=\"{{ path_for('category.edit', {'id': sub_category.id}) }}\" class=\"btn btn-default btn-sm\" title=\"Edit\">
                            <span class=\"glyphicon glyphicon-pencil\"></span>
                        </a>
                        <a href=\"{{ path_for('category.delete', {'id': sub_category.id}) }}\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
                            <span class=\"glyphicon glyphicon-remove\"></span>
                        </a>
                    </td>
                </tr>
            {% endfor %}
        {% endfor %}
        </tbody>
    </table>
</div>

{% endblock %}
", "Category/get.twig", "/var/www/ODCVL/src/App/Resources/views/Category/get.twig");
    }
}
