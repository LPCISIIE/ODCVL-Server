<?php

/* Macro/form.twig */
class __TwigTemplate_f712ceb9237df4c2e63f83e66e6178f2ece60da3b19a946e462646bef55c2586 extends Twig_Template
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
        echo "
";
        // line 9
        echo "
";
        // line 26
        echo "
";
    }

    // line 2
    public function getgroup($__name__ = null, $__value__ = null, $__id__ = null, $__label__ = null, $__class__ = null, $__type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "id" => $__id__,
            "label" => $__label__,
            "class" => $__class__,
            "type" => $__type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 3
            echo "    <div class=\"form-group";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError(($context["name"] ?? null))) {
                echo " has-error";
            }
            echo "\">
        <label for=\"";
            // line 4
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
        <input type=\"";
            // line 5
            echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text")), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\" class=\"form-control ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" aria-describedby=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "-help-block\">
        <span id=\"";
            // line 6
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "-help-block\" class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError(($context["name"] ?? null)), "html", null, true);
            echo "</span>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 10
    public function getselect($__name__ = null, $__options__ = null, $__value_key__ = null, $__text_key__ = null, $__default_value__ = null, $__default_text__ = null, $__selected_value__ = null, $__id__ = null, $__label__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "options" => $__options__,
            "value_key" => $__value_key__,
            "text_key" => $__text_key__,
            "default_value" => $__default_value__,
            "default_text" => $__default_text__,
            "selected_value" => $__selected_value__,
            "id" => $__id__,
            "label" => $__label__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 11
            echo "    <div class=\"form-group";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError(($context["name"] ?? null))) {
                echo " has-error";
            }
            echo "\">
        ";
            // line 12
            if (($context["label"] ?? null)) {
                // line 13
                echo "            <label for=\"";
                echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
                echo "</label>
        ";
            }
            // line 15
            echo "        <select name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\" class=\"form-control\" aria-describedby=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "-help-block\">
            ";
            // line 16
            if ((($context["default_value"] ?? null) || ($context["default_text"] ?? null))) {
                // line 17
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, ($context["default_value"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ($context["default_text"] ?? null), "html", null, true);
                echo "</option>
            ";
            }
            // line 19
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 20
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], ($context["value_key"] ?? null)), "html", null, true);
                echo "\"";
                if ((($context["selected_value"] ?? null) == $this->getAttribute($context["option"], ($context["value_key"] ?? null)))) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["option"], ($context["text_key"] ?? null)), "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "        </select>
        <span id=\"";
            // line 23
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "-help-block\" class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError(($context["name"] ?? null)), "html", null, true);
            echo "</span>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 27
    public function gettextarea($__name__ = null, $__value__ = null, $__id__ = null, $__label__ = null, $__class__ = null, $__rows__ = null, $__cols__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "value" => $__value__,
            "id" => $__id__,
            "label" => $__label__,
            "class" => $__class__,
            "rows" => $__rows__,
            "cols" => $__cols__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 28
            echo "    <div class=\"form-group";
            if ($this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->hasError(($context["name"] ?? null))) {
                echo " has-error";
            }
            echo "\">
        <label for=\"";
            // line 29
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
        <textarea class=\"form-control ";
            // line 30
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\" cols=\"";
            echo twig_escape_filter($this->env, ($context["cols"] ?? null), "html", null, true);
            echo "\" rows=\"";
            echo twig_escape_filter($this->env, ($context["rows"] ?? null), "html", null, true);
            echo "\" aria-describedby=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "-help-block\">";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "</textarea>
        <span id=\"";
            // line 31
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "-help-block\" class=\"help-block\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Awurth\Slim\Validation\ValidatorExtension')->getError(($context["name"] ?? null)), "html", null, true);
            echo "</span>
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "Macro/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 31,  224 => 30,  218 => 29,  211 => 28,  193 => 27,  173 => 23,  170 => 22,  155 => 20,  150 => 19,  142 => 17,  140 => 16,  131 => 15,  123 => 13,  121 => 12,  114 => 11,  94 => 10,  74 => 6,  60 => 5,  54 => 4,  47 => 3,  30 => 2,  25 => 26,  22 => 9,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% macro group(name, value, id, label, class, type) %}
    <div class=\"form-group{% if has_error(name) %} has-error{% endif %}\">
        <label for=\"{{ id }}\">{{ label }}</label>
        <input type=\"{{ type|default('text') }}\" name=\"{{ name }}\" value=\"{{ value }}\" id=\"{{ id }}\" class=\"form-control {{ class }}\" aria-describedby=\"{{ id }}-help-block\">
        <span id=\"{{ id }}-help-block\" class=\"help-block\">{{ error(name) }}</span>
    </div>
{% endmacro %}

{% macro select(name, options, value_key, text_key, default_value, default_text, selected_value, id, label) %}
    <div class=\"form-group{% if has_error(name) %} has-error{% endif %}\">
        {% if label %}
            <label for=\"{{ id }}\">{{ label }}</label>
        {% endif %}
        <select name=\"{{ name }}\" id=\"{{ id }}\" class=\"form-control\" aria-describedby=\"{{ id }}-help-block\">
            {% if default_value or default_text %}
                <option value=\"{{ default_value }}\">{{ default_text }}</option>
            {% endif %}
            {% for option in options %}
                <option value=\"{{ attribute(option, value_key) }}\"{% if selected_value == attribute(option, value_key) %} selected{% endif %}>{{ attribute(option, text_key) }}</option>
            {% endfor %}
        </select>
        <span id=\"{{ id }}-help-block\" class=\"help-block\">{{ error(name) }}</span>
    </div>
{% endmacro %}

{% macro textarea(name, value, id, label, class, rows, cols) %}
    <div class=\"form-group{% if has_error(name) %} has-error{% endif %}\">
        <label for=\"{{ id }}\">{{ label }}</label>
        <textarea class=\"form-control {{ class }}\" name=\"{{ name }}\" id=\"{{ id }}\" cols=\"{{ cols }}\" rows=\"{{ rows }}\" aria-describedby=\"{{ id }}-help-block\">{{ value }}</textarea>
        <span id=\"{{ id }}-help-block\" class=\"help-block\">{{ error(name) }}</span>
    </div>
{% endmacro %}
", "Macro/form.twig", "/var/www/ODCVL/src/App/Resources/views/Macro/form.twig");
    }
}
