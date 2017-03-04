<?php

/* Auth/login.twig */
class __TwigTemplate_94d6ce0fc615472cd80989768cf7569d9377765f15e26d27aa6398b0f7f4f8cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "Auth/login.twig", 1);
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
        // line 3
        $context["form"] = $this->loadTemplate("Macro/form.twig", "Auth/login.twig", 3);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-4 col-md-offset-4\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">Connexion</div>
                <div class=\"panel-body\">
                    <form action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("login"), "html", null, true);
        echo "\" method=\"POST\">
                        ";
        // line 14
        echo $context["form"]->getgroup("username", null, "username", "Nom d'utilisateur");
        echo "
                        ";
        // line 15
        echo $context["form"]->getgroup("password", null, "password", "Mot de passe", null, "password");
        echo "
                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" name=\"remember\"> Se souvenir de moi
                            </label>
                        </div>
                        ";
        // line 21
        echo $this->env->getExtension('App\TwigExtension\Csrf')->csrf();
        echo "
                        <input type=\"submit\" value=\"Connexion\" class=\"btn btn-primary\">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "Auth/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 21,  51 => 15,  47 => 14,  43 => 13,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
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

{% import 'Macro/form.twig' as form %}

{% block body %}

<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-4 col-md-offset-4\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">Connexion</div>
                <div class=\"panel-body\">
                    <form action=\"{{ path_for('login') }}\" method=\"POST\">
                        {{ form.group('username', null, 'username', 'Nom d\\'utilisateur') }}
                        {{ form.group('password', null, 'password', 'Mot de passe', null, 'password') }}
                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" name=\"remember\"> Se souvenir de moi
                            </label>
                        </div>
                        {{ csrf() }}
                        <input type=\"submit\" value=\"Connexion\" class=\"btn btn-primary\">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{% endblock %}
", "Auth/login.twig", "/var/www/ODCVL/src/App/Resources/views/Auth/login.twig");
    }
}
