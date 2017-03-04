<?php

/* App/navbar.twig */
class __TwigTemplate_e3ba82bc6a4ffb6dd030e7743d4b75f49633ac058be3d3c8fbd7492ed9aa47f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav class=\"navbar navbar-default navbar-static-top\">
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("home"), "html", null, true);
        echo "\">ODCVL</a>
        </div>
        <div class=\"collapse navbar-collapse\" id=\"navbar-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                ";
        // line 14
        if ($this->getAttribute(($context["auth"] ?? null), "check", array(), "method")) {
            // line 15
            echo "                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["auth"] ?? null), "user", array()), "username", array()), "html", null, true);
            echo " <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("logout"), "html", null, true);
            echo "\">Déconnexion</a></li>
                        </ul>
                    </li>
                ";
        } else {
            // line 22
            echo "                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("register"), "html", null, true);
            echo "\">Inscription</a></li>
                    <li><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("login"), "html", null, true);
            echo "\">Connexion</a></li>
                ";
        }
        // line 25
        echo "                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dashboard <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("category.get"), "html", null, true);
        echo "\">Catégories</a></li>
                        <li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("product.get"), "html", null, true);
        echo "\">Produits</a></li>
                        <li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("item.get"), "html", null, true);
        echo "\">Articles</a></li>
                        <li><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->pathFor("property.get"), "html", null, true);
        echo "\">Propriétés</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "App/navbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 31,  77 => 30,  73 => 29,  69 => 28,  64 => 25,  59 => 23,  54 => 22,  47 => 18,  42 => 16,  39 => 15,  37 => 14,  30 => 10,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav class=\"navbar navbar-default navbar-static-top\">
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"{{ path_for('home') }}\">ODCVL</a>
        </div>
        <div class=\"collapse navbar-collapse\" id=\"navbar-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                {% if auth.check() %}
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">{{ auth.user.username }} <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"{{ path_for('logout') }}\">Déconnexion</a></li>
                        </ul>
                    </li>
                {% else %}
                    <li><a href=\"{{ path_for('register') }}\">Inscription</a></li>
                    <li><a href=\"{{ path_for('login') }}\">Connexion</a></li>
                {% endif %}
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dashboard <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"{{ path_for('category.get') }}\">Catégories</a></li>
                        <li><a href=\"{{ path_for('product.get') }}\">Produits</a></li>
                        <li><a href=\"{{ path_for('item.get') }}\">Articles</a></li>
                        <li><a href=\"{{ path_for('property.get') }}\">Propriétés</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
", "App/navbar.twig", "/var/www/ODCVL/src/App/Resources/views/App/navbar.twig");
    }
}
