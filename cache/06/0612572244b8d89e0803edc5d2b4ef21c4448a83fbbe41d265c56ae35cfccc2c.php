<?php

/* App/home.twig */
class __TwigTemplate_d41966ba7b94a969ba48844e09980ca84db76d0354f222bc01ec97d79f202a6f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "App/home.twig", 1);
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
    <div class=\"jumbotron\">
        <h1>Hello world!</h1>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "App/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
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
    <div class=\"jumbotron\">
        <h1>Hello world!</h1>
    </div>
</div>

{% endblock %}
", "App/home.twig", "/var/www/ODCVL/src/App/Resources/views/App/home.twig");
    }
}
