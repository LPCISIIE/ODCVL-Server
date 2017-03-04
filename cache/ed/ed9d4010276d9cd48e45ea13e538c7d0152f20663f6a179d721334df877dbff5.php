<?php

/* layout.twig */
class __TwigTemplate_2af74b4501604b54e78cc24cfb3235967a33b32df9aa0d47628a0061acab6fda extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'navbar' => array($this, 'block_navbar'),
            'flash' => array($this, 'block_flash'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["form"] = $this->loadTemplate("Macro/form.twig", "layout.twig", 1);
        // line 2
        echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"theme-color\" content=\"#C83838\">

    <title>";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- Bootstrap -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://bootswatch.com/paper/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('App\TwigExtension\Asset')->asset("css/app.css"), "html", null, true);
        echo "\">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>
    ";
        // line 26
        $this->displayBlock('navbar', $context, $blocks);
        // line 29
        echo "
    ";
        // line 30
        $this->displayBlock('flash', $context, $blocks);
        // line 33
        echo "
    ";
        // line 34
        $this->displayBlock('body', $context, $blocks);
        // line 35
        echo "
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
    ";
        // line 38
        $this->displayBlock('javascripts', $context, $blocks);
        // line 39
        echo "</body>
</html>
";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "ODCVL";
    }

    // line 26
    public function block_navbar($context, array $blocks = array())
    {
        // line 27
        echo "        ";
        $this->loadTemplate("App/navbar.twig", "layout.twig", 27)->display($context);
        // line 28
        echo "    ";
    }

    // line 30
    public function block_flash($context, array $blocks = array())
    {
        // line 31
        echo "        ";
        $this->loadTemplate("App/flash.twig", "layout.twig", 31)->display($context);
        // line 32
        echo "    ";
    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
    }

    // line 38
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 38,  109 => 34,  105 => 32,  102 => 31,  99 => 30,  95 => 28,  92 => 27,  89 => 26,  83 => 11,  77 => 39,  75 => 38,  70 => 35,  68 => 34,  65 => 33,  63 => 30,  60 => 29,  58 => 26,  45 => 16,  37 => 11,  26 => 2,  24 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% import 'Macro/form.twig' as form %}

<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"theme-color\" content=\"#C83838\">

    <title>{% block title %}ODCVL{% endblock %}</title>

    <!-- Bootstrap -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://bootswatch.com/paper/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/app.css') }}\">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>
    {% block navbar %}
        {% include 'App/navbar.twig' %}
    {% endblock %}

    {% block flash %}
        {% include 'App/flash.twig' %}
    {% endblock %}

    {% block body %}{% endblock %}

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>
", "layout.twig", "/var/www/ODCVL/src/App/Resources/views/layout.twig");
    }
}
